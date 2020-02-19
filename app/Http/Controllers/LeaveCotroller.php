<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Company;
use App\Employee;
use App\Leaves;
use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function foo\func;

class LeaveCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id=$request->id;
        $deduction=Attendance::where('employee_id',$id)->get();
        $leave=Leaves::where('employee_id',$id)->get();
        return view('Leave.index',['id'=>$id,'deduction'=>$deduction,'leave'=>$leave]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_leave(Request $request)
    {
        $leave=Leaves::where('employee_id',$request->id)->get();
        if (count($leave) > 0) {
            Leaves::where('employee_id', '=', $request->id)
                ->update(['OB_PL' => $request->OB_PL,'OB_SL' => $request->OB_SL,'OB_CL' => $request->OB_CL,'D_PL' => $request->D_PL,'D_SL' => $request->D_SL,'D_CL' => $request->D_CL,
                    'E_PL' => $request->E_PL,'E_SL' => $request->E_SL,'E_CL' => $request->E_CL]);
            return redirect()->back()->with("success", "Leave Updated Successfully!");
        }else{
            $leave=new Leaves();
            $leave->employee_id=$request->id;
            $leave->OB_PL=$request->OB_PL;
            $leave->OB_SL=$request->OB_SL;
            $leave->OB_CL=$request->OB_CL;
            $leave->D_PL=$request->D_PL;
            $leave->D_SL=$request->D_SL;
            $leave->D_CL=$request->D_CL;
            $leave->CB_PL=$request->CB_PL;
            $leave->CB_SL=$request->CB_SL;
            $leave->CB_CL=$request->CB_CL;
            $leave->E_PL=$request->E_PL;
            $leave->E_SL=$request->E_SL;
            $leave->E_CL=$request->E_CL;
            $leave->save();
            return redirect()->back()->with("success", "Leave Added Successfully!");
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_leave(Request $request)
    {
        $companyName=Company::where('user_id','=',Auth::user()->id)->first()->id;
        $employee=Employee::where('company_id',$companyName)->get();
        $company=Company::where('user_id','=',Auth::user()->id)->get();
        return view('Leave.manageLeave',['employee'=> $employee,"company"=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_loan(Request $request)
    {
        $companyName=Company::where('user_id','=',Auth::user()->id)->first()->id;
        $employee=Employee::where('company_id',$companyName)->get();
        $company=Company::where('user_id','=',Auth::user()->id)->get();
        return view('Loan.index',['employee'=> $employee,"company"=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function loan(Request $request)
    {
        $id=$request->id;
        $loan=Loan::where('employee_id',$id)->get();
        return view('Loan.create',['id'=>$id,'loan'=>$loan]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_loan(Request $request)
    {
        $loan=Loan::where('employee_id',$request->id)->get();
        if (count($loan) > 0) {
            Loan::where('employee_id', '=', $request->id)
                ->update(['Date' => $request->Date,'Amount' => $request->Amount,'Month' => $request->Month,'monthlyInstallment' => $request->monthlyInstallment,'numberInstallment' => $request->numberInstallment
                    ,'Balance' => $request->Balance]);
            return redirect()->back()->with("success", "Loan Updated Successfully!");
        }else {
            $loan = new Loan();
            $loan->employee_id = $request->id;
            $loan->Date = $request->Date;
            $loan->Amount = $request->Amount;
            $loan->Month = $request->Month;
            $loan->monthlyInstallment = $request->monthlyInstallment;
            $loan->numberInstallment = $request->numberInstallment;
            $loan->Balance = $request->Balance;
            $loan->save();
            return redirect()->back()->with("success", "Loan Added Successfully!");
        }
    }
    public function searchByCompany_leave(Request $request)
    {
        $companyName=Company::where('user_id','=',Auth::user()->id)->where('id','=',$request->Name)->first()->id;
        $employee=Employee::where('company_id',$companyName)->get();
        $company=Company::where('user_id','=',Auth::user()->id)->get();
        return view('Leave.manageLeave',['employee'=> $employee,"company"=>$company]);

    }
    public function searchByCompany_loan(Request $request)
    {
        $companyName=Company::where('user_id','=',Auth::user()->id)->where('id','=',$request->Name)->first()->id;
        $employee=Employee::where('company_id',$companyName)->get();
        $company=Company::where('user_id','=',Auth::user()->id)->get();
        return view('Loan.index',['employee'=> $employee,"company"=>$company]);
    }
}
