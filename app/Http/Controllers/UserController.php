<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Salary;
use App\Token;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Role;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class UserController extends Controller
{
    //
    public function create_user()
    {
        $roles=Role::all();
        return view('User.index',['roles' => $roles]);
    }
    public function save_user(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
            'Number' => 'required',
            'Email' => 'required',
            'Password' => 'required',
            'Role' => 'required',
        ]);
        $user=new User();
        $user->name=$request->Name;
        $user->number=$request->Number;
        $user->email=$request->Email;
        $user->password=Hash::make($request->Password);
        if($user->save())
        {
            $user->attachRole($request->Role);
            return redirect()->back()->with("success" , "User Added Successfully!");

        }
        else
        {
            return redirect()->back()->with("error" , "User Adding Failed!");
        }
    }
    public function manage_user()
    {
        $user=User::select(DB::raw('*,users.name as user_name,users.id as user_col_id,roles.name as role_name'))
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','role_user.role_id','=','roles.id')
            ->get();
        return view('User.manage',['user' => $user]);
    }
    public function edit_user(Request $request)
    {
        $roles=Role::all();
        $user=User::select(DB::raw('*,users.name as user_name,users.id as user_col_id,roles.name as role_name'))
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','role_user.role_id','=','roles.id')
            ->where('users.id','=',$request->id)
            ->first();
        //var_dump($user);
        return view('User.edit',['user' => $user,'roles' => $roles]);
    }
    public function delete_user(Request $request)
    {
     $delete=User::where('id','=',$request->id)->delete();
     return back();
    }
    public function update_user(Request $request)
    {
        try {
            $this->validate($request, [
                'Name' => 'required',
                'Number' => 'required',
                'Email' => 'required',
                'Role' => 'required',
            ]);
            $password = $request->Password;
            if (empty($password)) {
                $user_data = User::where('id', '=', $request->id)->first();
                $password = $user_data->password;
            } else {
                $password = Hash::make($request->Password);
            }
            $user = User::where('id', '=', $request->id)
                ->update(['name' => $request->Name, 'email' => $request->Email, 'number' => $request->Number, 'password' => $password]);
            if ($user) {
                $updateRole = DB::table('role_user')->where('user_id', '=', $request->id)->update(['role_id' => $request->Role]);
                if ($updateRole) {
                    return redirect()->back()->with("success", "User Updated Successfully!");
                } else {
                    return redirect()->back()->with("error", "User Updation Error!");
                }
            }
        }
        catch (QueryException $e)
        {
            var_dump($e);
        }
    }
//    public function saveToken(Request $request){
//        $checkFirstIfHaveToken=Token::where('user_id','=',Auth::user()->id)
//            ->where('type','=',$request->type)->get();
//        if(count($checkFirstIfHaveToken) > 0){
//            $update=Token::where('user_id','=',Auth::user()->id)
//                ->where('type','=',$request->type)->update(['token' => $request->token]);
//        }else {
//            $saveNotificationToken = new Token();
//            $saveNotificationToken->user_id = Auth::user()->id;
//            $saveNotificationToken->token = $request->token;
//            $saveNotificationToken->type = $request->type;
//            $saveNotificationToken->save();
//        }
//    }
    public static function getBasicSalary($id){

        $row=Salary::where('employee_id','=',$id)->get();
        if(count($row) > 0){
        $row=Salary::where('employee_id','=',$id)->first();
        $salary=json_decode($row->salary_head);
        foreach($salary  as $x => $x_value)
        {
            if($x ==  "1"){
                return $x_value;
            }
        }
        }else{
            return "0";
        }
    }

    public static function getDays($id,$fromMonth,$toMonth){
        $row=Attendance::select(DB::raw('SUM(PR_Day) AS days'))->where('employee_id','=',$id)
            ->where('Month','>=',$fromMonth)
            ->where('Month','<=',$toMonth)
            ->groupBy('employee_id')->get();
        if (count($row) > 0){
        $days=$row[0]->days;
        }else{
            $days=0;
        }
        return $days;
    }
    public static function getSalary($id,$basic,$salary_flag,$fromMonth,$toMonth){
        $row=Attendance::where('employee_id','=',$id)
            ->where('Month','>=',$fromMonth)
            ->where('Month','<=',$toMonth)
            ->get();
        $total_value=0;
        $salary=0;
        if (count($row) > 0) {
            foreach ($row as $s) {
                if ($salary_flag == "Per Day") {
                    $val_salary = round($s->Total * $basic, 0);
                } else {
                    $val_salary = round($basic / $s->assignDay * $s->Total, 0);
                }
                $salary = $salary + $val_salary;
            }
        }else{
            $salary=0;
        }
//        $row=Attendance::select(DB::raw('SUM(Total) AS Total,SUM(assignDay) as a_today'))->where('employee_id','=',$id)
//            ->where('Month','>=',$fromMonth)
//            ->where('Month','<=',$toMonth)->groupBy('employee_id')->get();
//
//        $row_count=Attendance::where('employee_id','=',$id)
//            ->where('Month','>=',$fromMonth)
//            ->where('Month','<=',$toMonth)->get();
//
//        if (count($row) > 0) {
//            $total = $row[0]->Total;
//            $assignDay = $row[0]->a_today;
//            $count_row=count($row_count);
//            if($salary_flag == "Per Day"){
//                $salary=round($total*($basic*$count_row),0);}
//            else{
//                $salary=round(($basic*$count_row)/$assignDay*$total,0);
//            }
//        }else{
//            $salary=0;
//        }

        return $salary;
    }

    public static function getbonus($id,$basic,$salary_flag,$fromMonth,$toMonth){
        $row=Attendance::where('employee_id','=',$id)
            ->where('Month','>=',$fromMonth)
            ->where('Month','<=',$toMonth)
            ->get();
        $total_value=0;
        if (count($row) > 0) {
            foreach ($row as $s) {
                if ($salary_flag == "Per Day") {
                    $salary = round($s->Total * $basic, 0);
                } else {
                    $salary = round($basic / $s->assignDay * $s->Total, 0);
                }
                if ($salary < "8200") {
                    // return $x_value;
                    $value = ($salary / 100) * 20;
                } else {
                    $value = 1640;
                }
                $total_value = $total_value + $value;
            }
        }else{
            $total_value=0;
        }
        return $total_value;
    }
}
