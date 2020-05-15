<?php

namespace App\Exports;

use App\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class Form35Export implements FromView,WithEvents
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
        return view('Export.Form35',['declaration' => $declaration]);
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class    => function(AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            },
            BeforeWriting::class => function(BeforeWriting $event) {

                $rows=38;
                for ($i = 0; $i <= $rows; $i++) {
                    $event->writer->getDelegate()->getActiveSheet()->getRowDimension($i)->setRowHeight(20);
                }

                $event->writer->getDelegate()->getActiveSheet()->mergeCells('A1:H1');

                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:H1")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A2:I2")->applyFromArray($styleArray = [
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
                        'size' => 12,
                        'bold' => true,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A5:I22")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                ]);

            }



        ];
    }
}
