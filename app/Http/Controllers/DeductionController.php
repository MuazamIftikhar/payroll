<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyDeduction;
use App\Deduction;
use App\Ptax;
use App\SalaryHead;
use Illuminate\Http\Request;

class DeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id=$request->id;
        $salaryHead=SalaryHead::all();
        $companyDeduction=CompanyDeduction::all();
        return  view('Deduction.index',['id'=>$id,'salaryHead'=>$salaryHead,'companyDeduction'=>$companyDeduction]);
    }
    public function esic_deduction(Request $request)
    {
        $id=$request->id;
        $salaryHead=SalaryHead::all();
        $companyDeduction=CompanyDeduction::all();
        return  view('Deduction.ESIC',['id'=>$id,'salaryHead'=>$salaryHead,'companyDeduction'=>$companyDeduction]);
    }
    public function ptax()
    {
        $ptax=Ptax::all();
        return  view('Deduction.Ptax',['ptax'=>$ptax]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save_deduction(Request $request)
    {
        $deduction=new Deduction();
        $deduction->Description=$request->Description;
        $deduction->Amount=$request->Amount;
        $deduction->Percentage=$request->Percentage;
        $deduction->State=$request->State;
        $deduction->Per=$request->Per;
        $deduction->save();
        return back()->with("success" , "Deduction Added Successfully!");
    }
    public function save_ptax(Request $request)
    {
        Ptax::where('id', '=',1)
            ->update(['value1' => $request->value1,'value2' => $request->value2,'value3' => $request->value3 ,'value4' => $request->value4,'value5'=> $request->value5]);
        return back()->with("success" , "Deduction Updated Successfully!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_deduction(Request $request)
    {
        $company=Company::all();
        return view('Deduction.manage',compact('company'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_deduction(Request $request)
    {
        Deduction::where('id','=',$request->id)->delete();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function company_deduction()
    {
        $company=CompanyDeduction::all();
        return view('Deduction.deduction',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_company_deduction(Request $request)
    {
        $company=new CompanyDeduction();
        $company->name=$request->Name;
        $company->save();
        return redirect()->route('company_deduction');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_company_deduction(Request $request)
    {
        $id=$request->id;
        $salaryHead=CompanyDeduction::where('id','=',$id)->get();
        return view('Deduction.editDeduction',compact('salaryHead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_company_deduction(Request $request)
    {
        $id=$request->id;
        CompanyDeduction::where('id', '=', $id)
            ->update(['name' => $request->Name]);
        return redirect()->route('company_deduction');
    }
}
