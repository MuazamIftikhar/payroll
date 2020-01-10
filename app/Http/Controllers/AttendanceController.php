<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use Illuminate\Http\Request;
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
        $employee_ID=Attendance::pluck('employee_id');
        if(count($employee_ID) > 0)
        {
            $employee=Employee::select(DB::raw('*,employees.id as e_id'))->whereNotIn('employees.id',$employee_ID)
                ->get();
        }else
        {
            $employee=Employee::select(DB::raw('*,employees.id as e_id'))->get();
        }
        return view('Attendance.index',["employee"=>$employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('attendance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_attendance()
    {
        $attendance=Attendance::select(DB::raw('*,attendances.id as a_id'))
            ->join('employees','attendances.employee_id','=','employees.id')->get();
        return view('Attendance.manage',compact('attendance'));
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
