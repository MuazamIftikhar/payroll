<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\SalaryHead;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name=Company::where('user_id','=',Auth::user()->id)->get();
        return view('Employee.index',compact('name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $employee=new Employee();
        $employee->Name=$request->Name;
        $employee->fatherName=$request->fatherName;
        $employee->lastName=$request->lastName;
        $employee->DOB=$request->DOB;
        $employee->DOJ=$request->DOJ;
        $employee->DOE=$request->DOE;
        $employee->Gender=$request->Gender;
        $employee->Religion=$request->Religion;
        $employee->Phone=$request->Phone;
        $employee->Email=$request->Email;
        $employee->streetAddress=$request->streetAddress;
        $employee->City=$request->City;
        $employee->State=$request->State;
        $employee->zipCode=$request->zipCode;
        $employee->per_streetAddress=$request->per_streetAddress;
        $employee->per_City=$request->per_City;
        $employee->per_State=$request->per_State;
        $employee->per_zipCode=$request->per_zipCode;
        $employee->Designation=$request->Designation;
        $employee->company_id=$request->companyName;
        $employee->Status=$request->Status;
        $employee->bankName=$request->bankName;
        $employee->accountNumber=$request->accountNumber;
        $employee->ISFC=$request->ISFC;
        if ($request->hasFile('checkBook')) {
            $image = $request->file('checkBook');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $employee->checkBook=$name;
        }
        $employee->esicNumber=$request->esicNumber;
        $employee->UAN=$request->UAN;
        $employee->esicFlag=$request->esicFlag;
        $employee->PTFlag=$request->PTFlag;
        $employee->PFSaturating=$request->PFSaturating;
        $employee->PFFlag=$request->PFFlag;
        $employee->NameAsAdhar=$request->NameAsAdhar;
        $employee->adharNumber=$request->adharNumber;
        if ($request->hasFile('adharProof')) {
            $image = $request->file('adharProof');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $employee->adharProof=$name;
        }
        $employee->NameAsPan=$request->NameAsPan;
        $employee->panNumber=$request->panNumber;
        if ($request->hasFile('panProof')) {
            $image = $request->file('panProof');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $employee->panProof=$name;
        }
        $employee->family_firstName=json_encode($request->family_firstName);
        $employee->family_lastName=json_encode($request->family_lastName);
        $employee->family_Relation=json_encode($request->family_Relation);
        $employee->family_presentAddress=json_encode($request->family_presentAddress);
        $employee->family_permanentAddress=json_encode($request->family_permanentAddress);
        $employee->family_Nominee=json_encode($request->family_Nominee);
        $employee->family_DOB=json_encode($request->family_DOB);
        $employee->family_adharNumber=json_encode($request->family_adharNumber);
        $employee->Witness=json_encode($request->Witness);
        $employee->witnessAddress=json_encode($request->witnessAddress);
        $employee->save();
        return redirect()->back()->with("success" , "User Added Successfully!");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_employee()
    {

        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
        if (count($user) > 0){
            $companyName=Company::all();
            $employee=Employee::all();
        }
        else{
        $company=Company::where('user_id','=',Auth::user()->id)->first()->id;
        $employee=Employee::where('company_id',$company)
           ->get();
        $companyName=Company::where('user_id','=',Auth::user()->id)->get();
        }
        return view('Employee.manage',['employee'=>$employee,'company'=>$companyName]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_employee(Request $request)
    {
        Employee::where('id','=',$request->id)->delete();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_employee(Request $request)
    {
        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
        if (count($user) > 0){
            $company=Company::all();
        }
        else{
            $company=Company::where('user_id','=',Auth::user()->id)->get();
        }
        $employee=Employee::where('id','=',$request->id)->get();
        return view('Employee.edit',['employee' => $employee,'company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_employee(Request $request)
    {

        $Name=$request->Name;
        $fatherName=$request->fatherName;
        $lastName=$request->lastName;
        $DOB=$request->DOB;
        $DOJ=$request->DOJ;
        $DOE=$request->DOE;
        $Gender=$request->Gender;
        $Religion=$request->Religion;
        $Phone=$request->Phone;
        $Email=$request->Email;
        $streetAddress=$request->streetAddress;
        $City=$request->City;
        $State=$request->State;
        $zipCode=$request->zipCode;
        $per_streetAddress=$request->per_streetAddress;
        $per_City=$request->per_City;
        $per_State=$request->per_State;
        $per_zipCode=$request->per_zipCode;
        $Designation=$request->Designation;
        $companyName=$request->companyName;
        $Status=$request->Status;
        $bankName=$request->bankName;
        $accountNumber=$request->accountNumber;
        $ISFC=$request->ISFC;
        if ($request->hasFile('checkBook')) {
            $image = $request->file('checkBook');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $checkBook=$name;
        }else{
            $employee= Employee::where('id', '=', $request->id)->first();
            $checkBook = $employee->checkBook;
        }
        $esicNumber=$request->esicNumber;
        $UAN=$request->UAN;
        $esicFlag=$request->esicFlag;
        $PTFlag=$request->PTFlag;
        $PFSaturating=$request->PFSaturating;
        $PFFlag=$request->PFFlag;
        $NameAsAdhar=$request->NameAsAdhar;
        $adharNumber=$request->adharNumber;
        if ($request->hasFile('adharProof')) {
            $image = $request->file('adharProof');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $adharProof=$name;
        }else{
            $employee= Employee::where('id', '=', $request->id)->first();
            $adharProof = $employee->adharProof;
        }
        $NameAsPan=$request->NameAsPan;
        $panNumber=$request->panNumber;
        if ($request->hasFile('panProof')) {
            $image = $request->file('panProof');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $panProof=$name;
        }else{
            $employee= Employee::where('id', '=', $request->id)->first();
            $panProof = $employee->panProof;
        }
        $family_firstName=json_encode($request->family_firstName);
        $family_lastName=json_encode($request->family_lastName);
        $family_Relation=json_encode($request->family_Relation);
        $family_presentAddress=json_encode($request->family_presentAddress);
        $family_permanentAddress=json_encode($request->family_permanentAddress);
        $family_Nominee=json_encode($request->family_Nominee);
        $family_DOB=json_encode($request->family_DOB);
        $family_adharNumber=json_encode($request->family_adharNumber);

        $update=DB::table('employees')->where('id', '=', $request->id)->update(['Name' => $Name,'fatherName' => $fatherName,'lastName' => $lastName,'DOB' => $DOB,'DOJ' => $DOJ,'DOE' => $DOE,'Gender' => $Gender,
            'Religion' => $Religion,'Phone' => $Phone,'Email' => $Email,'streetAddress' => $streetAddress,'City' => $City,'State' => $State,'zipCode' => $zipCode,'per_streetAddress' => $per_streetAddress,
            'per_City' => $per_City,'per_State' => $per_State,'per_zipCode' => $per_zipCode,'Designation' => $Designation,'company_id' => $companyName,'Status' => $Status,'bankName' => $bankName,
            'accountNumber' => $accountNumber,'ISFC' => $ISFC,'checkBook' => $checkBook,'esicNumber' => $esicNumber,'UAN' => $UAN,'esicFlag' => $esicFlag,'PTFlag' => $PTFlag,'PFSaturating' => $PFSaturating,
            'PFFlag' => $PFFlag,'NameAsAdhar' => $NameAsAdhar,'adharNumber' => $adharNumber,'adharProof' => $adharProof,'NameAsPan' => $NameAsPan,'panNumber' => $panNumber,'panProof' => $panProof,
            'family_firstName' => $family_firstName,'family_lastName' => $family_lastName,'family_Relation' => $family_Relation,'family_presentAddress' => $family_presentAddress,'family_permanentAddress' => $family_permanentAddress,
            'family_Nominee' => $family_Nominee,'family_DOB' => $family_DOB,'family_adharNumber' => $family_adharNumber]);
        if ($update) {
            return redirect()->back()->with("success", "User Updated Successfully!");
        }
        else {
            return redirect()->back()->with("error", "User Updation Error!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchByCompany( Request $request)
    {


        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
        if (count($user) > 0){
            $employee=Employee::where('company_id',$request->Name)->get();
            $companyName=Company::all();
        }
        else{
            $company=Company::where('user_id','=',Auth::user()->id)->where('id','=',$request->Name)->first()->id;
            $employee=Employee::where('company_id',$company)->get();
            $companyName=Company::where('user_id','=',Auth::user()->id)->get();
        }
//        $employee=DB::table('employees')->select(DB::raw('*,employees.id as id'))
//            ->leftJoin('salaries', 'employees.id', '=', 'salaries.employee_id')
//            ->where('company_id','=',$request->Name)
//            ->get();
        return view('Employee.manage',['employee'=>$employee,'company'=>$companyName]);
    }
}