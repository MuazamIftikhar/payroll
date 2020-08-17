@php
    libxml_use_internal_errors(true);
@endphp
<table>
    <tbody>
    <tr>
        <td colspan="12">Name and Address of Factory</td>
        <td colspan="11" rowspan="3">IDENTITY CARD REGISTER</td>
    </tr>
    @foreach($company as $d)
    <tr>
        <td colspan="12" rowspan="2">{{$d->companyName.' '.$d->Address}}</td>
    </tr>
    @endforeach
    <tr></tr>
    <tr>
        <td colspan="1" rowspan="2">SR. NO.</td>
        <td colspan="3" rowspan="2">Full Name & Address (Present) of the Worker</td>
        <td colspan="3" rowspan="2">Permanent House & Address of the Worker (Village, Taluka & District)</td>
        <td colspan="2" rowspan="2">Date of Birth of the Worker</td>
        <td colspan="2" rowspan="2">Date of Joining of the Worker</td>
        <td colspan="3" rowspan="2">Recent Passport Size Photo of the Worker</td>
        <td colspan="2" rowspan="2">Signature of Thum Impression of the Worker</td>
        <td colspan="2" rowspan="2">Signature of Manager or Authorised Agent</td>
        <td colspan="2" rowspan="2">Identity Card Issue Date</td>
        <td colspan="3" rowspan="2">Remarks</td>
    </tr>
    <tr></tr>
    @foreach($declaration as $i => $d)
    <tr>
        <td colspan="1" rowspan="2">{{$i+1}}</td>
        <td colspan="3" rowspan="2">{{$d->Nmae.' '.$d->streetAddress}}</td>
        <td colspan="3" rowspan="2">{{$d->per_streetAddress}}</td>
        <td colspan="2" rowspan="2">{{$d->DOB}}</td>
        <td colspan="2" rowspan="2">{{$d->DOJ}}</td>
        <td colspan="3" rowspan="2"></td>
        <td colspan="2" rowspan="2"></td>
        <td colspan="2" rowspan="2"></td>
        <td colspan="2" rowspan="2"></td>
        <td colspan="3" rowspan="2"></td>
    </tr>
    <tr></tr>
    @endforeach
    </tbody>
</table>