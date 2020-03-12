<?php

namespace App\Imports;

use App\Company;
use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //dd($row);
        return new Company([
            'user_id' => $row['user_id'],
            'companyName' => $row['companyname'],
            'Address' => $row['address'],
        ]);
    }
}