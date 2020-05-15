<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Estimation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EstimationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $est=Company::join('users','companies.user_id','=','users.id')
            ->join('company_infos','companies.user_id','=','company_infos.user_id')
            ->where('companies.user_id',Auth::user()->id)
            ->first();
        return view('Est.index',compact('est'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $id=Estimation::where('user_id','=',Auth::user()->id)->get();
        if (count($id)  <= 0){
        $est=new Estimation();
        $est->user_id=Auth::user()->id;
        $est->Factory=$request->Factory;
        $est->ownerName=json_encode($request->ownerName);
        $est->ownerMobile=json_encode($request->ownerMobile);
        $est->ownerEmail=json_encode($request->ownerEmail);
        $est->Pan=json_encode($request->Pan);
        $est->Designation=json_encode($request->Designation);
        $est->ownerRemarks=json_encode($request->ownerRemarks);
        $est->f_license_doccument=$request->f_license_doccument;
        $est->f_license_doa=$request->f_license_doa;
        $est->f_license_doe=$request->f_license_doe;
        $est->f_license_renewal=$request->f_license_renewal;
        if ($request->hasFile('f_license_doc_upload')) {
            $image = $request->file('f_license_doc_upload');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->f_license_doc_upload=$name;

        }
        $est->f_license_remarks=$request->f_license_remarks;
        $est->l_lic_doccument=$request->l_lic_doccument;
        $est->l_lic_doa=$request->l_lic_doa;
        $est->l_lic_doe=$request->l_lic_doe;
        $est->l_lic_renewal=$request->l_lic_renewal;
        $est->l_lic_renewal=$request->l_lic_renewal;
        if ($request->hasFile('l_lic_doc_upload')) {
            $image = $request->file('l_lic_doc_upload');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->l_lic_doc_upload=$name;
        }
        $est->l_lic_remarks=$request->l_lic_remarks;
        $est->EPF_doccument=$request->EPF_doccument;
        $est->EPF_doa=$request->EPF_doa;
        $est->EPF_doe=$request->EPF_doe;
        $est->EPF_renewal=$request->EPF_renewal;
        if ($request->hasFile('EPF_doc_upload')) {
            $image = $request->file('EPF_doc_upload');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->EPF_doc_upload=$name;
        }
        $est->EPF_remarks=$request->EPF_remarks;
        $est->ESIC_doccument=$request->ESIC_doccument;
        $est->ESIC_doa=$request->ESIC_doa;
        $est->ESIC_doe=$request->ESIC_doe;
        $est->ESIC_renewal=$request->ESIC_renewal;
        if ($request->hasFile('ESIC_doc_upload')) {
            $image = $request->file('ESIC_doc_upload');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->ESIC_doc_upload=$name;
        }
        $est->ESIC_remarks=$request->ESIC_remarks;
        $est->PAN_doccument=$request->PAN_doccument;
        $est->PAN_doa=$request->PAN_doa;
        $est->PAN_doe=$request->PAN_doe;
        $est->PAN_renewal=$request->PAN_renewal;
        if ($request->hasFile('PAN_doc_upload')) {
            $image = $request->file('PAN_doc_upload');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->PAN_doc_upload=$name;
        }
        $est->PAN_remarks=$request->PAN_remarks;
        $est->PT_EST_doccument=$request->PT_EST_doccument;
        $est->PT_EST_doa=$request->PT_EST_doa;
        $est->PT_EST_doe=$request->PT_EST_doe;
        $est->PT_EST_renewal=$request->PT_EST_renewal;
        if ($request->hasFile('PT_EST_doc_upload')) {
            $image = $request->file('PT_EST_doc_upload');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->PT_EST_doc_upload=$name;
        }
        $est->PT_EST_remarks=$request->PT_EST_remarks;
        $est->PT_EE_doccument=$request->PT_EE_doccument;
        $est->PT_EE_doa=$request->PT_EE_doa;
        $est->PT_EE_doe=$request->PT_EE_doe;
        $est->PT_EE_renewal=$request->PT_EE_renewal;
        if ($request->hasFile('PT_EE_doc_upload')) {
            $image = $request->file('PT_EE_doc_upload');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->PT_EE_doc_upload=$name;
        }
        $est->PT_EE_remarks=$request->PT_EE_remarks;
        $est->LWF_doccument=$request->LWF_doccument;
        $est->LWF_doa=$request->LWF_doa;
        $est->LWF_doe=$request->LWF_doe;
        $est->LWF_renewal=$request->LWF_renewal;
        if ($request->hasFile('LWF_doc_upload')) {
            $image = $request->file('LWF_doc_upload');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->LWF_doc_upload=$name;
        }
        $est->LWF_remarks=$request->LWF_remarks;
        $est->GST_doccument=$request->GST_doccument;
        $est->GST_doa=$request->GST_doa;
        $est->GST_doe=$request->GST_doe;
        $est->GST_renewal=$request->GST_renewal;
        if ($request->hasFile('GST_doc_upload')) {
            $image = $request->file('GST_doc_upload');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->GST_doc_upload=$name;
        }
        $est->GST_remarks=$request->GST_remarks;
        $est->Digital_doccument=$request->Digital_doccument;
        $est->Digital_doa=$request->Digital_doa;
        $est->Digital_doe=$request->Digital_doe;
        $est->Digital_renewal=$request->Digital_renewal;
        if ($request->hasFile('Digital_doc_upload')) {
            $image = $request->file('Digital_doc_upload');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->Digital_doc_upload=$name;
        }
        $est->Digital_remarks=$request->Digital_remarks;
        $est->doccument_name=$request->doccument_name;
        $est->doccument=$request->doccument;
        $est->doa=$request->doa;
        $est->doe=$request->doe;
        $est->renewal=$request->renewal;
        if ($request->hasFile('doc_upload')) {
            $image = $request->file('doc_upload');
            $name = time().'.'.$image->getClientOriginalName();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $est->doc_upload=$name;
        }
        $est->remarks=$request->remarks;
        $est->save();
        return redirect()->back()->with("success", "User Updated Successfully!");
        }else{
           return redirect()->back()->with("error", "User Already ADD This!");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_estimation()
    {
        $user=DB::table('role_user')->where('user_id','=',Auth::user()->id)->where('role_id','!=','3')->get();
        if (count($user) > 0) {
            $estimation = Estimation::select(DB::raw('*,estimations.id as e_id'))
                ->join('companies', 'estimations.user_id', '=', 'companies.user_id')
                ->join('company_infos', 'estimations.user_id', '=', 'company_infos.user_id')
                ->get();
        }else{
            $estimation = Estimation::select(DB::raw('*,estimations.id as e_id'))
                ->join('companies', 'estimations.user_id', '=', 'companies.user_id')
                ->join('company_infos', 'estimations.user_id', '=', 'company_infos.user_id')
                ->where('estimations.user_id','=',Auth::user()->id)
                ->get();

        }
        return view('Est.manage',compact('estimation'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_est(Request $request)
    {
        Estimation::where('id','=',$request->id)->delete();
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
