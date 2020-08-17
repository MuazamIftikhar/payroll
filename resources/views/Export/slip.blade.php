
@php
    libxml_use_internal_errors(false);
@endphp
<table>
    <tbody>
    @foreach($employee as $i=>$b)
     <tr></tr>
    <tr>
        <td colspan="7">{{$b->companyName}}</td>
        <td colspan="2">{{$i+1}}</td>
    </tr>

    <tr>
        <td colspan="9" rowspan="2">{{$b->Address}}</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="7">[Form-IV B Rule 26 (2)] Wage Slip for the Month of</td>
        <td colspan="2">{{$printDate}}</td>
    </tr>
    <tr>
        <td colspan="2">Empl. No.</td>
        <td colspan="2">{{$b->id}}</td>
        <td colspan="1"></td>
        <td colspan="2">PF UAN NO.</td>
        <td colspan="2">{{$b->UAN}}</td>
    </tr>
    <tr>
        <td colspan="2">Empl. Name</td>
        <td colspan="2">{{$b->Name}}</td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">Desig.</td>
        <td colspan="2">{{$b->Designation}}</td>
        <td colspan="1"></td>
        <td colspan="2">ESIC No</td>
        <td colspan="2">{{$b->esicNumber}}</td>
    </tr>
    <tr>
        <td colspan="2">Dept.</td>
        <td colspan="1">OT Hrs</td>
        <td colspan="2">Work days</td>
        <td colspan="1">Leave</td>
        <td colspan="1">PH</td>
        <td colspan="2">Paid days</td>
    </tr>
    <tr>
        <td colspan="2">Dept.</td>
        <td colspan="1">{{$b->OT}}</td>
        <td colspan="2">{{$b->PR_Day}}</td>
        <td colspan="1">{{$b->PL+$b->SL+$b->CL}}</td>
        <td colspan="1">{{$b->PH}}</td>
        <td colspan="2">{{$b->Total}}</td>
    </tr>
    <tr>
        <td colspan="2">Earnings</td>
        <td colspan="1">Salary</td>
        <td colspan="2">Gross Salary</td>
        <td colspan="2">Deductions</td>
        <td colspan="2">Amount</td>
    </tr>
    <?php
    $heads_value=array();
    $deuction_value=array();
    $sum=0;
    $wages=0;
    $newSumVar=0;
    $newSumEsic=0;
    $newSumPf=0;
    $toal1=0;
    $toal2=0;
    $toal3=0;
    $toal4=0;
    $toal5=0;
    $toal6=0;
    $vat=0;

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

    ?>
    @foreach(json_decode($b->salary_head) as $d)
<?php
if($b->salary_flag == "Per Day"){
    $wages=$wages+round($d*$b->Total,0);
    $ot=round($newSumVar/4*$b->OT,0);
}else{
    $wages=$wages+round($d/$b->assignDay*$b->Total,0);
    $ot=round($newSumVar/$b->assignDay/4*$b->OT,0);
}
$totalCash=$wages+$ot;

$loopValue=$loop->iteration;
if($loop->iteration == 1){
    $toal1=$toal1+$d;
}elseif ($loop->iteration == 2){
    $toal2=$toal2+$d;
}elseif ($loop->iteration == 3){
    $toal3=$toal3+$d;
}elseif ($loop->iteration == 4){
    $toal4=$toal4+$d;
}elseif ($loop->iteration == 5){
    $toal5=$toal5+$d;
}elseif ($loop->iteration == 6){
    $toal6=$toal6+$d;
}
$sum=$sum+$d;
array_push($heads_value,$d);

$deduction = array("PF", "ESIC", "PTax","Advance");
$count_deduction=count($deduction);
?>@endforeach
<?php

if($b->PFFlag == "Yes"){
    if($b->PFSaturating == "Yes"){
        if($b->salary_flag == "Per Day"){
            if(($newSumPf*$b->Total) >576){ $PF=0; }else { $PF=round(round($newSumPf*$b->Total,0)*12/100,0);}
        }else{
            if(($newSumPf/$b->assignDay*$b->Total) >15000){ $PF=0; }else {$PF=round(round($newSumPf/$b->assignDay*$b->Total,0)*12/100,0);}
        }
    }else{
        if($b->salary_flag == "Per Day"){
            if(($newSumPf*$b->Total) >576){ $PF=0; }else { $PF=round(576*12/100,0);}
        }else{
            if(($newSumPf/$b->assignDay*$b->Total) >15000){ $PF=0; }else {$PF=round(15000*12/100,0);}
        }
    }
}else{
    $PF=0;
}


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

$Advance=$b->Advance;
array_push($deuction_value,$PF,$ESIC,$PTax,$Advance);
    ?>
    @foreach($salaryHead as $i=>$s)
    <tr>
        <td colspan="2">{{$s->name}}</td>
        <td colspan="1">{{$heads_value[$i]}}</td>
        @if($b->salary_flag == "Per Day")
            <td colspan="2">{{round($heads_value[$i]*$b->Total,0)}}</td>
        @else
            <td colspan="2">{{round($heads_value[$i]/$b->assignDay*$b->Total,0)}}</td>
        @endif
        <td colspan="2">{{$deduction[$i]}}</td>
        <td colspan="2">{{$deuction_value[$i]}}</td>
    </tr>
        <?php
            $count_salaryHeads=$i+1;
        ?>
    @endforeach

    @if($count_deduction>$count_salaryHeads)
       @for($i=$count_salaryHeads;$i<$count_deduction;$i++)
           <tr>
               <td colspan="2"></td>
               <td colspan="1"></td>
               <td colspan="2"></td>
               <td colspan="2">{{$deduction[$i]}}</td>
               <td colspan="2"></td>
           </tr>
       @endfor
    @endif

    <tr>
        <td colspan="2">Other</td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2">Other dedu</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2">OT Amount</td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    @php
        if($b->salary_flag == "Per Day"){
               $vat=round(array_sum($heads_value)*$b->Total,0);
           }else{
               $vat=round(array_sum($heads_value)/$b->assignDay*$b->Total,0);
           }
    $sum_ded=array_sum($deuction_value);
            @endphp
    <tr>
        <td colspan="2"></td>
        <td colspan="1"></td>
        <td colspan="2">{{$vat}}</td>
        <td colspan="2"></td>
        <td colspan="2">{{$sum_ded}}</td>
    </tr>
    <tr>
        <td colspan="2">Net Pay</td>
        <td colspan="1">{{$vat-$sum_ded}}</td>
    </tr>


    <tr>
        <td colspan="4" rowspan="2"> H. R. Department </td>
        <td colspan="1" rowspan="2"></td>
        <td colspan="4" rowspan="2">Empl Sign</td>
    </tr>
    <tr></tr>
    <tr></tr>

    @endforeach
    </tbody>
</table>