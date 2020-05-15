@php
    libxml_use_internal_errors(true);
@endphp
@foreach($declaration as $d)
<table border="6">
    <tr>
        <td colspan="8">
                    FORM I
        </td>
        <td colspan="1">
            I
        </td>
    </tr>
    <tr>
        <td colspan="9">
            NOMINATION AND DECLARATION FORM
        </td>
    </tr>
    <tr>
        <td colspan="9">
            [See Rule 3]
        </td>
    </tr>
    <tr>
        <td colspan="9">

        </td>
    </tr>
    <tr>
        <th colspan="1">1</th>
        <th colspan="5">Name of Person Making Nomination(In Block Letters)</th>
        <th colspan="3">{{$d->Name}}</th>
    </tr>
    <tr>
        <th colspan="1">2</th>
        <th colspan="5">Father's/Husband's Name</th>
        <th colspan="3">{{$d->fatherName}}</th>
    </tr>
    <tr>
        <th colspan="1">3</th>
        <th colspan="5">Date of Birth</th>
        <th colspan="3">{{$d->DOB}}</th>
    </tr>
    <tr>
        <th colspan="1">4</th>
        <th colspan="5">Sex</th>
        <th colspan="3">{{$d->Gender}}</th>
    </tr>
    <tr>
        <th colspan="1">5</th>
        <th colspan="5">Marital Status</th>
        <th colspan="3">{{$d->Status}}</th>
    </tr>
    <tr>
        <th colspan="1">6</th>
        <th colspan="5">Address:Permanent </th>
        <th colspan="3">Temporary </th>
    </tr>
    <tr>
        <th colspan="1"></th>
        <th colspan="5">{{$d->per_streetAddress}}</th>
        <th colspan="3">{{$d->streetAddress}}</th>
    </tr>
    <tr>
    <th colspan="9" rowspan="2">
        I hereby nominate the person(s)/ cancel the nomination made by me previously and nominate the person(s) mentioned below to receive any amount due to me from the employer, in the event of my death.
    </th>
    </tr>
    <tr>
    </tr>
    <tr>
        <th>Name of the Nominee/Nominees</th>
        <th>Address</th>
        <th>Nominee's Relationship <br>with the member</th>
        <th>Date of Birth</th>
        <th colspan="2">Total amount of share of accumulations in credit to be paid to each nominee</th>
        <th colspan="3">If the nominee is minor,name, relationship and  address of the guardian who may receive the amount during the  minority of nominee</th>
    </tr>
    @php
        $family_firstName=json_decode($d->family_firstName);
        $family_Relation=json_decode($d->family_Relation);
        $family_presentAddress=json_decode($d->family_presentAddress);
        $family_DOB=json_decode($d->family_DOB);
    @endphp
    @for($i=0 ; $i < 1 ; $i++)
    <tr>
        <th>{{$family_firstName[$i]}}</th>
        <th>{{$family_presentAddress[$i]}}</th>
        <th>{{$family_Relation[$i]}}</th>
        <th>{{$family_DOB[$i]}}</th>
        <th colspan="2"></th>
        <th colspan="3"></th>
    </tr>
    @endfor
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2"></th>
        <th colspan="3"></th>
    </tr> <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2"></th>
        <th colspan="3"></th>
    </tr> <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2"></th>
        <th colspan="3"></th>
    </tr> <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2"></th>
        <th colspan="3"></th>
    </tr> <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2"></th>
        <th colspan="3"></th>
    </tr> <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2"></th>
        <th colspan="3"></th>
    </tr> <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th colspan="2"></th>
        <th colspan="3"></th>
    </tr>
    <tr>
        <th colspan="9">
           1.Certified that I have no family and should I acquire a family hereafter, the above nomination shall be deemed as cancelled
        </th>
    </tr>
    <tr>
        <th colspan="9">
              2.Certified that may father/mother is/are dependent upon me.

        </th>
    </tr>
    <tr>
        <th colspan="9">
            3.Strike out whichever is not applicable
        </th>
    </tr>
    <tr></tr>
    <tr>
        <th colspan="3"></th>
        <th colspan="4">X</th>
    </tr>
    <tr>
        <th colspan="3"></th>
        <th colspan="6">Signature or the thump impression of the employed person</th>
    </tr>
</table>
    @endforeach