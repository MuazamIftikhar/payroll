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
//        return new Company([
//            'user_id' => $row['name'],
//            'companyName' => $row['father_name'],
//            'Address' => json_encode($row['last_name']),
//        ]);
        return new Employee([
            'Name' => $row['name'],
            'fatherName' => $row['father_name'],
            'lastName' => $row['last_name'],
            'DOB' => $row['date_of_birth'],
            'DOJ' => $row['date_of_joining'],
            'DOE' => $row['date_of_leaving'],
            'Gender' => $row['gender'],
            'Religion' => $row['religion'],
            'Phone' => $row['phone'],
            'Email' => $row['email'],
            'streetAddress' => $row['street_address'],
            'City' => $row['city'],
            'State' => $row['state'],
            'zipCode' => $row['zip_code'],
            'per_streetAddress' => $row['permanent_street_address'],
            'per_City' => $row['permanent_city'],
            'per_State' => $row['permanent_state'],
            'per_zipCode' => $row['permanent_zip_code'],
            'Designation' => $row['designation'],
            'company_id' => $row['company_id'],
            'Status' => $row['status'],
            'bankName' => $row['bank_name'],
            'accountNumber' => $row['account_number'],
            'ISFC' => $row['isfc'],
            'esicNumber' => $row['esic_number'],
            'UAN' => $row['uan'],
            'esicFlag' => $row['esic_flag'],
            'PTFlag' => $row['pt_flag'],
            'PFSaturating' => $row['pf_saturating'],
            'PFFlag' => $row['pf_flag'],
            'LWFFlag' => $row['lwf_flag'],
            'NameAsAdhar' => $row['name_as_adhar'],
            'adharNumber' => $row['adhar_number'],
            'NameAsPan' => $row['name_as_pan'],
            'panNumber' => $row['pan_number'],
            'family_firstName' => $row['family_first_name'],
            'family_lastName' => $row['family_last_name'],
            'family_Relation' => $row['family_relation'],
            'family_presentAddress' => $row['family_present_address'],
            'familyPresentDistrict' => $row['family_present_district'],
            'familyPresentState' => $row['family_present_state'],
            'family_permanentAddress' => $row['family_permanent_address'],
            'familyPermanentDistrict' => $row['family_permanent_district'],
            'familyPermanentState' => $row['family_permanent_state'],
            'family_Nominee' => $row['family_nominee'],
            'family_DOB' => $row['family_dob'],
            'family_State' => $row['family_state'],
            'family_adharNumber' => $row['family_adhar_number'],
            'Witness' => $row['witness'],
            'witnessAddress' => $row['witness_address'],
        ]);
    }
}