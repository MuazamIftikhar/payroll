<?php

namespace App\Exports;

use App\Company;
use App\company_basic;
use App\Employee;
use App\Ptax;
use App\SalaryHead;
use App\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class AreaExport implements FromView,WithEvents
{

    public function __construct($id,$from,$to,$affect_from,$finalArray)
    {
        $this->id = $id;
        $this->from = $from;
        $this->to = $to;
        $this->affect_from = $affect_from;
        $this->finalArray = $finalArray;
    }

    public function view(): View
    {
        $printDate=date('Y-m-d');
        $company_id=Company::where('id','=',$this->id)->first()->id;
        $getIds = company_basic::where('company_id', '=',$company_id)->first()->salary_head;
        $decodeIDs = json_decode($getIds);
        $namesOfsalaryHead=array();
        foreach ($decodeIDs as $i){
            $GetName = SalaryHead::where('id', '=', $i)->first();
            $namesOfsalaryHead[]=$GetName;
        }
        $ptax=Ptax::first();
        $employee= $this->finalArray;
        $company=Company::where('id','=',$company_id)->get();
        $setting=Setting::where('id','=',1)->get();
        return view('Export.Area', [
            'employee' => $employee,"salaryHead"=>$namesOfsalaryHead,"ptax"=>$ptax,'company'=>$company,'printDate'=>$printDate,'setting'=>$setting]);
    }
    public function registerEvents(): array
    {
        return[
            AfterSheet::class    => function(AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
                $event->getDelegate()->getPageSetup()->setScale(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4_PLUS_PAPER);
            },

            BeforeWriting::class => function(BeforeWriting $event) {
                $event->writer->getDelegate()->getActiveSheet()->mergeCells('A1:B1');
                $event->writer->getDelegate()->getActiveSheet()->mergeCells('A2:B3');
                $event->writer->getDelegate()->getActiveSheet()->mergeCells('A4:B4');
                $event->writer->getDelegate()->getActiveSheet()->mergeCells('A5:B6');
                $event->writer->getDelegate()->getActiveSheet()->mergeCells('D1:G3');
                $event->writer->getDelegate()->getActiveSheet()->mergeCells('D4:G6');
                $event->writer->getDelegate()->getActiveSheet()->mergeCells('H1:P6');



                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:B1")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'bold' => true,
                        'size' => 16
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("D1:G3")->applyFromArray($styleArray = [
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
                $event->writer->getDelegate()->getActiveSheet()->getStyle("C1")->applyFromArray($styleArray = [
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
                $event->writer->getDelegate()->getActiveSheet()->getStyle("C2")->applyFromArray($styleArray = [
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
                $event->writer->getDelegate()->getActiveSheet()->getStyle("H1:P6")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 11
                    ],
                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A2:B6")->applyFromArray($styleArray = [
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

                //$date=date('Y-m-d');

                $getRows=$this->finalArray;
                $getRowsCount=count($getRows)+9;

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A7:Y$getRowsCount")->applyFromArray($styleArray = [
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

//                     'alignment' => [
//                         'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
//                         'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
//                     ],
                ])->getAlignment()->setWrapText(true);
                ////Setting Width of Coulmns
//                $cols=['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y'];
//                foreach($cols as $col)
//                {
//                    if($col <= 'Y')
//                    {
//                        $event->writer->getDelegate()->getActiveSheet()->getColumnDimension($col)->setWidth(10);
//                    }
//                    else
//                    {
//                        $event->writer->getDelegate()->getActiveSheet()->getColumnDimension($col)->setAutoSize($col);
//                    }
//
//                }

//

                //Setting M Coulmn Colors
//                $data = array();
//                $date=explode('-',$this->month);
//                $year=$date[0];
//                $month=$date[1];
//                $getRows = Employee::select(DB::raw('*'))
//                    ->Join('attendances','employees.id','=','attendances.employee_id')
//                    ->Join('salaries', 'employees.id', '=', 'salaries.employee_id')
//                    ->whereYear('salaries.created_at', '=', $year)->whereMonth('salaries.created_at', '=', $month)
//                    ->whereYear('attendances.created_at', '=', $year)->whereMonth('attendances.created_at', '=', $month)
//                    ->where('employees.id','=',$this->id)->get();
//                $index = 6;

//                foreach ($getRows as $i) {
//
//                    $emptyRow = $index+1; //After Printing then fill Empty Row
//                    $index=$emptyRow;
//                    $data[]=$emptyRow;
//                    // that is before index because of need to fill empty
//                    $event->writer->getDelegate()->getActiveSheet()->getStyle("A$emptyRow:W$emptyRow")->getFill()
//                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
//                    ->getStartColor()->setARGB('FFFAFA');
//                    $event->writer->getDelegate()->getActiveSheet()->getRowDimension($emptyRow)->setRowHeight(30);
//                    $index = $emptyRow + 1; //If count then +1 for empty row
//                    $event->writer->getDelegate()->getActiveSheet()->getRowDimension($index)->setRowHeight(30);
//
//
//
//                }

            }

        ];
    }
}
