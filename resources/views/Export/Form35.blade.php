@php
    libxml_use_internal_errors(true);
@endphp
@foreach($declaration as $d)
<table>

    <tr >
        <td colspan="8">FORM NO. 35</td>
        <td colspan="1">1</td>
    </tr>
    <tr >
        <td colspan="9">[Prescribed under Rule 100]</td>
    </tr>
    <tr>
        <td colspan="9">Nomination</td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td colspan="9">
        Nomination for payment of wages in lieu of the quantum of leave to which he was entitled in the
        </td>
    </tr>
    <tr>
        <td colspan="3">event of death of worker.</td>
        <td colspan="6">{{$d->Name}}</td>
    </tr>
    @php
        $family_firstName=json_decode($d->family_firstName);
        $family_Relation=json_decode($d->family_Relation);
        $family_presentAddress=json_decode($d->family_presentAddress);
        $family_DOB=json_decode($d->family_DOB);
    @endphp
    @for($i=0 ; $i < 1 ; $i++)
    <tr>
        <td colspan="2">I hereby nominate Shri. </td>
        <td colspan="2">{{$family_firstName[$i]}}</td>
        <td colspan="2">who is my</td>
        <td colspan="1">{{$family_Relation[$i]}}</td>
        <td colspan="2">and resident at</td>
    </tr>

    <tr>
        <td colspan="5">{{$family_presentAddress[$i]}}</td>
        <td colspan="4">as to receive the amount of the balance of my </td>
    </tr>
        @endfor
    <tr>
        <td colspan="9">wages in lieu of the quantum of leave not availed of, in the event of my death before resuming </td>
    </tr>
    <tr>
        <td colspan="2">Dated this </td>
        <td colspan="2"> </td>
        <td colspan="2"> at </td>
        <td colspan="3">  </td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1"> Witness</td>
        <td colspan="8"></td>
    </tr>
    @php
        $witness=json_decode($d->Witness);
        $address=json_decode($d->witnessAddress);
    @endphp
    @for($i=0 ; $i < 2 ; $i++)
    <tr>
        <td colspan="1" rowspan="5">{{$i+1}}</td>
        <td colspan="1" rowspan="2">signature</td>
        <td colspan="7" rowspan="2"></td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1" >Name</td>
        <td colspan="7" >{{$witness[$i]}}</td>
    </tr>
    <tr>
        <td colspan="1" rowspan="2">Address</td>
        <td colspan="7" rowspan="2">{{$address[$i]}}</td>
    </tr>
    <tr></tr>
    @endfor
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">X</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="5">Signature or Left thump impression of the worker</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="5">Particulars of worker</td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="5" rowspan="2">(such as serial number in the register of adult/child workers, section or department, etc.)</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2">Date</td>
        <td colspan="2"></td>
    </tr>

</table>
    @endforeach