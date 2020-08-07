<?php

use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new \App\User();
        $user->name="Muazam";
        $user->email="admin@gmail.com";
        $user->password=Hash::make("1234567");
        $user->number="03230471256";
        $user->save();
        $owner = new \App\Role();
        $owner->name         = 'Super Admin';
        $owner->display_name = 'Staff Admin'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();
        $user->attachRole($owner); // parameter can be an Role object, array, or id
	    $staff = new \App\Role();
        $staff->name         = 'Staff Admin';
        $staff->display_name = 'Staff Admin'; // optional
        $staff->description  = 'Staff Admin is the admin of a given project'; // optional
        $staff->save();
        $company = new \App\Role();
        $company->name         = 'Company Admin';
        $company->display_name = 'Company Admin'; // optional
        $company->description  = 'Company Admin is the admin of a given project'; // optional
        $company->save();
        $employee = new \App\Role();
        $employee->name         = 'Employee';
        $employee->display_name = 'Employee'; // optional
        $employee->description  = 'Employee is the user of a given project'; // optional
        $employee->save();
        $deduction=new \App\Ptax();
        $deduction->value1=0;
        $deduction->value2=0;
        $deduction->value3=80;
        $deduction->value4=150;
        $deduction->value5=200;
        $deduction->save();
        $setting=new \App\Setting();
        $setting->form='REGISTER OF WAGES OVERTIME DEDUCTION FOR FINE, DAMAGE FOR LOSS AND ADVANCES FORM 4';
        $setting->rules='1. Form under rule-6 of equal Remeneration Rules 1976
        2.Form under rule-21 (4),25 (2),26 (1) and 26 (2) of Gujarat Minimum Wages Rules 1961
        3.Form under rule-6 of Payment of Wages Gujarat Rules, 1963
        4. Form under rule-78 of Contract Labour ( Regulation  Abolition) Gujarat Rules 1972                                      
        5. Form under rule-52(2) of Inter State Migrant Workers (Gujarat)Rules 1981';
        $setting->save();
        $setting=new \App\Setting();
        $setting->form='REGISTER OF WAGES OVERTIME DEDUCTION FOR FINE, DAMAGE FOR LOSS AND ADVANCES FORM 2';
        $setting->rules='1. Form under rule-6 of equal Remeneration Rules 1976
        2.Form under rule-21 (4),25 (2),26 (1) and 26 (2) of Gujarat Minimum Wages Rules 1961
        3.Form under rule-6 of Payment of Wages Gujarat Rules, 1963
        4. Form under rule-78 of Contract Labour ( Regulation  Abolition) Gujarat Rules 1972                                      
        5. Form under rule-52(2) of Inter State Migrant Workers (Gujarat)Rules 1981';
        $setting->save();

    }
}
