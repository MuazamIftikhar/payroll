@php
    libxml_use_internal_errors(true);
@endphp
<table>
        <tr>
            <td colspan="16">
                BONUS REGISTER
            </td>
        </tr>
        <tr>
            <td colspan="16">
                FORM "C" (See rule 4 [c])
            </td>
        </tr>
        <tr>
            <td colspan="4">
                Name of the Establishment :
            </td>
            <td colspan="7">
                Bonus paid to employees for the accounting year ending on 2017-18
            </td>
            <td colspan="5">
                No. of working days in the year : 2017-18
            </td>
        </tr>
        <tr>
            <td colspan="10">
                Vrunda Vitthal Polynet Private Limited
            </td>
            <td colspan="6">
                Percentage of Bonus
            </td>
            <td colspan="2">
            </td>
        </tr>
        <tr></tr>
        <tr>
        <td colspan="1" rowspan="4" >
            EMP CODE
        </td>
        <td colspan="1" rowspan="4">
            NAME OF EMPLOYEE
        </td>
        <td colspan="1" rowspan="4">
            FATHER'S  / HUSBAND'S NAME
        </td>
        <td colspan="1" rowspan="4">
            Whether he/she has completed 15 year of age at the beginning of the accounting year
        </td>
        <td colspan="1" rowspan="4">
            Designation
        </td>
        <td colspan="1" rowspan="4">
            No. of days worked in the Estt.
        </td>
        <td colspan="1" rowspan="4">
            Total salary or wages in respect of the accounting year
        </td>
        <td colspan="1" rowspan="4">
            Account of bonus payable under section 10 or section 11 as the case may be
        </td>
        <td colspan="4" >
            Deduction
        </td>
        <td colspan="1" rowspan="4">
            Net amount payable
        </td>
        <td colspan="1" rowspan="4">
            Amount actully paid
        </td>
        <td colspan="1" rowspan="4">
            Date on which paid
        </td>
        <td colspan="1" rowspan="4">
            Signature/ Thumb Impression of the employee
        </td>
    </tr>
    <tr>
        <td colspan="1" rowspan="3">
            Puja bonus or other customary bonus paid during the accounting year
        </td>
        <td colspan="1" rowspan="3">
            Interim bonus or bonus paid in advance
        </td>
        <td colspan="1"rowspan="3">
            Deduction on account of financial loss if any caused by misconduct of the employee
        </td>
        <td colspan="1"rowspan="3">
            Total sum deducted
        </td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="1">
            1
        </td>
        <td colspan="1">
            2
        </td>
        <td colspan="1">
            3
        </td>
        <td colspan="1">
            4
        </td>
        <td colspan="1">
            5
        </td>
        <td colspan="1">
            6
        </td>
        <td colspan="1">
            7
        </td>
        <td colspan="1">
            8
        </td>
        <td colspan="1">
            9
        </td>
        <td colspan="1">
            10
        </td>
        <td colspan="1">
            11
        </td>
        <td colspan="1">
            12
        </td>
        <td colspan="1">
            13
        </td>
        <td colspan="1">
            14
        </td>
        <td colspan="1">
            15
        </td>
        <td colspan="1">
            16
        </td>
    </tr>
    @foreach($employee as $e)
        @php
            $basic  = \App\Http\Controllers\UserController::getBasicSalary($e->a_id);
        @endphp
        <tr>
            <td colspan="1">

            </td>
            <td colspan="1">
                {{$e->Name}}
            </td>
            <td colspan="1">

            </td>
            <td colspan="1">

            </td>
            <td colspan="1">

            </td>
            <td colspan="1">
                {{\App\Http\Controllers\UserController::getDays($e->a_id,$fromMonth,$toMonth)}}
            </td>
            <td colspan="1">
            {{\App\Http\Controllers\UserController::getSalary($e->a_id,$basic,$e->salary_flag,$fromMonth,$toMonth)}}
            </td>
            <td colspan="1">
                {{\App\Http\Controllers\UserController::getbonus($e->a_id,$basic,$e->salary_flag,$fromMonth,$toMonth)}}
            </td>
            <td colspan="1">

            </td>
            <td colspan="1">

            </td>
            <td colspan="1">

            </td>
            <td colspan="1">

            </td>
            <td colspan="1">
                {{\App\Http\Controllers\UserController::getbonus($e->a_id,$basic,$e->salary_flag,$fromMonth,$toMonth)}}
            </td>
            <td colspan="1">
                {{\App\Http\Controllers\UserController::getbonus($e->a_id,$basic,$e->salary_flag,$fromMonth,$toMonth)}}
            </td>
            <td colspan="1">

            </td>
            <td colspan="1">
                
            </td>
        </tr>
    @endforeach

</table>