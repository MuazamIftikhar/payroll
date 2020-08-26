<?php

namespace App\Http\Controllers;

use App\Company;
use App\company_basic;
use App\CompanyDeduction;
use App\Deduction;
use App\Employee;
use App\Esic;
use App\Overtime;
use App\Pf;
use App\Salary;
use App\SalaryHead;
use Carbon\Carbon;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salaryHead=SalaryHead::all();
        return view('Salary.index',compact('salaryHead'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function basicSalary()
    {
        $user=Employee::all();
        return view('Salary.basicSalary',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       $salary=new SalaryHead();
       $salary->name=$request->Name;
       $salary->save();
       return redirect()->route('salary_head');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_salary_head(Request $request)
    {
        $id=$request->id;
        $salaryHead=SalaryHead::where('id','=',$id)->get();
        return view('Salary.edit_salary_head',compact('salaryHead'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_salary_head(Request $request)
    {
        $id=$request->id;
        SalaryHead::where('id', '=', $id)
            ->update(['name' => $request->Name]);
        return redirect()->route('salary_head');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function salary()
    {
        $salary_ID = Salary::whereYear('created_at', '>=', date('Y'))->whereMonth('created_at', '>=', date('m'))->pluck('employee_id');
        $company=Company::where('user_id','=',Auth::user()->id)->first()->id;
        if (count($salary_ID) > 0) {
            $employee = Employee::select(DB::raw('*,employees.id as e_id'))->where('company_id','=',$company)
                    ->whereDate('DOE', '>=',date('Y-m-d') )->whereNotIn('employees.id', $salary_ID)->get();
        }else{
            $employee = Employee::select(DB::raw('*,employees.id as e_id'))->where('company_id','=',$company)
            ->whereDate('DOE', '>=',date('Y-m-d') )->get();
        }

        $company_id=Company::where('user_id','=',Auth::user()->id)->first()->id;
        //Checking If Slary Present for this comapnay
        $CountSalary = company_basic::where('company_id', '=',$company_id)->get();
        if(count($CountSalary) > 0){
            $getIds = company_basic::where('company_id', '=',$company_id)->first()->salary_head;
            $decodeIDs = json_decode($getIds);
            $namesOfsalaryHead=array();
            foreach ($decodeIDs as $i){
                $GetName = SalaryHead::where('id', '=', $i)->first();
                $namesOfsalaryHead[]=$GetName;
            }

            $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
            if (count($user) > 0){
                $companyName=Company::all();
            }else{
                $companyName=Company::where('user_id','=',Auth::user()->id)->get();
            }
            return view('Salary.basicSalary',['employee'=>$employee, 'salaryHead'=>$namesOfsalaryHead,'company'=>$companyName]);
        }else {
            return view('errors.fill')->with("error" , "You need to request admin to add Salary Head  first!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
    }
    public function save_salary(Request $request)
    {
        $company=Company::where('id','=',$request->Name)->where('user_id',Auth::user()->id)->first()->id;
        $getSalaryHaadIds=json_decode(company_basic::where('company_id','=',$company)->first()->salary_head);
        $salarHead=SalaryHead::whereIn('id',$getSalaryHaadIds)->pluck('id');
        $vs=array();
        foreach($salarHead as $n)
        {
            if($_POST[$n])
            {
               $vs=$this->array_push_assoc($vs,$n,$_POST[$n]);
            }
        }
        $salary=new Salary();
        $salary->employee_id=$request->id;
        $salary->salary_head=json_encode($vs);
        $salary->salary_flag=$request->salaryFlag;
        $salary->save();
        return redirect()->route('salary');

    }

    public function manage_salary()
    {
        $monthShow=date('Y-m');
        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
        if (count($user) > 0){
            $company=Company::first()->id;   
        }else{
        $company=Company::where('user_id','=',Auth::user()->id)->first()->id;
        }
        $employee=DB::table('employees')->select(DB::raw('*,employees.id as e_id'))
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->where('employees.company_id',$company)
            ->whereDate('DOE', '>=',date('Y-m-d') )
            ->get();

        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
        if (count($user) > 0){
            $companyName=Company::all();
            $company=Company::first()->id;   
        }
        else{
            $companyName=Company::where('user_id','=',Auth::user()->id)->get();
            $company=Company::where('user_id',Auth::user()->id)->first()->id;
        }
        
        $getSalaryHaadIds=json_decode(company_basic::where('company_id','=',$company)->first()->salary_head);
        $salaryHead=SalaryHead::whereIn('id',$getSalaryHaadIds)->get();
       
        return view('Salary.manageSalary',['employee'=>$employee, 'salaryHead'=>$salaryHead,'company'=>$companyName,'monthShow'=>$monthShow]);
    }
    public function delete_salary_head(Request $request)
    {
        SalaryHead::where('id','=',$request->id)->delete();
        return back();
    }
    public function edit_salary(Request $request)
    {
        $employee=DB::table('employees')->select(DB::raw('*,salaries.id as e_id,employees.id as employee_id,employees.company_id as c_id'))
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->where('salaries.id','=',$request->id)
            ->whereDate('DOE', '>=',date('Y-m-d') )
            ->get();
        $company=Company::where('id','=',$request->Name)->first()->id;
        $getSalaryHaadIds=json_decode(company_basic::where('company_id','=',$company)->first()->salary_head);
        $salaryHead=SalaryHead::whereIn('id',$getSalaryHaadIds)->get();
        return view('Salary.editSalary',['employee'=>$employee, 'salaryHead'=>$salaryHead]);
    }
    public function update_salary(Request $request)
    {
        $company=Company::where('id','=',$request->Name)->where('user_id',Auth::user()->id)->first()->id;
        $getSalaryHaadIds=json_decode(company_basic::where('company_id','=',$company)->first()->salary_head);
        $salarHead=SalaryHead::whereIn('id',$getSalaryHaadIds)->pluck('id');
        $vs=array();
        foreach($salarHead as $n)
        {
            if($_POST[$n])
            {
                $vs=$this->array_push_assoc($vs,$n,$_POST[$n]);
            }
        }
        $salary_head=json_encode($vs);
        $salary_flag=$request->salaryFlag;
        $id=$request->employee_id;
        $salary=Salary::where('employee_id', '=', $id)
            ->whereMonth('created_at', '=', date('m'))->get();
        if (count($salary) >0){
        Salary::where('id', '=', $request->id)
            ->update(['salary_head' => $salary_head,'salary_flag'=>$salary_flag]);
        }else{
            $salary=new Salary();
            $salary->employee_id=$request->employee_id;
            $salary->salary_head=json_encode($vs);
            $salary->salary_flag=$request->salaryFlag;
            $salary->save();
        }
        return redirect()->route('manage_salary');
    }
    public function manage_salary_month( Request $request)
    {
        $date=explode('-',$request->date);
        $year=$date[0];
        $month=$date[1];
        $employee=DB::table('employees')->select(DB::raw('*,employees.id as e_id'))
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->whereMonth('salaries.created_at', '=', $month)
            ->whereYear('salaries.created_at', '=', $year)
            ->get();
        $salaryHead=SalaryHead::all();
        return view('Salary.manageSalary',['employee'=>$employee, 'salaryHead'=>$salaryHead]);
    }

    public function company_basic(Request $request)
    {
        $salaryHead=SalaryHead::all();
        return view('Salary.assign',[ 'salaryHead'=>$salaryHead,'id'=>$request->id]);
    }
    public function save_company_basic(Request $request)
    {
        $id=company_basic::where('company_id','=',$request->id)->get();
        if (count($id)  <=  0) {
            $salary = new company_basic();
            $salary->company_id = $request->id;
            $salary->salary_head = json_encode($request->salaryHead);
            $salary->save();
        }else{
            company_basic::where('id', '=', $id[0]->id)
                ->update(['company_id' => $request->id, 'salary_head' => json_encode($request->salaryHead)]);
        }
        return redirect()->route('manage_company_basic');
    }

    public function save_esic_basic(Request $request)
    {
        $id=Esic::where('company_id','=',$request->id)->get();
        if (count($id)  <=  0) {
            $salary = new Esic();
            $salary->company_id = $request->id;
            $salary->salary_head = json_encode($request->salaryHead);
            $salary->save();
        }else{
            Esic::where('id', '=', $id[0]->id)
                ->update(['company_id' => $request->id, 'salary_head' => json_encode($request->salaryHead)]);
        }
        return redirect()->route('manage_company_basic');
    }
    public function save_pf_basic(Request $request)
    {
        $id=Pf::where('company_id','=',$request->id)->get();
        if (count($id)  <=  0) {
            $salary = new Pf();
            $salary->company_id = $request->id;
            $salary->salary_head = json_encode($request->salaryHead);
            $salary->save();
        }else{
            Pf::where('id', '=', $id[0]->id)
                ->update(['company_id' => $request->id, 'salary_head' => json_encode($request->salaryHead)]);
        }
        return redirect()->route('manage_company_basic');
    }

    public function save_overtime_basic(Request $request)
    {
        $id=Overtime::where('company_id','=',$request->id)->get();
        if (count($id)  <=  0) {
            $salary = new Overtime();
            $salary->company_id = $request->id;
            $salary->salary_head = json_encode($request->salaryHead);
            $salary->save();
        }else{
            Overtime::where('id', '=', $id[0]->id)
                ->update(['company_id' => $request->id, 'salary_head' => json_encode($request->salaryHead)]);
        }
        return redirect()->route('manage_company_basic');
    }
    public function save_company_deduction(Request $request)
    {

        $salary=new CompanyDeduction();
        $salary->company_id=$request->id;
        $salary->deduction=json_encode($request->deduction);
        $salary->save();
        return redirect()->route('manage_company_basic');
    }
    public function manage_company_basic(Request $request)
    {
        $company=Company::select(DB::raw('*,companies.id as c_id'))
            ->join('company_infos','companies.user_id','=','company_infos.user_id')
            ->join('users','companies.user_id','=','users.id')
            ->get();
        return view('Salary.manageAssign',compact('company'));
    }

    public function searchByCompany_salary(Request $request)
    {
        $salary_ID = Salary::whereYear('created_at', '>=', date('Y'))->whereMonth('created_at', '>=', date('m'))->pluck('employee_id');
        if (count($salary_ID) > 0) {
            $employee = Employee::select(DB::raw('*,employees.id as e_id'))->where('company_id','=',$request->Name)
                ->whereDate('DOE', '>=',date('Y-m-d') )->whereNotIn('employees.id', $salary_ID)
                ->get();
        } else {
            $employee = Employee::select(DB::raw('*,employees.id as e_id'))->where('company_id','=',$request->Name)
                ->whereDate('DOE', '>=',date('Y-m-d') )->get();
        }
        $company_id=Company::where('user_id','=',Auth::user()->id)->where('id','=',$request->Name)->first()->id;
        $getIds = company_basic::where('company_id', '=',$company_id)->first()->salary_head;
        $decodeIDs = json_decode($getIds);
        $namesOfsalaryHead=array();
        foreach ($decodeIDs as $i){
            $GetName = SalaryHead::where('id', '=', $i)->first();
            $namesOfsalaryHead[]=$GetName;
        }
        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
        if (count($user) > 0){
            $companyName=Company::all();
        }
        else{
            $companyName=Company::where('user_id','=',Auth::user()->id)->get();
        }
        return view('Salary.basicSalary',['employee'=>$employee, 'salaryHead'=>$namesOfsalaryHead,'company'=>$companyName]);
    }
    public function searchByCompany_manageSalary(Request $request)
    {
        $monthShow=$request->Month;
        $date=explode('-',$request->Month);
        $year=$date[0];
        $month=$date[1];
        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
        if (count($user) > 0){
            $company=Company::where('id','=',$request->Name)->first()->id;   
        }else{
            $company=Company::where('user_id','=',Auth::user()->id)->where('id','=',$request->Name)->first()->id;
        }
        $employee=DB::table('employees')->select(DB::raw('*,employees.id as e_id,salaries.created_at as s_created_at'))
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->where('employees.company_id',$company)
            ->whereYear('salaries.created_at', '=', $year)->whereMonth('salaries.created_at', '=', $month)
            ->whereDate('DOE', '>=',date('Y-m-d') )
            ->get();
        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
            if (count($user) > 0){
                $companyName=Company::all();
                $company=Company::where('id','=',$request->Name)->first()->id; 
            }
            else{
            $companyName=Company::where('user_id','=',Auth::user()->id)->get();
            $company=Company::where('id','=',$request->Name)->where('user_id',Auth::user()->id)->first()->id;
            }
        $getSalaryHaadIds=json_decode(company_basic::where('company_id','=',$company)->first()->salary_head);
        $salaryHead=SalaryHead::whereIn('id',$getSalaryHaadIds)->get();
       
        return view('Salary.manageSalary',['employee'=>$employee, 'salaryHead'=>$salaryHead,'company'=>$companyName,'monthShow'=>$monthShow]);
    }

}
