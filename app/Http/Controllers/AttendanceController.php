<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Company;
use App\Employee;
use App\Loan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd(Carbon::now()->addMonths(2)->format('yy-m'));
        $employee_ID=Attendance::whereYear('created_at', '>=', date('Y'))->whereMonth('created_at', '>=', date('m'))->pluck('employee_id');
        $company=Company::where('user_id','=',Auth::user()->id)->first()->id;
        if(count($employee_ID) > 0){
            $employee=Employee::select(DB::raw('*,employees.id as e_id'))
                ->leftjoin('leaves','employees.id','=','leaves.employee_id')
                ->leftjoin('loans','employees.id','=','loans.employee_id')
                ->where('employees.company_id',$company)
                ->whereYear('DOE', '>=', date('Y'))->whereMonth('DOE', '>=', date('m'))
                ->whereNotIn('employees.id',$employee_ID)->get();
        }else{
            $employee=Employee::select(DB::raw('*,employees.id as e_id'))
                ->leftjoin('leaves','employees.id','=','leaves.employee_id')
                ->leftjoin('loans','employees.id','=','loans.employee_id')
                ->where('employees.company_id',$company)
                ->whereYear('DOE', '>=', date('Y'))->whereMonth('DOE', '>=', date('m'))
               ->get();
        }
        $company=Company::where('user_id','=',Auth::user()->id)->get();
        return view('Attendance.index',["employee"=>$employee,"company"=>$company]);
    }

    public static function CheckLoan($user_id){
        $month=Carbon::now()->format('yy-m');
        $CheckLoan=Loan::where('employee_id','=',$user_id)->where('Month','<=',$month)->first();
        return $CheckLoan;
    }

    public function save_attendance(Request $request)
    {
        $attendance=new Attendance();
        $attendance->employee_id=$request->id;
        $attendance->PR_Day=$request->PR_Day;
        $attendance->PL=$request->PL;
        $attendance->SL=$request->SL;
        $attendance->CL=$request->CL;
        $attendance->PH=$request->PH;
        $attendance->Total=$request->Total;
        $attendance->Advance=$request->Advance;
        $attendance->Loan=$request->Loan;
        $attendance->Deduction=$request->Deduction;
        $attendance->OT=$request->OT;
        $attendance->save();

        $balance=Loan::where('employee_id','=',$request->id)->first()->Balance;
        $numberInstallment=Loan::where('employee_id','=',$request->id)->first()->numberInstallment;
        if($balance)
        {
            $numberInstallment=$numberInstallment-1;
            $amount=$balance-$request->Loan;
            Loan::where('employee_id', '=', $request->id)
                ->update(['Balance' => $amount,'numberInstallment'=>$numberInstallment]);
        }
        return redirect()->route('attendance');
    }

    public function manage_attendance()
    {
        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
        if (count($user) > 0){
            $companyName=Company::first()->id; 
            $company=Company::all();  
        }else{
        $companyName=Company::where('user_id','=',Auth::user()->id)->first()->id;
        $company=Company::where('user_id','=',Auth::user()->id)->get();
        }
        $attendance=Attendance::select(DB::raw('*,attendances.id as a_id,employees.id as e_id'))
            ->join('employees','attendances.employee_id','=','employees.id')
            ->where('employees.company_id',$companyName)->get();
        return view('Attendance.manage',["attendance"=>$attendance,"company"=>$company]);
    }
    public function edit_attendance(Request $request)
    {
        $employee_ID=$request->id;
        $employee=Employee::select(DB::raw('*,employees.id as e_id'))
            ->join('attendances','employees.id','=','attendances.employee_id')
            ->where('employees.id',$employee_ID)
            ->get();
        return view('Attendance.edit',["employee"=>$employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_attendance(Request $request)
    {
        Attendance::where('id','=',$request->id)->delete();
        return back();
    }
    public function update_attendance(Request $request)
    {
        Attendance::where('id','=',$request->id)
            ->update(['PR_Day' => $request->PR_Day,'PL' => $request->PL,'SL' => $request->SL,'CL' => $request->CL,'PH' => $request->PH,'Total' => $request->Total,'Advance' => $request->Advance,
                'Loan' => $request->Loan,'Deduction' => $request->Deduction,'OT' => $request->OT]);
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchByCompany_attendance(Request $request)
    {
        $employee_ID=Attendance::pluck('employee_id');
        $company=Company::where('user_id','=',Auth::user()->id)->where('id','=',$request->Name)->first()->id;
        if(count($employee_ID) > 0){
            $employee=Employee::select(DB::raw('*,employees.id as e_id'))
                ->leftjoin('leaves','employees.id','=','leaves.employee_id')
                ->leftjoin('loans','employees.id','=','loans.employee_id')
                ->where('employees.company_id',$company)
                ->whereNotIn('employees.id',$employee_ID)->get();
        }else{
            $employee=Employee::select(DB::raw('*,employees.id as e_id'))
                ->leftjoin('leaves','employees.id','=','leaves.employee_id')
                ->leftjoin('loans','employees.id','=','loans.employee_id')
                ->where('employees.company_id',$company)
                ->get();
        }
        $company=Company::where('user_id','=',Auth::user()->id)->get();
        return view('Attendance.index',["employee"=>$employee,"company"=>$company]);
    }
    public function searchByCompany_manageAttendance(Request $request)
    {
        $date=explode('-',$request->Month);
        $year=$date[0];
        $month=$date[1];
        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
        if (count($user) > 0){
            $companyName=Company::where('id','=',$request->Name)->first()->id; 
            $company=Company::all();  
        }else{
        $companyName=Company::where('user_id','=',Auth::user()->id)->where('id','=',$request->Name)->first()->id;
        $company=Company::where('user_id','=',Auth::user()->id)->get();
        }
        $attendance=Attendance::select(DB::raw('*,attendances.id as a_id,employees.id as e_id'))
            ->join('employees','attendances.employee_id','=','employees.id')
            ->where('employees.company_id',$companyName)
            ->whereYear('DOE', '>=', date('Y'))->whereMonth('DOE', '>=', date('m'))
            ->whereYear('attendances.created_at', '=', $year)->whereMonth('attendances.created_at', '=', $month)
            ->get();
        return view('Attendance.manage',["attendance"=>$attendance,"company"=>$company]);
    }

}
