<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable= ['Name','fatherName','lastName','DOB','DOJ','DOE','Gender','Religion','Phone','Email','streetAddress','City','State','zipCode','per_streetAddress','per_City',
        'per_State','per_zipCode','Designation','company_id','Status','bankName','accountNumber','ISFC','esicNumber','UAN','esicFlag','PTFlag','PFSaturating','PFFlag','NameAsAdhar','adharNumber','NameAsPan',
        'panNumber','family_firstName','family_lastName','family_Relation','family_presentAddress','familyPresentDistrict','familyPresentState','family_permanentAddress','familyPermanentDistrict','familyPermanentState',
        'family_Nominee','family_DOB','family_State','family_adharNumber','Witness','witnessAddress'];

}