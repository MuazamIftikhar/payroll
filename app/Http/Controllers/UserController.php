<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Role;

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
}
