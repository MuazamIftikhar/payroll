
@php
    libxml_use_internal_errors(false);
@endphp
<table>
    <tbody>
    <tr>
        <td colspan="1">Sr. NO.</td>
        <td colspan="1">UAN  </td>
        <td colspan="1">Member Name </td>
        <td colspan="2">GROSS _ WAGES </td>
        <td colspan="2">EPF_WAGES</td>
        <td colspan="2"> EPS_WAGES </td>
        <td colspan="2"> EDLI _ WAGES</td>
        <td colspan="2"> EPF _ CONTRI _ REMITTED</td>
        <td colspan="2"> EPS_CONTRI _ REMITTED</td>
        <td colspan="2"> EPF_EPS_DIFF_REMITTED</td>
        <td colspan="2"> NCP_DAYS</td>
        <td colspan="2"> REFUND_OF_ADVANCES</td>
    </tr>
    @foreach($employee as $i => $e)
        @php
            $sum=0;
        @endphp
        <tr>
            <td colspan="1">{{$i+1}}</td>
            <td colspan="1">{{$e->UAN}}  </td>
            <td colspan="1">{{$e->salaryFlag}} </td>
            @foreach(json_decode($e->salary_head) as $s)
                @php
                    $sum=$sum+$s;
                @endphp
            @endforeach
            <td colspan="2">{{$sum}}</td>
            @foreach(json_decode($e->salary_head) as $s)
                @php
                    $loopValue=$loop->iteration;

                @endphp
                @if($loop->iteration == 1)
                   @if($e->salary_flag == "Per Day")
                       <td colspan="2">{{round($s*$e->Total,0)}}</td>
                       <td colspan="2">{{round($s*$e->Total,0)}}</td>
                       <td colspan="2">{{round($s*$e->Total,0)}}</td>
                       <td colspan="2">{{round(round($s*$e->Total,0)*12/100,0)}}</td>
                       <td colspan="2">{{round(round($s*$e->Total,0)*8.33/100,0)}}</td>
                       <td colspan="2">{{round(round($s*$e->Total,0)*12/100,0)-round(round($s*$e->Total,0)*8.33/100,0)}}</td>
                   @else
                       <td colspan="2">{{round($s/$e->assignDay*$e->Total,0)}}</td>
                       <td colspan="2">{{round($s/$e->assignDay*$e->Total,0)}}</td>
                       <td colspan="2">{{round($s/$e->assignDay*$e->Total,0)}}</td>
                       <td colspan="2">{{round(round($s/$e->assignDay*$e->Total,0)*12/100,0)}}</td>
                       <td colspan="2">{{round(round($s/$e->assignDay*$e->Total,0)*8.33/100,0)}}</td>
                       <td colspan="2">{{round(round($s/$e->assignDay*$e->Total,0)*12/100,0)-round(round($s/$e->assignDay*$e->Total,0)*8.33/100,0)}}</td>
                   @endif
                @endif
             @endforeach
            <td colspan="2">{{$e->Total}}</td>
            <td colspan="2"></td>
        </tr>
    @endforeach
    </tbody>
</table>