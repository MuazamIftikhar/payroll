<?php

namespace App\Exports;

use App\Company;
use App\company_basic;
use App\Employee;
use App\Ptax;
use App\SalaryHead;
use Illuminate\Support\Facades\DB;
//use Illuminate\View\View;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class SlipExport implements FromView,WithEvents
{

    public function __construct($id,$month)
    {
        $this->id = $id;
        $this->month = $month;
    }

    public function view(): View
    {
        $printDate=$this->month;
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
            ->Join('companies','employees.company_id','=','companies.id')
            ->where('attendances.Month', '=', $this->month)
            ->where('employees.company_id','=',$this->id)->get();
        $company=Company::where('id','=',$company_id)->get();
        return view('Export.slip', [
            'employee' => $employee,"salaryHead"=>$namesOfsalaryHead,"ptax"=>$ptax,'company'=>$company,'printDate'=>$printDate]);

    }
    public function registerEvents(): array
    {
        return[
            AfterSheet::class    => function(AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            },

            BeforeWriting::class => function(BeforeWriting $event) {

            $employee = Employee::select(DB::raw('*,salaries.salary_head as salary_head, overtimes.salary_head as overtime_salary_head,esics.salary_head as esics_salary_head,pfs.salary_head as pfs_salary_head'))
                ->Join('attendances','employees.id','=','attendances.employee_id')
                ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
                ->Join('overtimes', 'employees.company_id', '=', 'overtimes.company_id')
                ->Join('esics', 'employees.company_id', '=', 'esics.company_id')
                ->Join('pfs', 'employees.company_id', '=', 'pfs.company_id')
                ->Join('companies','employees.company_id','=','companies.id')
                ->where('attendances.Month', '=', $this->month)
                ->where('employees.company_id','=',$this->id)->get();
            $count=count($employee);
            $start=2;
            $end=21;

            $dottedStart=6;
            $dottedEnd=9;

            for ($i=1;$i<=$count;$i++)
            {
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A$dottedStart:I$dottedEnd")->applyFromArray($styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 12
                    ],
                ])->getAlignment()->setWrapText(true);
                $dottedStart=$dottedStart+5;
                $dottedEnd=$dottedEnd+8;
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A11:I17")->applyFromArray($styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 12
                    ],
                ])->getAlignment()->setWrapText(true);
                $dottedStart=$dottedStart+9;
                $dottedEnd=$dottedEnd+4;
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A19:I20")->applyFromArray($styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 12
                    ],
                ])->getAlignment()->setWrapText(true);


                $event->writer->getDelegate()->getActiveSheet()->getStyle("A$start:I$end")->applyFromArray($styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 12
                    ],
                ])->getAlignment()->setWrapText(true);
                $start=$start+22;
                $end=$end+22;
                $dottedStart=$dottedStart+8;
                $dottedEnd=$dottedEnd+10;
            }
        }

        ];
    }
}
