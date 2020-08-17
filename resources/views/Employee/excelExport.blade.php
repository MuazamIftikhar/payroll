@php
        $OTTotal=0;
        $PR_DayTotal=0;
        $PLTotal=0;
        $PHTotal=0;
        $TotalTotal=0;
        $toal1=0;
        $toal2=0;
        $toal3=0;
        $toal4=0;
        $toal5=0;
        $toal6=0;
        $Totallwf=0;
        $totalWages1=0;
        $totalWages2=0;
        $totalWages3=0;
        $totalWages4=0;
        $totalWages5=0;
        $totalWages6=0;
        $totalsum=0;
        $totalOverTime=0;
        $totalEarned=0;
        $TotalPF=0;
        $TotalESIC =0;
        $TotalPTax = 0;
        $TotalLoan = 0;
        $TotalDeduction = 0;
        $FinalCash = 0;
        $loopValue = 0;
        $FinalDeduction=0;
@endphp
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
                <td>{{$b->PL+$b->SL+$b->CL}}</td>
                <td>{{$b->PH}}</td>
                <td>{{$b->Total}}</td>
                @foreach(json_decode($b->salary_head) as $s)
                <td>{{$s}}</td>
                    @php
                        $loopValue=$loop->iteration;
                         if($loop->iteration == 1){
                            $toal1=$toal1+$s;
                         }elseif ($loop->iteration == 2){
                         $toal2=$toal2+$s;
                         }elseif ($loop->iteration == 3){
                         $toal3=$toal3+$s;
                         }elseif ($loop->iteration == 4){
                         $toal4=$toal4+$s;
                         }elseif ($loop->iteration == 5){
                         $toal5=$toal5+$s;
                         }elseif ($loop->iteration == 6){
                         $toal6=$toal6+$s;
                         }
                        $sum=$sum+$s;


                    @endphp
                @endforeach
                @if($countSalaryHead == $counts)
                @else
                <td>0</td>
                @endif
                <td>0</td>
                @php
                    $newSumVar=0;
                    $newSumEsic=0;
                    $newSumPf=0;
                    $jsonDecodeFirstArray=json_decode($b->salary_head);
                    $jsonDecodeSecondArray=json_decode($b->overtime_salary_head);
                    $jsonDecodeThirdArray=json_decode($b->esics_salary_head);
                    $jsonDecodeFourthArray=json_decode($b->pfs_salary_head);
                    foreach($jsonDecodeSecondArray as $key1){
                            foreach(json_decode($b->salary_head) as $key => $value){
                            if($key1 == $key){
                                $newSumVar += $value;
                                }
                            }
                        }
                    foreach($jsonDecodeThirdArray as $key2){
                            foreach(json_decode($b->salary_head) as $key => $value1){
                            if($key2 == $key){
                                $newSumEsic += $value1;
                                }
                            }
                        }
                    foreach($jsonDecodeFourthArray as $key3){
                            foreach(json_decode($b->salary_head) as $key => $value2){
                            if($key3 == $key){
                                $newSumPf += $value2;
                            }
                        }
                    }
                 @endphp
                <td>{{$sum}}</td>
                @php
                $totalsum=$totalsum+$sum;
                        @endphp
                @foreach(json_decode($b->salary_head) as $s)
                    @if($b->salary_flag == "Per Day")
                    <td>{{round($s*$b->Total,0)}}</td>
                    @else
                    <td>{{round($s/$b->assignDay*$b->Total,0)}}</td>
                    @endif
                    @php
                    if($b->salary_flag == "Per Day"){
                       $wages=$wages+round($s*$b->Total,0);
                            if($loop->iteration == 1){
                             $totalWages1=$totalWages1+(round($s*$b->Total,0));
                            }elseif ($loop->iteration == 2){
                             $totalWages2=$totalWages2+(round($s*$b->Total,0));
                             }elseif ($loop->iteration == 3){
                             $totalWages3=$totalWages3+(round($s*$b->Total,0));
                             }elseif ($loop->iteration == 4){
                             $totalWages4=$totalWages4+(round($s*$b->Total,0));
                             }elseif ($loop->iteration == 5){
                             $totalWages5=$totalWages5+(round($s*$b->Total,0));
                             }elseif ($loop->iteration == 6){
                             $totalWages6=$totalWages6+(round($s*$b->Total,0));
                             }
                    }else{
                        $wages=$wages+round($s/$b->assignDay*$b->Total,0);
                       if($loop->iteration == 1){
                             $totalWages1=$totalWages1+(round($s/$b->assignDay*$b->Total,0));
                            }elseif ($loop->iteration == 2){
                             $totalWages2=$totalWages2+(round($s/$b->assignDay*$b->Total,0));
                             }elseif ($loop->iteration == 3){
                             $totalWages3=$totalWages3+(round($s/$b->assignDay*$b->Total,0));
                             }elseif ($loop->iteration == 4){
                             $totalWages4=$totalWages4+(round($s/$b->assignDay*$b->Total,0));
                             }elseif ($loop->iteration == 5){
                             $totalWages5=$totalWages5+(round($s/$b->assignDay*$b->Total,0));
                             }elseif ($loop->iteration == 6){
                             $totalWages6=$totalWages6+(round($s/$b->assignDay*$b->Total,0));
                             }
                    }
                    @endphp
                @endforeach
                @if($countSalaryHead == $counts)
                @else
                    <td>0</td>
                @endif
                <td>0</td>
                @php
                    if($b->salary_flag == "Per Day"){
                   $ot=round($newSumVar/4*$b->OT,0);
                   }else{
                   $ot=round($newSumVar/$b->assignDay/4*$b->OT,0);
                   }
                   @endphp
                <td>{{$ot}}</td>
                <td>{{$wages+$ot}}</td>
                @php
                   $totalOverTime=$totalOverTime+$ot;
                   $totalEarned=$totalEarned+($wages+$ot);
                   $basic=json_decode($b->salary_head,true);
                   $totalCash=$wages+$ot;
                   //Pf flags
                  // dd($newSumPf/$b->assignDay*$b->Total);
                   if($b->PFFlag == "Yes"){
                       if($b->salary_flag == "Per Day"){
                        $PF=round(round($newSumPf*$b->Total,0)*12/100,0);
                       }else{
                            if($b->PFSaturating == "Yes"){
                                 if(($newSumPf/$b->assignDay*$b->Total) >15000){ $PF=round(round($newSumPf/$b->assignDay*$b->Total,0)*12/100,0); }else {   $PF=round(15000*12/100,0); }
                            }else{
                                 $PF=0;
                            }
                       }
                   }else{
                       $PF=0;
                       }
                   //ESIC Flag
                   if($b->esicFlag == "Yes"){
                       if($b->salary_flag == "Per Day"){
                       if($sum>807){ $ESIC=0; }else {$ESIC=ceil((round($newSumEsic*$b->Total,0))*0.75/100);}
                       }else{
                       if($sum>21000){ $ESIC=0; }else {$ESIC=ceil((round($newSumEsic/$b->assignDay*$b->Total,0))*0.75/100);}
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
                   $lwf=0;
       $current_month=date('m');
       if($current_month ==  "06" || $current_month ==  "12")
       {
       $lwf=6;
       }else{
       $lwf=0;
       }
                @endphp
                <td>{{$PF}}</td>
                <td>{{$ESIC}}</td>
                <td>{{$PTax}}</td>
                <td>{{$lwf}}</td>
                <td>{{$b->Loan}}</td>
                <td>{{$b->Deduction}}</td>
                <td>{{$totalDeduction}}</td>
                <td>{{$totalCash-$totalDeduction}}</td>
           </tr>
            @php
            $OTTotal=$OTTotal+$b->OT;
            $PR_DayTotal=$PR_DayTotal+$b->PR_Day;
            $PLTotal=$PLTotal+($b->PL+$b->SL+$b->CL);
            $PHTotal=$PHTotal+$b->PH;
            $TotalTotal=$TotalTotal+$b->Total;
            $TotalPF=$TotalPF+$PF;
            $TotalESIC = $TotalESIC + $ESIC;
            $TotalPTax = $TotalPTax + $PTax;
            $Totallwf = $Totallwf + $lwf;
            $TotalLoan = $TotalLoan + ($b->Loan);
            $TotalDeduction = $TotalDeduction + ($b->Deduction);
            $FinalDeduction = $FinalDeduction + ($totalDeduction);
            $FinalCash = $FinalCash +($totalCash-$totalDeduction);
            @endphp
        @endforeach
        <tr>
            <td>Total</td>
            <td>{{$OTTotal}}</td>
            <td>{{$PR_DayTotal}}</td>
            <td>{{$PLTotal}}</td>
            <td>{{$PHTotal}}</td>
            <td>{{$TotalTotal}}</td>

            @if($loopValue >= 1)
            <td>{{$toal1}}</td>
            @endif
            @if($loopValue >= 2)
            <td>{{$toal2}}</td>
            @endif
            @if($loopValue >= 3)
            <td>{{$toal3}}</td>
            @endif
            @if($loopValue >= 4)
            <td>{{$toal4}}</td>
            @endif
            @if($loopValue >= 5)
            <td>{{$toal5}}</td>
            @endif
            @if($loopValue >= 6)
            <td>{{$toal6}}</td>
            @endif
            <td>0</td>
            <td>{{$totalsum}}</td>

            @if($loopValue >= 1)
                <td>{{$totalWages1}}</td>
            @endif
            @if($loopValue >= 2)
                <td>{{$totalWages2}}</td>
            @endif
            @if($loopValue >= 3)
                <td>{{$totalWages3}}</td>
            @endif
            @if($loopValue >= 4)
                <td>{{$totalWages4}}</td>
            @endif
            @if($loopValue >= 5)
                <td>{{$totalWages5}}</td>
            @endif
            @if($loopValue >= 6)
                <td>{{$totalWages6}}</td>
            @endif
            <td>0</td>


            <td>{{$totalOverTime}}</td>
            <td>{{$totalEarned}}</td>
            <td>{{$TotalPF}}</td>
            <td>{{$TotalESIC}}</td>
            <td>{{$TotalPTax}}</td>
            <td>{{$Totallwf}}</td>
            <td>{{$TotalLoan}}</td>
            <td>{{$TotalDeduction}}</td>
            <td>{{$FinalDeduction}}</td>
            <td>{{$FinalCash}}</td>



        </tr>
        </tbody>
        <tfoot>
        </tfoot>
    </table>


