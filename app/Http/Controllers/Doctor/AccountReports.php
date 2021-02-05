<?php
namespace App\Http\Controllers\Doctor;
use App\Http\Controllers\Controller;
use App\Models\examination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountReports extends Controller
{
    public function analysis(){
        if(session()->has('doctor')){
            // count patient for today
            $reports_today = examination::where([
                'doctor_id'=>session()->get('doctor')->id ,
                'examination_date' => date('Y-m-d'),
            ])->count();
            
            // count patient for this month
            $reports_this_month = examination::select('examination_date')->distinct()->where([
                'doctor_id'=>session()->get('doctor')->id ,
            ])->count();

            return view('doctor.home',compact('reports_today','reports_this_month'));
        }else{
            return redirect('doctor/login');
        }
    }

    public function allReports(Request $request){
        if(session()->has('doctor')){
            if(isset($request->from) && isset($request->to)){
                //search with between
                $reports = examination::select('examination_date')->distinct()->where('doctor_id',session()->get('doctor')->id)->whereBetween('examination_date',[$request->from,$request->to])->orderby('examination_date','asc')->paginate(10);
            }else{
                //all reports
                $reports = examination::select('examination_date')->distinct()->where('doctor_id',session()->get('doctor')->id)->orderby('examination_date','desc')->paginate(10);
            }
            return view('doctor/reports',compact('reports'));
        }else{
            return redirect('doctor/login');
        }
    }

    public function reportsForThisMonth(){
        if(session()->has('doctor')){
            $reports_this_month = examination::select('examination_date')->distinct()->where([
                'doctor_id'=>session()->get('doctor')->id ,
            ])->orderBy('id','desc')->whereMonth('examination_date' , '=' , date('m'))->paginate(10);
            
            return view('doctor.reports-this-month',compact('reports_this_month'));
        }else{
            return redirect('doctor/login');
        }
    }

    public function dayClosing(Request $request){
        if(session()->has('doctor')){
            if(isset($request->from) && isset($request->to)){
                //search with between
                $exams_of_day = examination::where([
                    'doctor_id'=>session()->get('doctor')->id
                ])->whereBetween('examination_date',[$request->from,$request->to])->orderBy('examination_date','desc')->paginate(10);
            
            }else{
                //exams day
                $exams_of_day = examination::where([
                    'doctor_id'=>session()->get('doctor')->id ,
                    'examination_date' => date('Y-m-d'),
                ])->orderBy('id','desc')->paginate(10);
            }

            return view('doctor/day-closing',compact('exams_of_day'));
        }else{
            return redirect('doctor/login');
        }
    }

    public function reportsForToDay(){
        if(session()->has('doctor')){
            $reports_today = examination::where([
                'doctor_id'=>session()->get('doctor')->id ,
                'examination_date' => date('Y-m-d'),
            ])->orderBy('id','desc')->paginate(10);
            return view('doctor.reports-today',compact('reports_today'));
        }else{
            return redirect('doctor/login');
        }
    }


}
