<?php

namespace App\Http\Controllers;

use App\Company;
use App\company_basic;
use App\Employee;
use App\Exports\APTExport;
use App\Exports\AreaExport;
use App\Exports\BonusExport;
use App\Exports\DeclarationExport;
use App\Exports\EmployeecardExport;
use App\Exports\EsicExport;
use App\Exports\Form11Export;
use App\Exports\Form13Export;
use App\Exports\Form2RExport;
use App\Exports\Form35Export;
use App\Exports\FormFExport;
use App\Exports\FORMIExport;
use App\Exports\HalfYearExport;
use App\Exports\ICardExport;
use App\Exports\IcardRegExport;
use App\Exports\LeaveExport;
use App\Exports\PFExport;
use App\Exports\RecrExport;
use App\Exports\SlipExport;
use App\Ptax;
use App\Salary;
use App\SalaryHead;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company=Company::all();
        $setting=Setting::all();
        return view('Excel.index',['company'=>$company,'setting'=>$setting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function salary_excel(Request $request)
    {
        $id=$request->id;
        $month=$request->Month;
        $setting=$request->setting;
        return Excel::download(new LeaveExport($id,$month,$setting),'Salary_sheet.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function declaration_excel_form(){
        $company=Company::all();
        return view('Excel.declaration',['company'=>$company]);
    }


    public function findEmployee(Request $request)
    {
        //in hall information page when vendor select the city then area show
        $id=$request->companyName;
        $employee=Employee::where('company_id','=',$id)->get();
        foreach($employee as $a)
        {
            $json[]=array('id' => $a->id ,'Name' => $a->Name);
        }
        return json_encode($json);
    }

    public function declaration_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new DeclarationExport($employee_id),'Declaration.xlsx');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function employeeCard_excel_form(){
        $company=Company::all();
        return view('Excel.employeeCard',['company'=>$company]);
    }

    public function employeeCard_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new EmployeecardExport($employee_id),'EmployeeCard.xlsx');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function formI_excel_form(){
        $company=Company::all();
        return view('Excel.FormI',['company'=>$company]);
    }


    public function formI_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new FORMIExport($employee_id),'Form-I.xlsx');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function form35_excel_form(){
        $company=Company::all();
        return view('Excel.Form35',['company'=>$company]);
    }

    public function form35_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new Form35Export($employee_id),'Form-35.xlsx');
    }
    public function form2R_excel_form(){
        $company=Company::all();
        return view('Excel.Form2R',['company'=>$company]);
    }

    public function form2R_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new Form2RExport($employee_id),'Form2R.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function form11_excel_form(){
        $company=Company::all();
        return view('Excel.Form11',['company'=>$company]);
    }

    public function form11_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new Form11Export($employee_id),'Form11.xlsx');
    }
    public function formF_excel_form(){
        $company=Company::all();
        return view('Excel.FormF',['company'=>$company]);
    }

    public function formF_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new FormFExport($employee_id),'FormF.xlsx');
    }
    public function Recr_excel_form(){
        $company=Company::all();
        return view('Excel.Recr',['company'=>$company]);
    }

    public function Recr_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new RecrExport($employee_id),'Recr.xlsx');
    }
    public function APT_excel_form(){
        $company=Company::all();
        return view('Excel.APT',['company'=>$company]);
    }

    public function APT_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new APTExport($employee_id),'APT.xlsx');
    }
    public function Icard_excel_form(){
        $company=Company::all();
        return view('Excel.Icard',['company'=>$company]);
    }

    public function Icard_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new ICardExport($employee_id),'Icard.xlsx');
    }
    public function IcardReg_excel_form(){
        $company=Company::all();
        return view('Excel.IcardReg',['company'=>$company]);
    }

    public function IcardReg_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new IcardRegExport($employee_id),'IcardReg.xlsx');
    }
    public function Form13_excel_form(){
        $company=Company::all();
        return view('Excel.Form13',['company'=>$company]);
    }

    public function Form13_excel(Request $request)
    {
        $employee_id=$request->employee_id;
        return Excel::download(new Form13Export($employee_id),'Form13.xlsx');
    }
    public function Report_esic_form(){
        $company=Company::all();
        return view('Excel.ReportEsic',['company'=>$company]);
    }

    public function Report_esic_excel(Request $request)
    {
        $id=$request->id;
        $month=$request->Month;
        return Excel::download(new EsicExport($id,$month),'Report_esic.xlsx');
    }
    public function Report_pf_form(){
        $company=Company::all();
        return view('Excel.ReportPf',['company'=>$company]);
    }

    public function Report_pf_excel(Request $request)
    {
        $id=$request->id;
        $month=$request->Month;
        return Excel::download(new PFExport($id,$month),'Report_pf.xlsx');
    }
    public function Bonus_form(){
        $company=Company::all();
        return view('Excel.bonus',['company'=>$company]);
    }

    public function Bonus_form_excel(Request $request)
    {
        $id=$request->company_id;
        $fromMonth=$request->fromMonth;
        $toMonth=$request->toMonth;
        return Excel::download(new BonusExport($id,$fromMonth,$toMonth),'Bonus.xlsx');
    }
    public function HalfYear_form(){
        $company=Company::all();
        return view('Excel.HalfYear',['company'=>$company]);
    }

    public function HalfYear_form_excel(Request $request)
    {
        $id=$request->company_id;
        $fromMonth=$request->fromMonth;
        $toMonth=$request->toMonth;
        return Excel::download(new HalfYearExport($id,$fromMonth,$toMonth),'HalfYear.xlsx');
    }
    public function FullYear_form(){
        $company=Company::all();
        return view('Excel.HalfYear',['company'=>$company]);
    }

    public function FullYear_form_excel(Request $request)
    {
        $id=$request->company_id;
        $fromMonth=$request->fromMonth;
        $toMonth=$request->toMonth;
        return Excel::download(new HalfYearExport($id,$fromMonth,$toMonth),'HalfYear.xlsx');
    }

    public function Slip_form()
    {
        $company=Company::all();
        return view('Excel.slip',['company'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Slip_excel(Request $request)
    {
        $id=$request->id;
        $month=$request->Month;
        return Excel::download(new SlipExport($id,$month),'Slip1.xlsx');
    }
    public function area_form()
    {
        $company=Company::all();
        return view('Excel.area',['company'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function area_excel(Request $request)
    {
        $finalArray=[];
        $id=$request->id;
        $datestring = $request->to;
        $date = strtotime($datestring);
        $lastdate = strtotime(date("Y-m-t", $date ));
        $to = date("Y-m-d", $lastdate);
        $affect_from=$request->affect_from;
        $from=$request->from;
        $employees= $this->getAllEmployees($id);
        foreach($employees as $e){
            $first = $this->getFirstRowForThisEmployeeID($id,$affect_from,$to,$e->id);
            $last = $this->getLastRowForThisEmployeeID($id,$affect_from,$to,$e->id);
            $totalMonth = $this->getMonthThisEmployeeID($first->salary_head,$e->id);
            $returnVal = $this->minusValues($first->salary_head,$last->salary_head);
            $finalArray[] = array('id' => $e->id ,'Name' => $e->Name,'OT'=> $totalMonth[0]->sum_OT,'PR_Day'=>$totalMonth[0]->sum_PR_Day,
                'PL'=> $totalMonth[0]->sum_PL,'SL'=> $totalMonth[0]->sum_SL,'CL'=> $totalMonth[0]->sum_CL,'PH'=> $totalMonth[0]->sum_PH,
                'Total' => $totalMonth[0]->sum_Total,'overtime_salary_head' => $totalMonth[0]->overtime_salary_head,'esics_salary_head' => $totalMonth[0]->esics_salary_head,
                'pfs_salary_head' => $totalMonth[0]->pfs_salary_head,'salary_flag' => $totalMonth[0]->salary_flag,'PFFlag' => $totalMonth[0]->PFFlag,
                'esicFlag' => $totalMonth[0]->esicFlag,'PTFlag' => $totalMonth[0]->PTFlag,'Loan' => $totalMonth[0]->sum_Loan,'Deduction' => $totalMonth[0]->sum_Ded,
                'salary_head' => $returnVal,'month'=> count($totalMonth));
        }
        return Excel::download(new AreaExport($id,$affect_from,$from,$to,$finalArray),'Area Slip.xlsx');
    }

    public function minusValues($first,$last){
        $decodeFirst = json_decode($first,true);
        $decodeLast = json_decode($last,true);
        $vs=array();
        foreach($decodeFirst as $key => $meal)
        {
            foreach($decodeLast as $val => $type)
            {
                if($key == $val) {
                    $value = $type - $meal;
                    $value1=strval($value);
                    $vs=$this->array_push_assoc($vs,$key,$value1);
                }
            }
        }
        return json_encode($vs);
    }
    public function array_push_assoc($array, $key, $value){
        $array[$key] = $value;
        return $array;
    }

    public function getAllEmployees($id){
        $salary=Salary::pluck('employee_id');
        $employee = Employee::whereIN('id',$salary)
            ->where('company_id','=',$id)->get();
        return $employee;
    }
    public function getFirstRowForThisEmployeeID($id,$affect_from,$to,$employee_id)
    {
            $employee = Employee::select(DB::raw('salaries.salary_head as salary_head'))
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->Join('attendances', function($join)
            {
                $join->on('employees.id', '=', 'attendances.employee_id');
                $join->on('attendances.Month', '=', 'salaries.month');
            })
            ->Join('overtimes', 'employees.company_id', '=', 'overtimes.company_id')
            ->Join('esics', 'employees.company_id', '=', 'esics.company_id')
            ->Join('pfs', 'employees.company_id', '=', 'pfs.company_id')
            ->whereDate('attendances.created_at', '>=',date("Y-m-d", strtotime($affect_from)))
            ->whereDate('attendances.created_at', '<=', $to)
            ->where('employees.company_id', '=', $id)
            ->where('employees.id','=',$employee_id)
           ->orderBy('salaries.id','ASC')->first();
       return $employee;
    }
    public function getLastRowForThisEmployeeID($id,$affect_from,$to,$employee_id)
    {
        $employee = Employee::select(DB::raw('salaries.salary_head as salary_head'))
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->Join('attendances', function($join)
            {
                $join->on('employees.id', '=', 'attendances.employee_id');
                $join->on('attendances.Month', '=', 'salaries.month');
            })
            ->Join('overtimes', 'employees.company_id', '=', 'overtimes.company_id')
            ->Join('esics', 'employees.company_id', '=', 'esics.company_id')
            ->Join('pfs', 'employees.company_id', '=', 'pfs.company_id')
            ->whereDate('attendances.created_at', '>=',date("Y-m-d", strtotime($affect_from)))
            ->whereDate('attendances.created_at', '<=', $to)
            ->where('employees.company_id', '=', $id)
            ->where('employees.id','=',$employee_id)
            ->orderBy('salaries.id','DESC')->first();
        return $employee;

    }
    public function getMonthThisEmployeeID($salary_head,$employee_id){
        $salaries=Employee::select(DB::raw('Sum(Deduction) as sum_Ded,Sum(Loan) as sum_Loan,PTFlag,esicFlag,PFFlag,salary_flag,SUM(attendances.OT) as sum_OT,SUM(attendances.PR_Day) as sum_PR_Day,SUM(attendances.PL) as sum_PL,
        SUM(attendances.SL) as sum_SL,SUM(attendances.CL) as sum_CL,SUM(attendances.PH) as sum_PH,SUM(attendances.Total) as sum_Total,
        overtimes.salary_head as overtime_salary_head,esics.salary_head as esics_salary_head,pfs.salary_head as pfs_salary_head'))
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->Join('attendances', function($join)
            {
                $join->on('employees.id', '=', 'attendances.employee_id');
                $join->on('attendances.Month', '=', 'salaries.month');
            })
            ->Join('overtimes', 'employees.company_id', '=', 'overtimes.company_id')
            ->Join('esics', 'employees.company_id', '=', 'esics.company_id')
            ->Join('pfs', 'employees.company_id', '=', 'pfs.company_id')
            ->where('salaries.employee_id',$employee_id)->where('salaries.salary_head',$salary_head)->get();
        return $salaries;

    }
}
