<?php

namespace App\Exports;

use App\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class APTExport implements FromView,WithEvents
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
        return view('Export.ApptLetter',['declaration' => $declaration]);
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            },

            BeforeWriting::class => function (BeforeWriting $event) {

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:E1")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 16,
                        'bold' => true,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("B11:I31")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 11,
                    ],
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                    ],
                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A9:I9")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
            },
        ];
    }
}