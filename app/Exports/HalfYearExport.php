<?php

namespace App\Exports;
use App\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeWriting;


class HalfYearExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct($id, $fromMonth, $toMonth)
    {
        $this->id = $id;
        $this->fromMonth = $fromMonth;
        $this->toMonth = $toMonth;
    }

    public function view(): View
    {
        $company = Company::where('id', '=', $this->id)->get();
        $fromMonth = $this->fromMonth;
        $toMonth = $this->toMonth;
        return view('Export.halfYear', [
            'company' => $company, 'fromMonth' => $fromMonth, 'toMonth' => $toMonth]);

    }
}