@php
    libxml_use_internal_errors(true);
@endphp
<table>
    @foreach($declaration as $d)
    <tr>
        <td colspan="14">
            <strong>
                Declaration Form
            </strong>
        </td>
        <td colspan="2">
            <strong>Form 1</strong>
        </td>
        <td>1</td>
    </tr>
    <tr>
        <td colspan="17" rowspan="2">
                To be filled by employee after reading instruction overleaf. Two Postcard Size phtographs to be attached with the form. This form is free of cost.
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="7"><strong>(A)INSURED PERSON'S PARTICULARS</strong></td>
        <td colspan="2"></td>
        <td colspan="8"><strong>(B)EMPLOYER'S PARTICULARS </strong></td>
    </tr>
    <tr>
        <td colspan="4"><em>1-Insurance No.</em></td>
        <td colspan="4">{{$d->esicNumber}}</td>
        <td colspan="1"></td>
        <td colspan="4">9-Employer's Code No.</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="4"><em>2-Name in block letters</em></td>
        <td colspan="4">{{$d->Name}}</td>
        <td colspan="1"></td>
        <td colspan="4" rowspan="2"><em>10-Date of Appointment</em></td>
        <td colspan="1">Day</td>
        <td colspan="2">Month</td>
        <td colspan="1">Year</td>
    </tr>
    <tr>
        <td colspan="4"><em>3-Father Name</em></td>
        <td colspan="4">{{$d->fatherName}}</td>
        <td colspan="1"></td>
        <td colspan="3">{{$d->DOJ}}</td>
    </tr>
    <tr>
        <td colspan="2" rowspan="2"><em>4-Date of Birth</em></td>
        <td colspan="1">Day</td>
        <td colspan="1">Month</td>
        <td colspan="1">Year</td>
        <td colspan="2">5-Marital Status</td>
        <td colspan="1">6-Sex</td>
        <td colspan="1"></td>
        <td colspan="8"><em>11-Name & Address of the Employer</em></td>
    </tr>
    <tr>
        <td colspan="3">{{$d->DOB}}</td>
        <td colspan="2">{{$d->Status}}</td>
        <td colspan="1">{{$d->Gender}}</td>
        <td colspan="1"></td>
        <td colspan="8">
            {{$d->Address}}
        </td>
    </tr>
    <tr>
        <td colspan="4" rowspan="2">Present Address</td>
        <td colspan="4" rowspan="2">Permanent Address</td>
        <td colspan="1" rowspan="2"></td>
        <td colspan="8" rowspan="2">
            <em>12-In case of any previous employment<br>please fill up the details as under.</em>
        </td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td colspan="4" rowspan="5">{{$d->streetAddress}}</td>
        <td colspan="4" rowspan="5">{{$d->per_streetAddress}}</td>
        <td colspan="1" ></td>
        <td colspan="4">(a)Previous Ins. No.</td>
        <td colspan="4"></td>

    </tr>
    <tr>

        <td colspan="1"></td>
        <td colspan="4">(b)Employer's Code No.</td>
        <td colspan="4"></td>


    </tr>
    <tr>
       <td colspan="1" ></td>
        <td colspan="8" rowspan="2">(c)Name & Address of the Employer e-mail address</td>
    </tr>
    <tr></tr>
    <tr> <td colspan="1"></td>
        <td colspan="8"></td></tr>
    <tr>
        <td colspan="2"><em>Brach Office</em></td>
        <td colspan="2"></td>
        <td colspan="2"><em>Dispensary</em></td>
        <td colspan="2"></td>
        <td colspan="1"></td>
        <td colspan="8"></td>
    </tr>
    <tr>
        <td colspan="17" rowspan="2">
            (C) Details of Nominee u/s 71 of ESI Act 1948/Rule-56(2) of ESI (Central) Rules, 1950 for payment of cash benefit in the event of death.
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="5">Name</td>
        <td colspan="6">Address</td>
        <td colspan="6">Relationship</td>
    </tr>
        @php
            $family_firstName=json_decode($d->family_firstName);
            $family_Relation=json_decode($d->family_Relation);
            $family_presentAddress=json_decode($d->family_presentAddress);
            $family_DOB=json_decode($d->family_DOB);
        @endphp
        @for($i=0 ; $i < 1 ; $i++)
    <tr>
        <td colspan="5">{{$family_firstName[$i]}}</td>
        <td colspan="6">{{$family_presentAddress[$i]}}</td>
        <td colspan="6">{{$family_Relation[$i]}}</td>
    </tr>
        @endfor
    <tr>
        <td colspan="17" rowspan="2">
            I hereby decalare that the particulars given by me are correct to the best of my knowledge and belief. I undertake to intimate the corporation any changes in the membership of my family within 15 days of such change.
        </td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td colspan="2">XX</td>
        <td colspan="8"></td>
        <td colspan="2">X</td>
    </tr>
    <tr>
        <td colspan="5">Counter signature by the employer</td>
        <td colspan="5"></td>
        <td colspan="6">Signature /T.I.of IP.</td>
    </tr>
    <tr>
        <td colspan="3">Signature with sea</td>
    </tr>
    <tr>
        <td colspan="7"><strong>(D) Family Particulars of Insured person</strong></td>
    </tr>
    <tr>
        <td colspan="1" rowspan="3">SR. No.</td>
        <td colspan="3" rowspan="3">Name</td>
        <td colspan="3" rowspan="3">Date of Birth / Age as on Date of filling Form</td>
        <td colspan="3" rowspan="3">Relationship with the Employee</td>
        <td colspan="3" rowspan="2">Whether residing with him / her</td>
        <td colspan="4" rowspan="2">If' No' state Place of Residence</td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td colspan="2">YES</td>
        <td>No</td>
        <td colspan="2">Town</td>
        <td colspan="2">State</td>
    </tr>
    @for($i=0 ; $i < 1 ; $i++)
    <tr>
        <td colspan="1">1</td>
        <td colspan="3">{{$family_firstName[$i]}}</td>
        <td colspan="3">{{$family_DOB[$i]}}</td>
        <td colspan="3">{{$family_Relation[$i]}}</td>
        <td colspan="3"></td>
        <td colspan="4"></td>
    </tr>
    @endfor
    <tr>
        <td colspan="1">2</td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="1">3</td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="1">4</td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="3"></td>
        <td colspan="4"></td>
    </tr>

    <tr>
        <td colspan="7">ESI Corporation Temporary Identity Card</td>
        <td colspan="1"></td>
        <td colspan="9">(Valid for 3 month from the date of appointment)</td>
    </tr>
    <tr>
        <td colspan="3">Name</td>
        <td colspan="3">{{$d->Name}}</td>
        <td colspan="4">Date of appointment</td>
        <td colspan="3"></td>
        <td colspan="4" rowspan="4">Picture</td>

    </tr>
    <tr>
        <td colspan="3">Ins. No.</td>
        <td colspan="3">{{$d->esicNumber}}</td>
        <td colspan="4">{{$d->DOJ}}</td>
    </tr>
    <tr>
        <td colspan="2">Branch Office</td>
        <td colspan="3"></td>
        <td colspan="2">Dispensery</td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td colspan="2">Employer's Code No. & Address</td>
        <td colspan="4"></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="1">Validity</td>
        <td colspan="4"></td>
        <td colspan="1">X</td>
    </tr>
    <tr>
        <td colspan="1">Dated</td>
        <td colspan="4"></td>
        <td colspan="4">Signature /T.I.of IP.</td><td colspan="2"></td>
        <td colspan="5">Signature of B.M. with seal</td>
    </tr>
@endforeach
</table>