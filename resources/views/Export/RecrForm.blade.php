
@php
    libxml_use_internal_errors(true);
@endphp
@foreach($declaration as $d)
<table>
    <tbody>
    <tr>
        <td colspan="5">{{$d->companyName}}</td>
        <td colspan="1">1</td>
        <td colspan="3" rowspan="6">1</td>
    </tr>
    <tr><td colspan="5" rowspan="2">
            {{$d->Address}}
        </td></tr>
    <tr></tr>
    <tr><td colspan="5">RECRUITMENT FORM</td></tr>
    <tr><td colspan="1">Date</td>
    <td colspan="1"></td></tr>
    <tr>
        <td colspan="2">Personal Details</td>
    </tr>
    <tr>
        <td colspan="2">Name</td>
        <td colspan="3">{{$d->Name}}</td>
        <td colspan="2">DOB</td>
        <td colspan="2">{{$d->DOB}}</td>
    </tr>
    <tr>
        <td colspan="4">Present Address</td>
        <td colspan="5">Permanent Address</td>
    </tr>
    <tr>
        <td colspan="4" rowspan="3">{{$d->streetAddress}}</td>
        <td colspan="5" rowspan="3">{{$d->per_streetAddress}}</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="2">Contact No:-</td>
        <td colspan="2">{{$d->Phone}}</td>
        <td colspan="1"></td>
        <td colspan="2">Contact No:-</td>
        <td colspan="2"></td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="2">Gender</td>
        <td colspan="3">{{$d->Gender}}</td>
        <td colspan="2">Marital Status:</td>
        <td colspan="2">{{$d->Status}}</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="3">Appointment Details:</td>
    </tr>
    <tr>
        <td colspan="2">Department</td>
        <td colspan="3"></td>
        <td colspan="2">Date of Appointment</td>
        <td colspan="2">{{$d->DOJ}}</td>
    </tr>
    <tr>
        <td colspan="2">Designation</td>
        <td colspan="3">{{$d->Designation}}</td>
        <td colspan="2">Date of Leaving</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Aadhar card No</td>
        <td colspan="3">{{$d->adharNumber}}</td>
        <td colspan="2">Name as on Aadhar</td>
        <td colspan="2">{{$d->NameAsAdhar}}</td>
    </tr>
    <tr>
        <td colspan="2">Bank A/c No.</td>
        <td colspan="3">{{$d->accountNumber}}</td>
        <td colspan="2">Bank & Branch Name</td>
        <td colspan="2">{{$d->bankName}}</td>
    </tr>
    @php
        $family_firstName=json_decode($d->family_firstName);
        $family_Relation=json_decode($d->family_Relation);
        $family_presentAddress=json_decode($d->family_presentAddress);
        $family_DOB=json_decode($d->family_DOB);
    @endphp
    @for($i=0 ; $i < 1 ; $i++)
    <tr>
        <td colspan="2">Nominee Name-1</td>
        <td colspan="3">{{$family_firstName[$i]}}</td>
        <td colspan="2">Relation</td>
        <td colspan="2">{{$family_Relation[$i]}}</td>
    </tr>
    @endfor
    <tr>
        <td colspan="2">2</td>
        <td colspan="3"></td>
        <td colspan="2">Relation</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="4">Academic Qualification</td>
    </tr>
    <tr>
        <td colspan="1">SR. No.</td>
        <td colspan="2">Name of Exam</td>
        <td colspan="2">Institution</td>
        <td colspan="2">Year Of Passing</td>
        <td colspan="2">Percentage or Marks</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="4">Work Experience-Chronologically</td>
    </tr>
    <tr>
        <td colspan="1">Sr. No.</td>
        <td colspan="2">Name & Address of the Previous Employer</td>
        <td colspan="1">DOJ</td>
        <td colspan="1">DOE</td>
        <td colspan="1">Designation</td>
        <td colspan="2">Nature of Duties</td>
        <td colspan="1">Annual/Monthy CTC</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="1"></td>
        <td colspan="1"></td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="1"></td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="1"></td>
        <td colspan="1"></td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="1"></td>
    </tr>
    <tr>
        <td colspan="4">Hobbies / Interest :-</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="4">Reference:</td>
    </tr>
    <tr>
        <td colspan="3">Name / Address</td>
        <td colspan="2">Designation</td>
        <td colspan="2">No. of years Known</td>
        <td colspan="2">Contact No.</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="9">I hereby declare that the above information is true to the best of my knowledge and belief.</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="2">Sign of Candidates</td>
        <td colspan="2"></td>
        <td colspan="2">Sign of HOD</td>
        <td colspan="1"></td>
        <td colspan="2">Authorised Sign.</td>
    </tr>
    </tbody>
</table>
    @endforeach