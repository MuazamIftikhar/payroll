<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\Role;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Role::whereIn('id',[2,3])->get();
        return view('Account.index',['users' => $users]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
            'Number' => 'required',
            'Email' => 'required',
            'Password' => 'required|confirmed',
            'Role' => 'required',
        ]);
        $user=new User();
        $user->name=$request->Name;
        $user->number=$request->Number;
        $user->email=$request->Email;
        $user->password=Hash::make($request->Password);
        if($user->save())
        {
            $demo = new \stdClass();
            $demo->username=$request->Name;
            $demo->password=$request->Password;
            $user->attachRole($request->Role);
            Mail::to($request->Email)->send(new WelcomeMail($demo));
            return redirect()->back()->with("success" , "User Added Successfully!");
        }
        else
        {
            return redirect()->back()->with("error" , "User Adding Failed!");
        }

    }

    public function manageAccount()
    {

            $user=User::select(DB::raw('*,users.name as user_name,users.id as user_col_id,roles.name as role_name'))
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('roles','role_user.role_id','=','roles.id')
                ->get();
        return view('Account.manage',['user' => $user]);
    }

    public function edit_user(Request $request)
    {
        $roles=Role::all();
        $user=User::select(DB::raw('*,users.name as user_name,users.id as user_col_id,roles.name as role_name'))
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','role_user.role_id','=','roles.id')
            ->where('users.id','=',$request->id)
            ->first();
        return view('Account.edit',['user' => $user,'roles' => $roles]);
    }
    public function delete_user(Request $request)
    {
        User::where('id','=',$request->id)->delete();
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
                 DB::table('role_user')->where('user_id', '=', $request->id)->update(['role_id' => $request->Role]);
                return redirect()->back()->with("success", "User Updated Successfully!");
            }
            else {
                return redirect()->back()->with("error", "User Updation Error!");
            }
        }
        catch (QueryException $e)
        {
            var_dump($e);
        }
    }
}
