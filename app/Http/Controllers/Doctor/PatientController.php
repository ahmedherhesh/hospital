<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\prescription;
// use App\Exceptions\InvalidOrderException;

class PatientController extends Controller
{
// Function For InputFilter
    public function inputFilter($input_field){
        $input = htmlspecialchars(stripcslashes(strip_tags($input_field)));
        return $input;
    }

//Start add_patient Page
    public function addPatient(){
        if(session()->has('doctor')){
            return view('doctor.add-patient');
         }else{
            return redirect('login');
         }
    }

// add_patient Page POST
    public function addPatientPost(Request $request){
        $request->validate([
            // Personal Information
            'fullname' => 'required',
            'mobile_number' => 'required',
            'adress' => 'required',
            'age' => 'required',
            'gender' => 'required',
            // The History of Patient with Any Disease
            'diseases' => 'required',
            'notes' => 'required',
            // Final Cost of The Examination
            'examination_date' => 'required',
            'price' => 'required',
            'final_price' => 'required',
        ]);
        $patient = DB::table('patients')->insertGetId([
            'fullname' => $request->fullname,
            'mobile_number' => $request->mobile_number,
            'adress' => $request->adress,
            'age' => $request->age,
            'gender' => $request->gender,
            'code_number' =>time(),
            'created_at' => now(),
        ]);
        if($patient){
            $diseases = DB::table('diseases')->insert([
                'patient_id' => $patient,
                'doctor_id' => session()->get('doctor')->id,
                'chronic_diseases' => $request->diseases,
                'notes' => $request->notes,
                'created_at' => now(),
            ]);
            $examination = DB::table('examinations')->insert([
                'doctor_id' => session()->get('doctor')->id,
                'patient_id' => $patient,
                'examination_date' => $request->examination_date,
                'examination_type' => 'new',
                'price' => $request->price,
                'discount' => empty($request->discount) ? 0 : $request->discount,
                'final_price' => $request->final_price,
            ]);
            if($diseases && $examination){
                return back();
            }
        }
    }
//End add_patient Page

//Start Edit-Page
    public function editPage(Request $request){
        if(session()->has('doctor')){
            $request->validate([
                'code' => 'required|int'
            ]);
    
            $patient = DB::table('patients')->where(['code_number' => $request->code])->first();
            if($patient){
                $examination = DB::table('examinations')->where([
                    'patient_id' => $patient->id,
                    'doctor_id'  => session()->get('doctor')->id,
                ])->orderByDesc('id')->first();

                $diseases = DB::table('diseases')->where([
                    'patient_id' => $patient->id,
                    'doctor_id'  => session()->get('doctor')->id,
                    ])->first();
                
                $prescriptions = prescription::where([
                    'patient_id' => $patient->id,
                    'doctor_id'  => session()->get('doctor')->id,
                ])->orderBy('id','desc')->paginate(1);

                $diagnosis_of_patient = DB::table('diagnosis')->where([
                    'patient_id' => $patient->id,
                    'doctor_id'  => session()->get('doctor')->id,
                ])->first();

                $patientEx = isset($examination) ? $examination : null;
                $diseasesP = isset($diseases) ? $diseases : null;
                $prescriptionP = isset($prescriptions) ? $prescriptions : null;
                $diagnosis = isset($diagnosis_of_patient) ? $diagnosis_of_patient : null;
    
                return view('doctor/patient-edit-page',compact('patient','patientEx','diseasesP','prescriptionP','diagnosis'));
    
            }else{
                return back();
            }
        }else{
            return back();
        }

    }
    //profile of patient
    public function editProfile(Request $request){
        if(session()->has('doctor')){ 

            $patient = DB::table('patients')->where(['code_number' => $request->code])->first();
            
            $checkPatient = DB::table('patients')->where([
                'id' => $this->inputFilter($request->patient_id),
            ])->first();

            $diseases = DB::table('diseases')->where([
                'patient_id' => $this->inputFilter($request->patient_id),
                'doctor_id' => session()->get('doctor')->id
            ])->first();

            if($checkPatient){
                if(!empty($request->mobile_number) && !empty($request->address) && !empty($request->age) && !empty($request->gender)){
                    $patientUpdate = DB::table('patients')->where([
                        'id' => $this->inputFilter($request->patient_id),
                    ])->update([
                        'mobile_number' => $this->inputFilter($request->mobile_number),
                        'adress' => $this->inputFilter($request->address),
                        'age' => $this->inputFilter($request->age),
                        'gender' => $this->inputFilter($request->gender),
                        'updated_at' => date('Y-m-d'),
                    ]);
                }

                if($diseases){
                    if(!empty($request->chronic_diseases) && !empty($request->diseases_notes)){
                        $diseasesUpdate = DB::table('diseases')->where([
                            'patient_id' => $this->inputFilter($request->patient_id),
                            'doctor_id' => session()->get('doctor')->id
                        ])->update([
                            'chronic_diseases' => $this->inputFilter($request->chronic_diseases),
                            'notes' => $this->inputFilter($request->diseases_notes),
                            'updated_at' => date('Y-m-d'),
                        ]);
                    }

                }
                return back();
            }


        }else{
            return redirect('login'); 
        }
    
    }
    //diagnosis
    public function editDiagnosis(Request $request){
        if(session()->has('doctor')){ 
            $request->validate([
                'diagnosis_details' => 'required',
                'diagnosis_notes' => 'required'
            ]);

            $diagnosis = DB::table('diagnosis')->where([
                'patient_id' => $request->patient_id,
                'doctor_id'  => session()->get('doctor')->id,
            ])->first();

            if($diagnosis){
                $diagnosisUpdate = DB::table('diagnosis')->where([
                    'patient_id' => $request->patient_id,
                    'doctor_id'  => session()->get('doctor')->id,
                ])->update([
                    'diagnosis_details' => $this->inputFilter($request->diagnosis_details),
                    'notes' => $this->inputFilter($request->diagnosis_notes),
                    'diagnosis_date' => date('Y-m-d'),
                ]);
                return back();
            }else{
                $diagnosisInsert = DB::table('diagnosis')->insert([
                    'patient_id' => $this->inputFilter($request->patient_id),
                    'doctor_id'  => session()->get('doctor')->id,
                    'diagnosis_details' => $this->inputFilter($request->diagnosis_details),
                    'notes' => $this->inputFilter($request->diagnosis_notes),
                    'diagnosis_date' => date('Y-m-d'),
                ]);
                return back();
            }
        }else{
            return redirect('login'); 
        }
    }
//End Edit-Page

//Start prescriptionInsert
    public function prescriptionInsert(Request $request){

        if(session()->has('doctor')){ 
            $request->validate([
                'notes' => 'required|string',
                'next_examination'  => 'required',
                'patient_id'  => 'required|int',
            ]);
            $patient = DB::table('patients')->where(['code_number' => $request->code])->first();
            $prescription = DB::table('prescription')->insertGetId([
                'patient_id'        => $this->inputFilter($request->patient_id),
                'doctor_id'         => session()->get('doctor')->id,
                'medicine'          => json_encode($request->medicine),
                'required_test'     => json_encode($request->test),
                'medical_radiology' => json_encode($request->medical),
                'notes' => $this->inputFilter($request->notes),
                'examination_date'  => date('Y-m-d'),
                'next_examination'  => $this->inputFilter($request->next_examination),
            ]);
            foreach($request->medicine as $medicine){
                $stat = DB::table('medicines')->where([
                    'name' => $medicine['name'],
                ])->first();
                
                if(!$stat){
                    DB::table('medicines')->insert([
                        'name' => $medicine['name'],
                    ]);
                }
            }
            if($request->diagnosis_details && $request->diagnosis_notes){
                $request->validate([
                    'diagnosis_details' => 'required',
                    'diagnosis_notes' => 'required'
                ]);
                $diagnosis = DB::table('diagnosis')->insert([
                    'patient_id' => $this->inputFilter($request->patient_id),
                    'doctor_id'  => session()->get('doctor')->id,
                    'diagnosis_details' => $this->inputFilter($request->diagnosis_details),
                    'notes' => $this->inputFilter($request->diagnosis_notes),
                ]);
            }
            if($prescription){
                return back()->with('prescriptionId',$prescription);
            }
        }else{
            return redirect('login'); 
        }
    }
//End prescriptionInsert

//Start Search To Medicine
    public function liveSearch(Request $request){
        //var_dump($request->medicine);die();
        if($request->medicine){
                $lives = DB::table('medicines')->where('name','like','%' . $request->medicine . '%')->get();
                foreach($lives as $live){
                    echo '<li>' . $live->name . '</li>';
                }
        }
    }
//End Search To Medicine


//Start Following UP Page
    public function followingUpView(){
        if(session()->has('doctor')){        
            $prescriptions = DB::table('prescription')->where([
                'doctor_id' => session()->get('doctor')->id,
                'next_examination' => date('Y-m-d')
            ])->paginate(10);

            $patientsFollowing = [];
            foreach($prescriptions as $prescription){
                $patient = DB::table('patients')->where(['id' => $prescription->patient_id])->first();
                if(!empty($patient)){
                    $patientsFollowing[] = $patient;
                }
            }
            return view('doctor.following-up',compact('patientsFollowing','prescriptions'));
        }else{
            return redirect('login'); 
        }
    }
//End Following UP Page

//Start {{Paying For}} Page
    public function payingFor(Request $request){
        if(session()->has('doctor')){        
            $patient = DB::table('patients')->where(['code_number' => $request->paying_for])->orWhere(['mobile_number' => $request->paying_for])->orWhere(['fullname' => $request->paying_for])->first();
            if($patient){
                $examination = DB::table('examinations')->where([
                    'patient_id' => $patient->id,
                    'doctor_id'  => session()->get('doctor')->id,
                ])->orderByDesc('id')->first();

                    $diseases = DB::table('diseases')->where([
                        'patient_id' => $patient->id,
                        'doctor_id'  => session()->get('doctor')->id,
                        ])->first();
                    
                    $prescriptions = DB::table('prescription')->where([
                        'patient_id' => $patient->id,
                        'doctor_id'  => session()->get('doctor')->id,
                    ])->get();
        
                    $patientEx = isset($examination) ? $examination : null;
                    $diseasesP = isset($diseases) ? $diseases : null;
        
                return view('doctor/patient-paying-page',compact('patient','patientEx','diseasesP'));
            }else{
                return back();
            }   
        }else{
            return redirect('login'); 
        }
    }

    public function payingForPost(Request $request){

        if(session()->has('doctor')){      
            $request->validate([
                'patient_id' => 'required|int',
                'examination_date'=>'required',
                'examination_type'=>'required',
                'price'=>'required',
                'final_price'=>'required',
            ]);  

            $patient = DB::table('patients')->where(['code_number' => $request->paying_for])->orWhere(['mobile_number' => $request->paying_for])->orWhere(['fullname' => $request->paying_for])->first();

            $examination = DB::table('examinations')->insert([
                'doctor_id' => session()->get('doctor')->id,
                'patient_id' => $this->inputFilter($request->patient_id),
                'examination_date' => $this->inputFilter($request->examination_date),
                'examination_type' => $this->inputFilter($request->examination_type),
                'price' => $this->inputFilter($request->price),
                'discount' => empty($this->inputFilter($request->discount)) ? 0 : $this->inputFilter($request->discount),
                'final_price' => $this->inputFilter($request->final_price),
            ]);

            if($examination){
                return back();
            }

        }else{
            return redirect('login'); 
        }

    }   
//End {{Paying For}} Page

//Start New Page
    public function newView(){
        if(session()->has('doctor')){
            $patient_examination = DB::table('examinations')->where([
                'doctor_id' => session()->get('doctor')->id,
                'examination_type' =>'new',
                'examination_date' => date("Y-m-d")
            ])->paginate(10);

            if($patient_examination){
                $patients = [];
                foreach($patient_examination as $ex){
                    $patient = DB::table('patients')->where(['id' => $ex->patient_id])->first();
                    if(!empty($patient)){
                        $patients[] = $patient;
                    }
                }
                if(isset($patients)){
                    return view('doctor.new',compact('patients','patient_examination'));
                }else{
                    return view('doctor.new');
                }
            }
        }else{
            return redirect('login'); 
        }
    }
//End New Page

//Start Resumption Page
    public function resumptionView(){
        if(session()->has('doctor')){
            $patient_examination = DB::table('examinations')->where([
                'doctor_id' => session()->get('doctor')->id,
                'examination_type' =>'resumption',
                'examination_date' => date("Y-m-d")
            ])->paginate(10);

            if($patient_examination){
                $patients = [];
                foreach($patient_examination as $ex){
                    $patient = DB::table('patients')->where(['id' => $ex->patient_id])->first();
                    if(!empty($patient)){
                        $patients[] = $patient;
                    }
                }
                
                if(isset($patients)){
                    return view('doctor.resumption',compact('patients','patient_examination'));
                }else{
                    return view('doctor.resumption');
                }
            }
        }else{
            return redirect('login'); 
        }
    }
//End Resumption Page

//Start Waiting Page
    public function waitingView(){
        if(session()->has('doctor')){
            $today_waiting = DB::table('examinations')->where([
                'doctor_id' => session()->get('doctor')->id,
                'examination_Date' => date('Y-m-d'),
            ])->paginate(12);
            return view('doctor.waiting',compact('today_waiting'));
        }else{
            return redirect('login'); 
        }
    }
//End Waiting Page

//Start Examination Page
    public function examinationView(Request $request){
        if(session()->has('doctor')){
            $patient = DB::table('patients')->where(['code_number' => $request->code])->first();
            if($patient){
                $patient_examination = DB::table('examinations')->where([
                    'doctor_id' => session()->get('doctor')->id,
                    'examination_date' => date("Y-m-d"),
                    'patient_id' => $patient->id
                ])->first();
    
                if($patient_examination){
                        $patient = DB::table('patients')->where([
                            'id' => $patient_examination->patient_id,
                            'code_number'=>$request->code 
                        ])->first();
                        $diseases = DB::table('diseases')->where([
                            'doctor_id' => session()->get('doctor')->id,
                            'patient_id' => $patient->id
                        ])->first();
                    if($patient){
                        return view('doctor.patient-examination-page',compact('patient','diseases'));
                    }else{
                        return back();
                    }
                }else{
                    return back();
                }
            }else{
                return back();
            }
        }else{
            return redirect('login'); 
        }
    }
//End Examination Page

//Start mini page
    public function miniView(Request $request){
        if(session()->has('doctor')){

            $doctor_info = DB::table('doctors_info')->where('doctor_id','=',session()->get('doctor')->id)->first();
            if(isset($request->code)){
                $patient = DB::table('patients')->where(['code_number' => $request->code])->orWhere(['mobile_number' => $request->code])->orWhere(['fullname' =>$request->code])->first();
                if($patient){
                    return view('doctor.mini',compact('doctor_info','patient'));
                }else{
                    return back();
                }
            }else{
                return view('doctor.mini',compact('doctor_info'));
            }
        }else{
            return redirect('doctor/login'); 
        }
    }

    public function miniPost(Request $request){
        if(session()->has('doctor')){
            $request->validate([
                'fullname' => 'required|min:3',
                'mobile' => 'required|min:6',
                'exam_type' => 'required|string',
                'gender' => 'required|string'
            ]);
            $patientInsert = DB::table('patients')->insertGetId([
                'fullname' => $this->inputFilter($request->fullname),
                'mobile_number' => $this->inputFilter($request->mobile),
                'code_number' => time(),
                'gender' => $this->inputFilter($request->gender),
                'created_at' => now()
            ]);

            if($patientInsert){
                $examInsert = DB::table('examinations')->insert([
                    'patient_id' => $patientInsert,
                    'doctor_id' => session()->get('doctor')->id,
                    'examination_type' => $this->inputFilter($request->exam_type),
                    'examination_date' => now()
                ]);
                return back()->with('patient_id', $patientInsert);
            }
        }else{
            return redirect('doctor/login'); 
        }
    }
    //prescriptionPrint
    public function prescriptionPrint($id){
        if(session()->has('doctor')){

            $doctor_info = DB::table('doctors_info')->where('doctor_id','=',session()->get('doctor')->id)->first();
            $prescription = DB::table('prescription')->where(['doctor_id' => session()->get('doctor')->id , 'id' => $id])->first();
            
                if($prescription ){
                    $patient = DB::table('patients')->where(['id' => $prescription->patient_id])->first();
                    if($patient){
                        return view('doctor.prescription',compact('doctor_info','patient','prescription'));
                    }else{
                        return redirect('doctor/login');
                    }
                }else{
                    return redirect('doctor/login');
                }

        }else{
            return redirect('doctor/login'); 
        }
    }

}
//End mini page