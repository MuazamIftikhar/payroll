<?php

namespace App\Exports;

use App\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;

class Form2RExport implements FromView,WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($employee_id)
    {
        $this->id = $employee_id;
    }


    public function view(): View
    {
        $declaration=Employee::select(DB::raw('*'))
            ->Join('companies','employees.company_id','=','companies.id')
            ->where('employees.id',$this->id)->get();
        return view('Export.Form2R',['declaration' => $declaration]);
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class    => function(AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            },

            BeforeWriting::class => function(BeforeWriting $event) {
                $rows=70;
                for ($i = 0; $i <= $rows; $i++) {
                    $event->writer->getDelegate()->getActiveSheet()->getRowDimension($i)->setRowHeight(12);
                }

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:H1")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A3:I3")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 11,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A4:I4")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 9,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A5:I5")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 7,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("B11:E12")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 11,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("G11:I12")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 11,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A16:I17")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 8,
                    ],
                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A14:I14")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A18:I22")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 8
                    ],

                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A29:I29")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A31:I32")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 8,
                    ],
                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A33:I38")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 8
                    ],

                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A42:I43")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 8,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A43:I48")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 8
                    ],

                ])->getAlignment()->setWrapText(true);

            }


        ];
    }
}
