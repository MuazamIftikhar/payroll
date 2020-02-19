<table id="example1" class="table table-bordered table-striped">
        <thead>
        @foreach($company as $c)
        <tr>
            <th >{{$c->companyName}}</th>
            <th > </th>
            <th > Month</th>
            @foreach($setting as $s)
            <th >{{$s->form}}</th>
            @endforeach
            <th > </th>
            <th></th>
            <th></th>
            @foreach($setting as $s)
                <th >{{$s->rules}}</th>
            @endforeach
        </tr>
        <tr>
            <th>{{$c->Address}}</th>
            <th></th>
            <th>{{$printDate}}</th>
        </tr>
        <tr>
            <th ></th>
        </tr>
        <tr>
            <th >{{$c->companyName}}</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>

        </tr>
        <tr>
            <td>{{$c->Address}}</td>
        </tr>
        @endforeach
        <tr>
            <th ></th>
        </tr>
        <tr>
            <th colspan="1" rowspan="2">Name of workman</th>
            <th colspan="1" rowspan="2">OT Hrs</th>
            <th colspan="1" rowspan="2">Number Of Days</th>
            <th colspan="1" rowspan="2">PL / SL / CL</th>
            <th colspan="1" rowspan="2">PH</th>
            <th colspan="1" rowspan="2">Total Paid Days</th>
            @foreach($salaryHead as $s)
            <th colspan="1" rowspan="2">{{$s->name}}</th>
            @endforeach
            <th colspan="1" rowspan="2">Other</th>
            <th colspan="1" rowspan="2">Total</th>
            <td colspan="{{count($salaryHead)+3}}">Amount of wages Earned</td>
            <td colspan="7">Deduction</td>
            <th colspan="1" rowspan="2">Net Amount Paid</th>
            <th colspan="1" rowspan="2">Signature / Thumb impression of workman</th>
            <th colspan="1" rowspan="2">Initials of contractor or his representative</th>
        </tr>
        <tr>
            @foreach($salaryHead as $s)
                <th colspan="1">{{$s->name}}</th>
            @endforeach
            <th colspan="1" >Other</th>
            <th colspan="1" >Over Time</th>
            <th colspan="1">Cash Total</th>
            <th colspan="1">P.F.</th>
            <th colspan="1">E.S.I.C./WC</th>
            <th colspan="1" >P-TAX</th>
            <th colspan="1" >LWF</th>
            <th colspan="1" >Advance</th>
            <th colspan="1" >Deduction if any</th>
            <th colspan="1" >Total Dection</th>
        </tr>
        @php
            $countSalaryHead=count($salaryHead);
        @endphp
        </thead>
        <tbody>
        @foreach($employee as $b)
            @php
                $countSalaryHeads=json_decode($b->salary_head,true);
                $counts=count($countSalaryHeads);
                $sum=0;
                $wages=0;
            @endphp
            <tr>
                <td>{{$b->Name}}</td>
                <td>{{$b->OT}}</td>
                <td>{{$b->PR_Day}}</td>
                <td>{{$b->PL}}</td>
                <td>{{$b->PH}}</td>
                <td>{{$b->Total}}</td>
                @foreach(json_decode($b->salary_head) as $s)
                <td>{{$s}}</td>
                    @php
                    $sum=$sum+$s;
                    @endphp
                @endforeach
                @if($countSalaryHead == $counts)
                @else
                <td>0</td>
                @endif
                <td>0</td>
                <td>{{$sum}}</td>
                @foreach(json_decode($b->salary_head) as $s)
                    <td>{{round($s*$b->Total,0)}}</td>
                    @php
                        $wages=$wages+round($s*$b->Total,0);
                    @endphp
                @endforeach
                @if($countSalaryHead == $counts)
                @else
                    <td>0</td>
                @endif
                <td>0</td>
                <td>{{round($sum/4*$b->OT,0)}}</td>
                <td>{{$wages+round($sum/4*$b->OT,0)}}</td>
                @php
                $basic=json_decode($b->salary_head,true);
                $totalCash=$wages+round($sum/4*$b->OT,0);
                //Pf flags
                if($b->PFFlag == "Yes"){

                    if($b->PFSaturating == "Yes"){

                    if($b->salary_flag == "Per Day"){
                    if($basic['Basic'] >576){ $PF=0; }else { $PF=round(round($basic['Basic']*$b->Total,0)*12/100,0);}
                    }else{
                     if($basic['Basic'] >15000){ $PF=0; }else {$PF=round(round($basic['Basic']*$b->Total,0)*12/100,0);}
                    }

                    }else{

                     if($b->salary_flag == "Per Day"){
                    if($basic['Basic'] >576){ $PF=0; }else { $PF=round(576*12/100,0);}
                    }else{
                     if($basic['Basic'] >15000){ $PF=0; }else {$PF=round(15000*12/100,0);}
                    }

                    }
                }else{

                $PF=0;

                }
                //ESIC Flag
                if($b->esicFlag == "Yes"){
                    if($b->salary_flag == "Per Day"){
                    if($sum>807){ $ESIC=0; }else {$ESIC=ceil(($wages+round($sum/4*$b->OT,0))*1.75/100);}
                    }else{
                    if($sum>21000){ $ESIC=0; }else {$ESIC=ceil(($wages+round($sum/4*$b->OT,0))*1.75/100);}
                    }
                }else{
                $ESIC=0;
                }

                if($b->PTFlag == "Yes"){
                if($totalCash==0){ $PTax=$ptax->value1; }elseif($totalCash < 6000) { $PTax=$ptax->value2;} elseif($totalCash < 9000) { $PTax=$ptax->value3;} elseif($totalCash < 12000){ $PTax=$ptax->value4;} else{ $PTax=$ptax->value5;}
                }else{
                $PTax=0;
                }
                $loan=$b->Loan;
                $Deduction=$b->Deduction;
                $totalDeduction=$PF+$ESIC+$PTax+$loan+$Deduction;
                @endphp
                <td>{{$PF}}</td>
                <td>{{$ESIC}}</td>
                <td>{{$PTax}}</td>
                <td>0</td>
                <td>{{$b->Loan}}</td>
                <td>{{$b->Deduction}}</td>
                <td>{{$totalDeduction}}</td>
                <td>{{$totalCash-$totalDeduction}}</td>
           </tr>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
    </table>


