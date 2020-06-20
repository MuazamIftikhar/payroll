<?php

namespace App\Exports;

use App\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class ICardExport implements FromView,WithEvents
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
        $declaration = Employee::select(DB::raw('*'))
            ->Join('companies', 'employees.company_id', '=', 'companies.id')
            ->where('employees.id', $this->id)->get();
        return view('Export.ICardReg', ['declaration' => $declaration]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
                $event->getDelegate()->getPageSetup()->setScale(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_GERMAN_STANDARD_FANFOLD);
            },

            BeforeWriting::class => function (BeforeWriting $event) {

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:L1")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 18,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("M1:W3")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 18,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A4:W5")->applyFromArray($styleArray = [
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

                $getRows= Employee::select(DB::raw('*'))
                    ->Join('companies', 'employees.company_id', '=', 'companies.id')
                    ->where('employees.id', $this->id)->get();
                $getRowsCount=count($getRows)+6;

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A6:P$getRowsCount")->applyFromArray($styleArray = [
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


            },
        ];
    }
}
