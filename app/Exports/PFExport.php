<?php

namespace App\Exports;

use App\Company;
use App\company_basic;
use App\Employee;
use App\Ptax;
use App\SalaryHead;
use Illuminate\Support\Facades\DB;
// use Illuminate\View\View;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class PFExport implements FromView,WithEvents
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
            ->where('employees.PFFlag','=','Yes')
            ->where('employees.company_id','=',$this->id)->get();
        $company=Company::where('id','=',$company_id)->get();
        return view('Export.ReportPf', [
            'employee' => $employee,"salaryHead"=>$namesOfsalaryHead,"ptax"=>$ptax,'company'=>$company,]);
    }
    public function registerEvents(): array
    {
        return[
            AfterSheet::class    => function(AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
                $event->getDelegate()->getPageSetup()->setScale(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_STANDARD_PAPER_2);
            },

            BeforeWriting::class => function(BeforeWriting $event) {


                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:U1")->applyFromArray($styleArray = [
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
                    ->where('employees.PFFlag','=','Yes')
                    ->where('employees.company_id','=',$this->id)->get();
                $getRowsCount=count($getRows)+1;

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A2:U$getRowsCount")->applyFromArray($styleArray = [
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
