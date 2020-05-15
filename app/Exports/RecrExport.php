<?php

namespace App\Exports;

use App\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class RecrExport implements FromView,WithEvents
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
        return view('Export.RecrForm',['declaration' => $declaration]);
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class    => function(AfterSheet $event) {
                $event->getDelegate()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            },

            BeforeWriting::class => function(BeforeWriting $event) {


                $rows=43;
                for ($i = 0; $i <= $rows; $i++) {
                    $event->writer->getDelegate()->getActiveSheet()->getRowDimension($i)->setRowHeight(17);
                }
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A1:E1")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 16,
                        'bold' => true,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("G1:I6")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A9:D12")->applyFromArray($styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("E9:I12")->applyFromArray($styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A24:I26")->applyFromArray($styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A28:I30")->applyFromArray($styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                ]);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A34:I35")->applyFromArray($styleArray = [
                    'borders' => [
                        'outline' => [
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
