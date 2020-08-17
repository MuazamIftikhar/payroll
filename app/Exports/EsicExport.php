<?php

namespace App\Exports;

use App\Company;
use App\company_basic;
use App\Employee;
use App\Ptax;
use App\SalaryHead;
use App\Setting;
use Illuminate\Support\Facades\DB;
// use Illuminate\View\View;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class EsicExport implements FromView,WithEvents
{

    public function __construct($id,$month)
    {
        $this->id = $id;
        $this->month = $month;
    }

    public function view(): View
    {
        $company_id=Company::where('id','=',$this->id)->first()->id;
        $getIds = company_basic::where('company_id', '=',$company_id)->first()->salary_head;
        $decodeIDs = json_decode($getIds);
        $namesOfsalaryHead=array();
        foreach ($decodeIDs as $i){
            $GetName = SalaryHead::where('id', '=', $i)->first();
            $namesOfsalaryHead[]=$GetName;
        }
        $ptax=Ptax::first();
        $employee = Employee::select(DB::raw('*,salaries.salary_head as salary_head, overtimes.salary_head as overtime_salary_head,esics.salary_head as esics_salary_head,pfs.salary_head as pfs_salary_head'))
            ->Join('attendances','employees.id','=','attendances.employee_id')
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->Join('overtimes', 'employees.company_id', '=', 'overtimes.company_id')
            ->Join('esics', 'employees.company_id', '=', 'esics.company_id')
            ->Join('pfs', 'employees.company_id', '=', 'pfs.company_id')
            ->where('attendances.Month', '=', $this->month)
            ->where('employees.esicFlag','=','Yes')
            ->where('employees.company_id','=',$this->id)->get();
        $company=Company::where('id','=',$company_id)->get();
        return view('Export.ReportEsic', [
            'employee' => $employee,"salaryHead"=>$namesOfsalaryHead,"ptax"=>$ptax,'company'=>$company]);
    }
    public function registerEvents(): array
    {
        return[
            AfterSheet::class    => function(AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            },

            BeforeWriting::class => function(BeforeWriting $event) {

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:I3")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 12,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                    ],
                ])->getAlignment()->setWrapText(true);

                $getRows= Employee::select(DB::raw('*,salaries.salary_head as salary_head, overtimes.salary_head as overtime_salary_head,esics.salary_head as esics_salary_head,pfs.salary_head as pfs_salary_head'))
                    ->Join('attendances','employees.id','=','attendances.employee_id')
                    ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
                    ->Join('overtimes', 'employees.company_id', '=', 'overtimes.company_id')
                    ->Join('esics', 'employees.company_id', '=', 'esics.company_id')
                    ->Join('pfs', 'employees.company_id', '=', 'pfs.company_id')
                    ->where('attendances.Month', '=', $this->month)
                    ->where('employees.esicFlag','=','Yes')
                    ->where('employees.company_id','=',$this->id)->get();
                $getRowsCount=count($getRows)+3;

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A4:I$getRowsCount")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 12
                    ],
                ])->getAlignment()->setWrapText(true);







            }

        ];
    }
}
