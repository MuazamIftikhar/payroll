<?php

namespace App\Http\Controllers;

use App\Company;
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
        $users = Role::where('id',2)->get();
        return view('Account.index',['users' => $users]);
    }
    public function company()
    {
        $users = Role::where('id',3)->get();
        return view('Account.company',['users' => $users]);
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
            if ($request->Role == "3")
            {
                $company_info=new Company();
                $company_info->user_id=$user->id;
                $company_info->companyName=$request->companyName;
                $company_info->Pin=$request->Pin;
                $company_info->City=$request->City;
                $company_info->District=$request->District;
                $company_info->State=$request->State;
                $company_info->Address=$request->Address;
                $company_info->EstType=$request->EstType;
                $company_info->ownershipType=$request->ownershipType;
                $company_info->save();
            }
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
        $user=User::select(DB::raw('*,users.name as user_name,users.id as user_col_id,roles.name as role_name,roles.id as role_id'))
            ->join('role_user','users.id','=','role_user.user_id')
            ->join('roles','role_user.role_id','=','roles.id')
            ->where('users.id','=',$request->id)
            ->first();

        if($user->role_id == "3"){
            $user=User::select(DB::raw('*,users.name as user_name,users.id as user_col_id,roles.name as role_name,roles.id as role_id'))
                ->join('companies','users.id','=','companies.user_id')
                ->join('role_user','users.id','=','role_user.user_id')
                ->join('roles','role_user.role_id','=','roles.id')
                ->where('users.id','=',$request->id)
                ->first();
            return view('Account.editCompany',['user' => $user,'roles' => $roles]);
        }else{

        return view('Account.edit',['user' => $user,'roles' => $roles]);
        }
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
            if ($request->Role == "3"){
                Company::where('user_id',$request->id)->update(['companyName'=>$request->companyName,'Pin'=>$request->Pin,'City'=>$request->City,'District'=>$request->District,
                    'State'=>$request->State,'Address'=>$request->Address,'EstType'=>$request->EstType,'ownershipType'=>$request->ownershipType]);
            }
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
