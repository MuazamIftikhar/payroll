<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Salary;
use App\SalaryHead;
use Illuminate\Http\Request;
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
        $salary_ID=Salary::pluck('employee_id');
        if(count($salary_ID) > 0)
        {
            $employee=Employee::select(DB::raw('*,employees.id as e_id'))->whereNotIn('employees.id',$salary_ID)
                ->get();
        }else
        {
            $employee=Employee::select(DB::raw('*,employees.id as e_id'))->get();
        }
        $salaryHead=SalaryHead::all();
        return view('Salary.basicSalary',['employee'=>$employee, 'salaryHead'=>$salaryHead]);
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
        $salarHead=SalaryHead::pluck('name');
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
        $employee=DB::table('employees')->select(DB::raw('*,employees.id as e_id'))
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->get();
        $salaryHead=SalaryHead::all();

        return view('Salary.manageSalary',['employee'=>$employee, 'salaryHead'=>$salaryHead]);
    }
    public function delete_salary_head(Request $request)
    {
        SalaryHead::where('id','=',$request->id)->delete();
        return back();
    }
    public function edit_salary(Request $request)
    {
        $employee=DB::table('employees')->select(DB::raw('*,salaries.id as e_id,employees.id as employee_id'))
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->where('salaries.id','=',$request->id)
            ->get();
        $salaryHead=SalaryHead::all();
        return view('Salary.editSalary',['employee'=>$employee, 'salaryHead'=>$salaryHead]);
    }
    public function update_salary(Request $request)
    {
        $salarHead=SalaryHead::pluck('name');
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
        $id=$request->id;
        $salary=Salary::where('employee_id', '=', $id)
            ->whereMonth('created_at', '=', date('m'))->get();
        if (count($salary) >0){
        Salary::where('id', '=', $id)
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
}
