@php
    libxml_use_internal_errors(true);
@endphp
<table>
    <tbody>
    <tr>
        <td colspan="6">Name and Address of Contractor</td>
        <td colspan="10" rowspan="2">Register of Employees of Contractor [See Rule-75] Form 13</td>
        <td colspan="7" >Name and Address of Principal Employer</td>
    </tr>
    @foreach($company as $d)
    <tr>
        <td colspan="6" rowspan="2">{{$d->companyName.' '.$d->Address}}</td>
        <td colspan="7" ></td>
    </tr>
    @endforeach
    <tr>
        <td colspan="10" >Name & Add of Establ. In/under Which Contract is carried on</td>
        <td colspan="7" >Name and Location of Work</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1" rowspan="2">SR. NO.</td>
        <td colspan="3" rowspan="2">Name & Surname of Workerman</td>
        <td colspan="1" rowspan="2">Age</td>
        <td colspan="1" rowspan="2">Sex</td>
        <td colspan="2" rowspan="2">Designation/ Nature of Employement</td>
        <td colspan="2" rowspan="2">Permanent House Address of Workman(Vill, Taluka & Dist)</td>
        <td colspan="2" rowspan="2">Present Address</td>
        <td colspan="2" rowspan="2">Date of Commencement of Employment</td>
        <td colspan="2" rowspan="2">Signature or Thumb Imression of Workmen</td>
        <td colspan="2" rowspan="2">Date of Termination of Employment</td>
        <td colspan="2" rowspan="2">Reason for Termination</td>
        <td colspan="3" rowspan="2">Remarks</td>
    </tr>
    <tr></tr>
    @foreach($declaration as $i =>$d)
    <tr>
        <td colspan="1" rowspan="2">{{$i+1}}</td>
        <td colspan="3" rowspan="2">{{$d->Name}}</td>
        <td colspan="1" rowspan="2">{{$d->DOB}}</td>
        <td colspan="1" rowspan="2">{{$d->Gender}}</td>
        <td colspan="2" rowspan="2">{{$d->Designation}}</td>
        <td colspan="2" rowspan="2">{{$d->per_streetAddress}}</td>
        <td colspan="2" rowspan="2">{{$d->streetAddress}}</td>
        <td colspan="2" rowspan="2">{{$d->DOJ}}</td>
        <td colspan="2" rowspan="2"></td>
        <td colspan="2" rowspan="2"></td>
        <td colspan="2" rowspan="2"></td>
        <td colspan="3" rowspan="2"></td>
    </tr>
    <tr></tr>
        @endforeach
    </tbody>
</table>