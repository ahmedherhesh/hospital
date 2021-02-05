<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function login(){
        if(session()->has('doctor')){
            return redirect('doctor/');
        }else{
            return view('doctor.login');
        }
    }
    public function inputFilter($input_field){
        $input = htmlspecialchars(stripcslashes(strip_tags($input_field)));
        return $input;
    }
    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $email = $this->inputFilter($request->email);
        $password = $this->inputFilter($request->password);

        $doctor = DB::table('users')->where(['email' => $email, 'role' => 'doctor'])->first();

        if($doctor && Hash::check($password,$doctor->password)){
           $request->session()->put('doctor',$doctor);
           return redirect('doctor/');
        }else{
            return back()->with('login_error','The email or password is not matched');
        }
    }
    public function home(){
        if(session()->has('doctor')){
            return view('doctor.home');
         }else{
             return redirect('doctor/login');
         }
    }
    public function settings(){
        if(session()->has('doctor')){
            $doctor_id = session()->get('doctor')->id;
            $user = DB::table('users')->where(['id'=> $doctor_id])->first();
            $doctor_info = DB::table('doctors_info')->where(['doctor_id'=> $doctor_id])->first();
            return view('doctor.settings',compact('user','doctor_info'));
        }else{
            return redirect('login');
        }
    }    
    public function settingsPost(Request $request){
        if(session()->has('doctor')){
            $request->validate([
                'name' => 'required',
                'last_name' => 'required',
                'old_password' => 'required',
                'personal_mobile' => 'required',
                'email' => 'required',
                
            ]);

        //update profile_image
        if(isset($request->profile_image) && !empty($request->profile_image)){
            $request->validate([
                'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $doctor_id = session()->get('doctor')->id;
            $imageName = time().'.'.$request->profile_image->extension();
            $update_image = DB::table('users')->where(['id' => $doctor_id])->update([   
                'profile_image' => $imageName,
            ]);
            if($update_image){
                $request->profile_image->move(public_path('uploads/images'), $imageName);
            }
        }

            $doctor_id = session()->get('doctor')->id;
            $doctor_pass = $request->old_pass;
            //update password
            if(isset($request->new_password) && !empty($request->new_password)){
                $request->validate([
                    'new_password' => 'required|min:8',
                ]);
                if(Hash::check($request->old_password,$doctor_pass)){
                    $update_password = DB::table('users')->where(['id' => $doctor_id])->update([
                        'password' => $this->inputFilter(Hash::make($request->new_password)),
                    ]);
                }

            }
                //personal_information
                if(Hash::check($request->old_password,$doctor_pass)){
                    $update_doctors = DB::table('users')->where(['id' => $doctor_id])->update([
                        'name' => $this->inputFilter($request->name),
                        'last_name' => $this->inputFilter($request->last_name),
                        'personal_mobile' => $this->inputFilter($request->personal_mobile),
                        'email' => $this->inputFilter($request->email),
                        'updated_at' => now()
                    ]);
                    
                    //information_update
                    $doctors_info = DB::table('doctors_info')->where('doctor_id',$doctor_id)->first();
                    if($doctors_info){
                        $updateInfo = DB::table('doctors_info')->where('doctor_id',$doctor_id)->update([
                            'address' => json_encode($request->address),
                            'specialization' => $this->inputFilter($request->specialization),
                            'bachelor_degree' => $this->inputFilter($request->bachelor_degree),
                            'treatment' => json_encode($request->treatments),
                            'schedule' => json_encode($request->schedule),
                            'updated_at' => now()
                        ]);
                        //update logo_image
                        if(isset($request->logo_image) && !empty($request->logo_image)){
                            $logoImage = time().'.'.$request->logo_image->extension();
                            $request->validate([
                                'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            ]);
                            $updateLogo = DB::table('doctors_info')->where('doctor_id',$doctor_id)->update([
                                'logo' =>  $logoImage,
                            ]);
                            if($updateLogo){
                                $request->logo_image->move(public_path('uploads/images'), $logoImage);
                            }
                        }
                        //end update logo_image
                        if($updateInfo){
                            return redirect('doctor/settings');
                        }
                    }else{

                        if(isset($request->logo_image) && !empty($request->logo_image)){
                            //logo image
                            $logoImage = time().'.'.$request->logo_image->extension();
                            $request->validate([
                                'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                            ]);

                            $insertInfo = DB::table('doctors_info')->insert([
                                'doctor_id' => $doctor_id,
                                'address' => json_encode($request->address),
                                'specialization' => $this->inputFilter($request->specialization),
                                'bachelor_degree' => $this->inputFilter($request->bachelor_degree),
                                'treatment' => json_encode($request->treatments),
                                'schedule' => json_encode($request->schedule),
                                'logo' =>  $logoImage,
                                'created_at' => now()
                            ]);

                            if($insertInfo){
                                $request->logo_image->move(public_path('uploads/images'), $logoImage);
                                return redirect('doctor/settings');
                            }
                        }else{
                            //Not Found logo image
                            $insertInfo = DB::table('doctors_info')->insert([
                                'doctor_id' => $doctor_id,
                                'address' => json_encode($request->address),
                                'specialization' => $this->inputFilter($request->specialization),
                                'bachelor_degree' => $this->inputFilter($request->bachelor_degree),
                                'treatment' => json_encode($request->treatments),
                                'schedule' => json_encode($request->schedule),
                                'created_at' => now()
                            ]);
                            if($insertInfo){
                                return redirect('doctor/settings');
                            } 
                        }
                    }
                }else{
                    return back();
                }

        }else{
            return redirect('login');
        }
    }
    //all_messages
    public function allMessages(){
        if(session()->has('doctor')){
            $messages = DB::table('messages')->where([
                'doctor_id'=>session()->get('doctor')->id,
                'message_id' => null
            ])->orderBy('id','desc')->get();
            return view('doctor.messages',compact('messages'));
        }else{
            return redirect('doctor/login');
        }
    }

    //message_body
    public function messageBody($id){
        if(session()->has('doctor')){
            $message = DB::table('messages')->where([
                'id'=>intval($id),
                'doctor_id'=>session()->get('doctor')->id,
                'message_id' => null
            ])->first();
            if($message){
                return view('doctor.message-body',compact('message'));
            }else{
                return back();
            }
            
        }else{
            return redirect('doctor/login');
        }
    }

    public function replyMessage(Request $request){
        $request->validate([
            'content' => 'required',
            'patient_id' => 'required|int',
            'message_id' => 'required|int',
        ]);

        $reply = DB::table('messages')->insert([
            'doctor_id'  => session()->get('doctor')->id, //doctor
            'patient_id' => $request->patient_id, // patient
            'message_id' => $request->message_id, //message from patient
            'content'    => $this->inputFilter($request->content), // message from doctor to reply this patient
            'created_at' => now(),
        ]);
        if($reply){
            return back();
        }
        
    }

    //message from admin
    public function adminMessageBody($id){
        if(session()->has('doctor')){
            $message = DB::table('messages_from_admin')->where([
                'id'=>intval($id),
                'doctor_id'=>session()->get('doctor')->id,
                'message_id' => null
            ])->first();
            if($message){
                return view('doctor.admin-message-body',compact('message'));
            }else{
                return back();
            }
            
        }else{
            return redirect('doctor/login');
        }
    }

    public function replyMessageFromAdmin(Request $request){
        $request->validate([
            'content' => 'required',
            'sender_id' => 'required|int',
            'message_id' => 'required|int',
        ]);

        $reply = DB::table('messages_from_admin')->insert([
            'doctor_id'  => session()->get('doctor')->id, //doctor
            'sender_id' => $request->sender_id, // admin
            'message_id' => $request->message_id, //message from patient
            'content'    => $this->inputFilter($request->content), // message from doctor to reply this patient
            'created_at' => now(),
        ]);
        if($reply){
            return back();
        }
        
    }
    //end message from admin

    public function notifications(){
        if(session()->has('doctor')){

            $messages = DB::table('messages')->where([
                'doctor_id'=>session()->get('doctor')->id,
                'message_id' => null
            ])->orderBy('id','desc')->get();

            $adminMessages = DB::table('messages_from_admin')->where([
                'doctor_id'=>session()->get('doctor')->id,
                'message_id' => null
            ])->orderBy('id','desc')->get();
            return view('doctor.notifications',compact('messages','adminMessages'));

        }else{
            return redirect('doctor/login');
        }
    }
    public function logout(){
        if(session()->has('doctor')){
            session()->forget('doctor');
            return redirect('doctor/login');
         }else{
            return redirect('doctor/home');
         }
    }
}
