
@php
    libxml_use_internal_errors(false);
@endphp
<table>
    <tbody>
    <tr>
        <td colspan="1" rowspan="3">IP Number </td>
        <td colspan="1" rowspan="3">IP Name </td>
        <td colspan="1" rowspan="3">No. of Days </td>
        <td colspan="2" rowspan="3">Total Monthly Wages</td>
        <td colspan="3" rowspan="3"> Reason Code for Zero workings days(numeric only; provide 0 for all other reasons- Click on the link for reference)</td>
        <td colspan="1" rowspan="3"> Last Working Day</td>
    </tr>
    <tr></tr>
    <tr></tr>
    @foreach($employee as $e)
        <tr>
        @php
            $total=0;
                $sum=0;
        @endphp
            <td colspan="1">{{$e->esicNumber}}</td>
            <td colspan="1">{{$e->Name}} </td>
            <td colspan="1">{{$e->Total}} </td>
            @foreach(json_decode($e->salary_head) as $s)
                {{--@php--}}
                {{--$sum=$sum+$s;--}}
                {{--@endphp--}}
        <?php
                if($e->salary_flag == "Per Day"){
                    $sum=round($s*$e->Total,0);
                }
                else{
                    $sum=round($s/$e->assignDay*$e->Total,0);
                }
                $total=$total+$sum;
                ?>
            @endforeach

            <td colspan="2">{{$total}}</td>
            <td colspan="3"> </td>
            <td colspan="1"></td>
        </tr>
    @endforeach
    </tbody>
</table>