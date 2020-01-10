<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Estimation;
use Illuminate\Http\Request;

class EstimationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Est.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $est=new Estimation();
        $est->estName=$request->estName;
        $est->Factory=$request->Factory;
        $est->Pin=$request->Pin;
        $est->City=$request->City;
        $est->District=$request->District;
        $est->State=$request->State;
        $est->Phone=$request->Phone;
        $est->Name=$request->Name;
        $est->Mobile=$request->Mobile;
        $est->Email=$request->Email;
        $est->Pan=$request->Pan;
        $est->Type=$request->Type;
        $est->natureOfBusiness=$request->natureOfBusiness;
        $est->ownershipType=$request->ownershipType;
        $est->ownerName=$request->ownerName;
        $est->ownerAdd=$request->ownerAdd;
        $est->ownerMobile=$request->ownerMobile;
        $est->ownerEmail=$request->ownerEmail;
        $est->invoicePeriod=$request->invoicePeriod;
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
        $est->save();
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_estimation()
    {
        $estimation=Estimation::all();
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
