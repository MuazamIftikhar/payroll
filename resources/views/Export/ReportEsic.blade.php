
@php
    libxml_use_internal_errors(false);
@endphp
    <table>
        <tbody>
        <tr>
            <td colspan="1" rowspan="3">IP Number </td>
            <td colspan="1" rowspan="3">IP Name </td>
            <td colspan="2" rowspan="3">No of Days for which wages paid/payable during the month </td>
            <td colspan="2" rowspan="3">Total Monthly Wages</td>
            <td colspan="2" rowspan="3"> Reason Code for Zero workings days(numeric only; provide 0 for all other reasons- Click on the link for reference)</td>
            <td colspan="1" rowspan="3"> Last Working Day</td>
        </tr>
        <tr></tr>
        <tr></tr>
        @foreach($employee as $e)
            @php
            $sum=0;
            @endphp
        <tr>
            <td colspan="1">{{$e->esicNumber}}</td>
            <td colspan="1">{{$e->salaryFlag}} </td>
            <td colspan="2">{{$e->PR_Day}} </td>
            @foreach(json_decode($e->salary_head) as $s)
                @php
                    $sum=$sum+$s;
                @endphp
            @endforeach
            <td colspan="2">{{$sum}}</td>
            <td colspan="2"> </td>
            <td colspan="1"> {{$e->DOE}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>