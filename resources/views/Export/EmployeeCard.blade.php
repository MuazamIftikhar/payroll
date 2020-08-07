@php
    libxml_use_internal_errors(true);
@endphp
@foreach($declaration as $d)
<table border="8">

    <tr>
        <td colspan="7">
            <strong>
                FORM XIV
            </strong>
        </td>
        <td colspan="1">
            1
        </td>
        <td>
        </td>
        <td colspan="7">
            <strong>
                FORM XV
            </strong>
        </td>
        <td colspan="1">
            1
        </td>
    </tr>
    <tr>
        <td colspan="8" >
            <strong>EMPLOYMENT CARD</strong>
        </td>
        <td>
        </td>
        <td colspan="8" >
            <strong>SERVICE CERTIFICATE</strong>
        </td>
    </tr>
    <tr>
        <td colspan="8" >
            The Contract Labour (Regulation & Abolition) Act, 1970 & The Contract Labour (P & R)(Gujarat) Rules 1972
        </td>
        <td>
        </td>
        <td colspan="8" >
            The Contract Labour (Regulation & Abolition) Act, 1970 & The Contract Labour (P & R)(Gujarat) Rules 1972
        </td>
    </tr>
    <tr>
        <td colspan="8" >
            [Rule 76]
        </td>
        <td>
        </td>
        <td colspan="8" >
            [Rule 76]
        </td>
    </tr>
    <tr>
        <td colspan="4" rowspan="2" >
            Name and address of contractor
        </td>
        <td colspan="4" rowspan="5">
            {{$d->companyName.' '.$d->Address}}
        </td>
        <td>

        </td>
        <td colspan="4"  rowspan="2">
            Name and address of contractor
        </td>
        <td colspan="4" rowspan="5">
            {{$d->companyName.' '.$d->Address}}
        </td>
    </tr>
    <tr>

    </tr>
    <tr>
            <td colspan="4" rowspan="3">
            </td>
            <td></td>
            <td colspan="4" rowspan="3" >
            </td>
    </tr>
    <tr></tr>
    <tr></tr>

            <tr>
                <td colspan="4" rowspan="2">
                    Nature of work and location of work
                </td>
                <td colspan="4" rowspan="2">
                </td>
                <td rowspan="2"></td>
                <td colspan="4" rowspan="2">
                    Nature of work and location of work
                </td>
                <td colspan="4" rowspan="2">
                </td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="4" rowspan="3" >
                    Name and address of establishment in/under which contract is carried on
                </td>
                <td colspan="4" rowspan="3">
                    {{$d->Address}}
                </td>
                <td ></td>
                <td colspan="4" rowspan="3" >
                    Name and address of establishment in/under which contract is carried on
                </td>
                <td colspan="4" rowspan="3">
                    {{$d->Address}}
                </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td colspan="4" rowspan="2" >
                        Name and address of the Principal  Employer
                </td>
                    <td colspan="4" rowspan="2">

                    </td>
                    <td ></td>
                    <td colspan="4" rowspan="2" >
                        Name and address of the Principal  Employer
                    </td>
                    <td colspan="4" rowspan="2">

                    </td>
                </tr>
        <tr></tr>
         <tr>
                <td colspan="1" rowspan="2" >
                        1
                </td>
                <td colspan="3" rowspan="2">
                    Name of the workman
                </td>
                 <td colspan="4" rowspan="2"> {{$d->Name}}</td>
                <td ></td>
                <td colspan="4" >
                    Name & Address of the workman
                </td>
                <td colspan="4" >
                    {{$d->Name}}
                </td>
            </tr>
    <tr>
        <td colspan="1" ></td>
        <td colspan="4" >

        </td>
        <td colspan="4" >
            {{$d->streetAddress}}
        </td>
    </tr>
    <tr>
        <td colspan="1" rowspan="2" >
            2
        </td>
        <td colspan="3" rowspan="2">
            Sl. No. In the register of workmen employed
        </td>
        <td colspan="4" rowspan="2"> {{$d->id}}</td>
        <td ></td>
        <td colspan="4" rowspan="2" >
            Age or Date of Birth
        </td>
        <td colspan="4" rowspan="2" >
            {{$d->DOB}}
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1" rowspan="1" >
            3
        </td>
        <td colspan="3" rowspan="2">
            Nature of employment / Designation
        </td>
        <td colspan="4"> </td>
        <td ></td>
        <td colspan="4" >
            Identification Marks
        </td>
        <td colspan="4" >

        </td>
    </tr>
    <tr>
        <td colspan="1" rowspan="1" >
            3
        </td>
        <td colspan="4"> {{$d->Designation}}</td>
        <td ></td>
        <td colspan="4" >
            Father's / Husband's Name
        </td>
        <td colspan="4" >
            {{$d->fatherName}}
        </td>
    </tr>
    <tr>
        <td colspan="1"  >
            4
        </td>
        <td colspan="3"> Wage rate (with particulars of unit, in case of piece -work)</td>
        <td colspan="4"> </td>
        <td ></td>
        <td colspan="1">
            1
        </td>
        <td colspan="3"> Total Period for Which Employed</td>
        <td colspan="4"> </td>
    </tr>
    <tr>
        <td colspan="1" >
            5
        </td>
        <td colspan="3"> Wage period</td>
        <td colspan="4"> </td>
        <td ></td>
        <td colspan="1">
            2
        </td>
        <td colspan="3">Nature of Work done</td>
        <td colspan="4"> </td>
    </tr>
    <tr>
        <td colspan="1" >
            6
        </td>
        <td colspan="3"> Tenure of employment</td>
        <td colspan="4"> </td>
        <td ></td>
        <td colspan="1">
            3
        </td>
        <td colspan="3">Rate of Wages (with Particulars of unit in case of piece-work)</td>
        <td colspan="4"> </td>
    </tr>
    <tr>
        <td colspan="1" >
            7
        </td>
        <td colspan="3"> Remarks</td>
        <td colspan="4"> </td>
        <td ></td>
        <td colspan="1">
            4
        </td>
        <td colspan="3"> Remarks</td>
        <td colspan="4"> </td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="3" >
        </td>
        <td colspan="1"> XX</td>
        <td colspan="4"> </td>
        <td ></td>
        <td colspan="3">
        </td>
        <td colspan="1"> XX</td>
        <td colspan="4"> </td>
    </tr>
    <tr>
        <td colspan="1" >
        </td>
        <td colspan="3"> </td>
        <td colspan="4">    Signature of Contractor </td>
        <td ></td>
        <td colspan="1">
        </td>
        <td colspan="3"> </td>
        <td colspan="4">     Signature of Contractor</td>
    </tr>

</table>
    @endforeach