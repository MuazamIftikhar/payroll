@php
    libxml_use_internal_errors(true);
@endphp
@foreach($declaration as $d)
<table>
    <tbody>
    <tr>
        <td colspan="8">       FORM - F</td>
        <td colspan="1">1</td>
    </tr>
    <tr>
        <td colspan="9">PAYMENT OF GRATUITY ACT.</td>
    </tr>
    <tr>
        <td colspan="9">[ SEE SUB-RULE (1) of Rule 6 ]</td>
    </tr>
    <tr>
        <td colspan="9">NOMINATION</td>
    </tr>
    <tr>
        <td colspan="1">To,</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="8" rowspan="2">{{$d->Address}}</td>
    </tr>

    <tr></tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="8" >[ Give here name or description of the establishment with full address ]</td>
    </tr>
    Shri/Shrimati
    <tr>
        <td colspan="1">1</td>
        <td colspan="2"> Shri/Shrimati</td>
        <td colspan="6" >{{$d->Name}}</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td colspan="6" >[Employees Full Name here]</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="8"rowspan="3">Whose particulars are given in the statement below.  I hereby nominate the person(s) mentioned below to receive the gratuity payable after my death as also the gratuity standing to my credit in the event of my death before the amount has become payable or having become Payable has not been paid and direct that the said amount of gratuity shall be paid in proportion indicated against the name(s) of the nominee(s)</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="1">2</td>
        <td colspan="8"rowspan="2">I hereby certify the person (s) mentioned is/are a member (s) of my family within the meaning of clause (h) of Section (2) of the payment of Gratuity Act. 1972.</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">3</td>
        <td colspan="8"rowspan="2">I hereby declare that I have no family within the meaning of clause (h) of section (2) of the said Act.</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">4</td>
        <td colspan="8">(a)   My Father/Mother/Parents is/are not dependent on me.</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="8">(b) My husband’s/father/mother/parents is/are not dependent on my husband.</td>
    </tr>
    <tr>
        <td colspan="1">5</td>
        <td colspan="8" rowspan="2">I have excluded My Husband from my family by a notice dated the ………. to the controlling authority in terms of the provision to clause (h) of section 2 of the said Act.</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">6</td>
        <td colspan="8" >Nomination made herein invalidates my previous nomination.</td>
    </tr>
    <tr>
        <td colspan="9" >NOMINEE’S</td>
    </tr>
    <tr>
        <td colspan="1" ></td>
        <td colspan="3" >Name in full with full address of nominee(s)</td>
        <td colspan="1" >Relationship with the employee</td>
        <td colspan="2" >Age of nominee</td>
        <td colspan="2" >Proportion by which the gratuity will be shared</td>
    </tr>

    <tr>
        <td colspan="1" ></td>
        <td colspan="3" >1</td>
        <td colspan="1" >2</td>
        <td colspan="2" >3</td>
        <td colspan="2" >4</td>
    </tr>
    @php
        $family_firstName=json_decode($d->family_firstName);
        $family_Relation=json_decode($d->family_Relation);
        $family_presentAddress=json_decode($d->family_presentAddress);
        $family_DOB=json_decode($d->family_DOB);
    @endphp
    @for($i=0 ; $i < 1 ; $i++)
    <tr>
        <td colspan="1" >1</td>
        <td colspan="3" >{{$family_firstName[$i]}}</td>
        <td colspan="1" >{{$family_Relation[$i]}}</td>
        <td colspan="2" >{{$family_DOB[$i]}}</td>
        <td colspan="2" ></td>
    </tr>

    <tr>
        <td colspan="1" ></td>
        <td colspan="3" >{{$family_presentAddress[$i]}}</td>
        <td colspan="1" ></td>
        <td colspan="2" ></td>
        <td colspan="2" ></td>
    </tr>
    @endfor
    <tr>
        <td colspan="1" >2</td>
        <td colspan="3" ></td>
        <td colspan="1" ></td>
        <td colspan="2" ></td>
        <td colspan="2" ></td>
    </tr>
    <tr>
        <td colspan="1" ></td>
        <td colspan="3" ></td>
        <td colspan="1" ></td>
        <td colspan="2" ></td>
        <td colspan="2" ></td>
    </tr>
    <tr>
        <td colspan="1" >3</td>
        <td colspan="3" ></td>
        <td colspan="1" ></td>
        <td colspan="2" ></td>
        <td colspan="2" ></td>
    </tr>
    <tr>
        <td colspan="1" ></td>
        <td colspan="3" ></td>
        <td colspan="1" ></td>
        <td colspan="2" ></td>
        <td colspan="2" ></td>
    </tr>
    <tr>
        <td colspan="1" >4</td>
        <td colspan="3" ></td>
        <td colspan="1" ></td>
        <td colspan="2" ></td>
        <td colspan="2" ></td>
    </tr>
    <tr>
        <td colspan="1" ></td>
        <td colspan="3" ></td>
        <td colspan="1" ></td>
        <td colspan="2" ></td>
        <td colspan="2" ></td>
    </tr>
    <tr>
        <td colspan="9">STATEMENT</td>
    </tr>
    <tr>
        <td colspan="1">1</td>
        <td colspan="4">Name of the employee in full</td>
        <td colspan="4">{{$d->Name}}</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">2</td>
        <td colspan="4">Sex</td>
        <td colspan="4">{{$d->Gender}}</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">3</td>
        <td colspan="4">Religion</td>
        <td colspan="4">{{$d->Religion}}</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">4</td>
        <td colspan="4">Whether unmarried/married/widow/widower</td>
        <td colspan="4">{{$d->Status}}</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">5</td>
        <td colspan="4">Department Branch/Section where employed</td>
        <td colspan="4">{{$d->Designation}}</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">6</td>
        <td colspan="4">Post held with Ticket No. Serial No. if any</td>
        <td colspan="4"></td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">7</td>
        <td colspan="4">Date of appointment</td>
        <td colspan="4">{{$d->DOJ}}</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">8</td>
        <td colspan="4">Permanent address</td>
        <td colspan="4" rowspan="2">{{$d->per_streetAddress}}</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="1">Place</td>
        <td colspan="4"></td>
        <td colspan="4">X</td>
    </tr>
    <tr>
        <td colspan="1">Date</td>
        <td colspan="1"></td>
        <td colspan=""></td>
        <td colspan="4">Signature/Thumb Impression of the employee</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="9">Declaration by witnesses</td>
    </tr>

    <tr>
        <td colspan="1"></td>
        <td colspan="4">Nomination signed/Thumb impressed before me</td>
        <td colspan="4">Name in full and full address of witnesses :</td>
    </tr>
    @php
    $name=json_decode($d->Witness);
    @endphp
    @for($i=0 ; $i < 2 ; $i++)
    <tr>
        <td colspan="1"></td>
        <td colspan="4"></td>
        <td colspan="1">{{$i+1}}x</td>
        <td colspan="3">{{$name[$i]}}</td>
    </tr>
    @endfor
    <tr>
        <td colspan="1">Place</td>
        <td colspan="4"></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="1">Date</td>
        <td colspan="1"></td>
        <td colspan=""></td>
        <td colspan="4">Signature of witnesses</td>
    </tr>
    <tr>
        <td colspan="9">Certificate by the employer</td>
    </tr>
    <tr>
        <td colspan="9" rowspan="2">Certified that the particulars of the above nomination have been verified and recorded in this establishment</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="3"></td>
        <td colspan="4">X</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="4">Employer’s reference No, if any</td>
        <td colspan="4">Signature of the employer/Officer authorized</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="4"></td>
        <td colspan="4">Designation</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="4"></td>
        <td colspan="4" rowspan="3"></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="4"></td>
        <td colspan="4" >Name address of the establishment</td>
    </tr>


    <tr>
        <td colspan="1">Date</td>
        <td colspan="1"></td>
        <td colspan="3"></td>
        <td colspan="4">or rubber stamp there of</td>
    </tr>
    <tr>
        <td colspan="9">Acknowledgment by the employee</td>
    </tr>
    <tr>
        <td colspan="9" rowspan="2">Received the duplicate of the nomination in Form ‘F’ Filled by me and duly certified by the employer.</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="1">Date</td>
        <td colspan="1"></td>
        <td colspan="3"></td>
        <td colspan="4">XX</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="4">Note: Strike out words/paragraph not applicable</td>
        <td colspan="1"></td>
        <td colspan="3" >Signature of the employee</td>
    </tr>
    </tbody>
</table>
    @endforeach