<?php

namespace App\Exports;

use App\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class FormFExport implements FromView,WithEvents
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
        return view('Export.FormF',['declaration' => $declaration]);
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class    => function(AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            },

            BeforeWriting::class => function(BeforeWriting $event) {
                $rows=27;
                for ($i = 0; $i <= $rows; $i++) {
                    $event->writer->getDelegate()->getActiveSheet()->getRowDimension($i)->setRowHeight(25);
                }
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:H1")->applyFromArray($styleArray = [
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A2:I4")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A5:I22")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 10,
                    ],
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                    ],
                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A23:H23")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A24:I32")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 10,
                    ],
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                    ],
                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A34:H34")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A55:H55")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A61:H61")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A74:H74")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);


            }


        ];
    }
}
