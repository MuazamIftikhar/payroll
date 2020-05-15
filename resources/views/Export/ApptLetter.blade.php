@php
    libxml_use_internal_errors(true);
@endphp
@foreach($declaration as $d)
<table>
    <tbody>
    <tr>
        <td colspan="5">PAViTRA Enterprises</td>
        <td colspan="3"></td>
        <td colspan="1">1</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="9">Office:- 204-Heena Avenue, Near Heena Arcade, GIDC Char Rasta, Vapi, Gujarat, Pin-396195</td>
    </tr>
    <tr>
        <td colspan="1">To</td>
        <td colspan="5"></td>
        <td colspan="1">Date</td>
        <td colspan="2">Date</td>
    </tr>
    <tr>
        <td colspan="3">{{$d->Name}}</td>
    </tr>
    <tr>
        <td colspan="3" rowspan="2">{{$d->streetAddress}}</td>
    </tr>
    <tr>
    </tr>
    <tr>
    </tr>
    <tr>
        <td colspan="9">SUB - CONTRACT LETTER</td>
    </tr>
    <tr>

    </tr>
<tr>
        <td colspan="9">This has reference to the recent interview you had with us. we are pleased to appoint you as</td>
    </tr>
    <tr>
        <td colspan="2">{{$d->Designation}}</td>
        <td colspan="2">on contract wef </td>
        <td colspan="2">{{$d->DOJ}}</td>
        <td colspan="3">on the following terms and conditions.</td>
    </tr>
    <tr>
        <td colspan="1">1</td>
        <td colspan="8" rowspan="1">You will be paid wages as per the minimum wages act which is applicable to our  site DHL Jhagadia</td>
    </tr>
    <tr>
        <td colspan="1">2</td>
        <td colspan="8" rowspan="2">You will be covered under W.C., PF Act. You will also be entitled for annual leave & Bonus as per the respective Acts.</td>
    </tr>
    <tr></tr>
    <tr><td colspan="1">3</td>
        <td colspan="3">You will be on a Contract period for the period form</td>
        <td colspan="2">{{$d->DOJ}}</td>
        <td colspan="1">to</td>
        <td colspan="2">{{$d->DOE}}</td>
    </tr>
    <tr>
        <td colspan="1">4</td>
        <td colspan="8" rowspan="2">You will perform duties as per instruction of our superiors from time to time. There are no  fixed duties as such and you will be bound to do all such duties that may be assigned you.</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">5</td>
        <td colspan="8" rowspan="2">At present you are posted at the premises of DHL Supply Chain India Pvt Ltd. Jhagadia. Your  services can be transferred as an when required to the other sites across any of the location  operating in india. You will be bound to observe rules and regulations of the company where ever you are posted.</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">6</td>
        <td colspan="8" rowspan="2">If you are by any reason, like completion or termination of contract, cannot be provided work till you are posted in other  Company on contract. you will not be entitled to any wages or compensation during that period.</td>   </tr>
    <tr></tr>
    <tr>
        <td colspan="1">7</td>
        <td colspan="8">Any type of misbehavior on site will result in immediate termination of the job.  </tr>
     <tr>
        <td colspan="1">8</td>
     <td colspan="8" rowspan="5">Your employment will automatically get over as soon as our contract period with the company is either completed or terminated earlier. When the contract period is over or terminated you shall report to our office, for further instructions, if any. The renewal of the contract would depend on the renewal of the annual service contract with the client of the said location.</td>
     </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="1">9</td>
     <td colspan="8" rowspan="2">If the above said terms and conditions are acceptable to you. Please sign the duplicate copy of this letter having accepted the same.</td>
     </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="9">We welcome you to join & wish you every success in your present assignment</td>
    </tr>
    <tr>
        <td colspan="2">Thanking You</td>
    </tr>
    <tr>
        <td colspan="2">Yours Tuly</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="2">For, PAViTRA Enterpries</td>
    </tr>
    <tr>

    </tr>
    <tr>

    </tr>
    <tr>
    <td colspan="3">Authorised Signatory</td>
    </tr>
    <tr>

    </tr>
    <tr>

    </tr>
    <tr>
        <td colspan="5"></td>
        <td colspan="4">X</td>

    </tr>

    <tr>
        <td colspan="2">Accepted By</td>
        <td colspan="2">Name</td>
        <td colspan="2"></td>
        <td colspan="3"></td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="2">Date</td>
        <td colspan="5"></td>
        <td colspan="2">Signature</td>
    </tr>
</table>
    @endforeach