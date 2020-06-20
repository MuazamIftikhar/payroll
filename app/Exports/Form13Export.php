<?php

namespace App\Exports;

use App\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class Form13Export implements FromView,WithEvents
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
            ->where('employees.company_id', $this->id)->get();
        return view('Export.Form13', ['declaration' => $declaration]);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_PORTRAIT);
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
                $event->getDelegate()->getPageSetup()->setScale(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_GERMAN_STANDARD_FANFOLD);
            },

            BeforeWriting::class => function (BeforeWriting $event) {
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:W4")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'font' => [
                        'size' => 14,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A5:W6")->applyFromArray($styleArray = [
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
                    ->where('employees.company_id', $this->id)->get();
                $getRowsCount=count($getRows)+7;

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A7:W$getRowsCount")->applyFromArray($styleArray = [
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
