<?php

namespace App\Exports;

use App\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class FORMIExport implements FromView,WithEvents
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
        return view('Export.FormI',['declaration' => $declaration]);
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
                   if ($i == 14){
                    $event->writer->getDelegate()->getActiveSheet()->getRowDimension($i)->setRowHeight(90);
                   }else{
                    $event->writer->getDelegate()->getActiveSheet()->getRowDimension($i)->setRowHeight(25);
                   }
                }
                $cols=['D'];
                foreach($cols as $col)
                {
                    if($col <= 'Y')
                    {
                        $event->writer->getDelegate()->getActiveSheet()->getColumnDimension($col)->setWidth(12);
                    }
                    else
                    {
                        $event->writer->getDelegate()->getActiveSheet()->getColumnDimension($col)->setAutoSize($col);
                    }

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
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A14:I21")->applyFromArray($styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOTTED,
                            'color' => ['argb' => '000000'],
                            'text-align' => 'center'
                        ],
                    ],
                    'alignment' => [
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP,
                    ],
                ])->getAlignment()->setWrapText(true);
                $event->writer->getDelegate()->getActiveSheet()->getStyle("A12:I13")->applyFromArray($styleArray = [
                    'font' => [
                        'size' => 11,
                    ],
                ])->getAlignment()->setWrapText(true);

            }


        ];
    }
}
