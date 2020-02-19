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

    }
}
