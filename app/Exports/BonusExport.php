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


class BonusExport implements FromView,WithEvents
{

    public function __construct($id,$fromMonth,$toMonth)
    {
        $this->id = $id;
        $this->fromMonth = $fromMonth;
        $this->toMonth = $toMonth;
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
        $employee = Employee::select(DB::raw('*,employees.id as a_id'))
            ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
            ->where('employees.company_id','=',$this->id)
            ->get();
        $company=Company::where('id','=',$company_id)->get();
        $fromMonth=$this->fromMonth;
        $toMonth=$this->toMonth;
        return view('Export.bonus', [
            'employee' => $employee,"salaryHead"=>$namesOfsalaryHead,'company'=>$company,'fromMonth'=>$fromMonth,'toMonth'=>$toMonth]);
    }
    public function registerEvents(): array
    {
        return[
            AfterSheet::class    => function(AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
                $event->getDelegate()->getPageSetup()->setScale(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4_PLUS_PAPER);
            },

            BeforeWriting::class => function(BeforeWriting $event) {

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:P1")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 24,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A2:P2")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 22,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A3:P3")->applyFromArray($styleArray = [
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
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A4:P4")->applyFromArray($styleArray = [
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
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A6:P9")->applyFromArray($styleArray = [
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

                $getRows= Employee::select(DB::raw('*,employees.id as a_id'))
                    ->where('employees.company_id','=',$this->id)
                    ->get();
                $getRowsCount=count($getRows)+10;

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A10:P$getRowsCount")->applyFromArray($styleArray = [
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