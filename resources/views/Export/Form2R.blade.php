@php
    libxml_use_internal_errors(true);
@endphp
@foreach($declaration as $d)
<table >
    <tr>
        <td colspan="8">
            FORM 2 (Revised)
        </td>
        <td colspan="1">1</td>
    </tr>
    <tr>
    </tr>
    <tr >
        <td colspan="9">
            NOMINATION AND DECLARATION FORM FOR UNEXEMPTED/ EXEMPTED ESTABLISHMENTS
        </td>
    </tr>
    <tr >
        <td colspan="9">
            Declaration and Nomination Form under the Employees’ Provident Funds and Employees’ Pension Scheme
        </td>
    </tr>
    <tr >
        <td colspan="9">
            (Paragraphs 33 & 61 (1) of the Employees Provident Fund Scheme, 1952 and Paragraph 18 of the Employees’ Pension scheme, 1995)
        </td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td colspan="1">1</td>
        <td colspan="2">Name (in Block letters)</td>
        <td colspan="2">{{$d->Name}}</td>
        <td colspan="1"></td>
        <td colspan="1">4</td>
        <td colspan="1">Sex</td>
        <td colspan="1">{{$d->Gender}}</td>
    </tr>
    <tr>
        <td colspan="1">2</td>
        <td colspan="2">Father’s/Husband’s Name</td>
        <td colspan="2">{{$d->fatherName}}</td>
        <td colspan="1"></td>
        <td colspan="1">5</td>
        <td colspan="1">Matital Status</td>
        <td colspan="1">{{$d->Status}}</td>
    </tr>
    <tr>
        <td colspan="1">3</td>
        <td colspan="2">Date of Birth</td>
        <td colspan="2">{{$d->DOB}}</td>
        <td colspan="1"></td>
        <td colspan="1">6</td>
        <td colspan="1">Account No.</td>
        <td colspan="1">{{$d->accountNumber}}</td>
    </tr>
    <tr>
        <td colspan="1">7</td>
        <td colspan="1">Address</td>
        <td colspan="3">Permanent</td>
        <td colspan="1"></td>
        <td colspan="1">Temporary</td>
        <td colspan="3"></td>
    </tr>

    <tr>
        <td colspan="1"></td>
        <td colspan="4" rowspan="2">{{$d->per_streetAddress}}</td>
        <td colspan="1"></td>
        <td colspan="3" rowspan="2">{{$d->streetAddress}}</td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td colspan="9">
            PART – A (EPF)
        </td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="9" rowspan="2">
            I hereby nominate the person(s) /cancel the nomination made by me previously and nominate the person(s) mentioned below to receive the amount standing to my credit in the Employees’ Provident Fund in the event of my death  :
        </td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td colspan="1" rowspan="2">Name of Nominee / Nominees</td>
        <td colspan="2" rowspan="2">Address</td>
        <td colspan="1" rowspan="2">Nominee’s relationship with the member</td>
        <td colspan="1" rowspan="2">Date of Birth</td>
        <td colspan="2" rowspan="2">Total amount of share of Accumulations in Provident Fund to be paid to each nominee</td>
        <td colspan="2" rowspan="2">If the nominee is a minor, name & relationship & address of the guardian who may receive the amount during the minority of nominee</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">1</td>
        <td colspan="2">2</td>
        <td colspan="1">3</td>
        <td colspan="1">4</td>
        <td colspan="2">5</td>
        <td colspan="2">6</td>
    </tr>
    @php
        $family_firstName=json_decode($d->family_firstName);
        $family_Relation=json_decode($d->family_Relation);
        $family_presentAddress=json_decode($d->family_presentAddress);
        $family_DOB=json_decode($d->family_DOB);
    @endphp
    @for($i=0 ; $i < 1 ; $i++)
    <tr>
        <td colspan="1">{{$family_firstName[$i]}}</td>
        <td colspan="2">{{$family_presentAddress[$i]}}</td>
        <td colspan="1">{{$family_Relation[$i]}}</td>
        <td colspan="1">{{$family_DOB[$i]}}</td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    @endfor
    <tr>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="1"></td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="1"></td>
        <td colspan="1"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="9">
            1      * Certified that I have no family as defined in para 2(g) of the Employees’ Provident Fund Scheme, 1952 and should I acquire a Family hereafter, the above nomination should be deemed as cancelled.
        </td>
    </tr>
    <tr>
        <td colspan="9">
            2      * Certified that my father/mother is/are dependent upon me.
        </td>
    </tr>
    <tr>
        <td colspan="5"></td>
        <td colspan="2">X</td>
    </tr>
    <tr>
        <td colspan="4">*Strike out whichever is not applicable.</td>
        <td colspan="2"></td>
        <td colspan="3">Signature or thumb impression of the subscriber</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="9">Part B (EPS) (Para 18)</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="9" rowspan="2">I hereby furnish below particulars of the members of my family who would be eligible to receive widow/children pension in the event of my death.</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="1">Sr. No.</td>
        <td colspan="2">Name of the family member</td>
        <td colspan="3">Address</td>
        <td colspan="1">Date of Birth</td>
        <td colspan="2">Relationship with the member</td>
    </tr>
    <tr>
        <td colspan="1">1</td>
        <td colspan="2">2</td>
        <td colspan="3">3</td>
        <td colspan="1">4</td>
        <td colspan="2">5</td>
    </tr>
    @for($i=0 ; $i < 1 ; $i++)
    <tr>
        <td colspan="1" rowspan="2">1</td>
        <td colspan="2" rowspan="2">{{$family_firstName[$i]}}</td>
        <td colspan="3" rowspan="2">{{$family_presentAddress[$i]}}</td>
        <td colspan="1" rowspan="2">{{$family_DOB[$i]}}</td>
        <td colspan="2" rowspan="2">{{$family_Relation[$i]}}</td>
    </tr>
    <tr></tr>
    @endfor
    <tr>
        <td colspan="1" rowspan="2">2</td>
        <td colspan="2" rowspan="2"></td>
        <td colspan="3" rowspan="2"></td>
        <td colspan="1" rowspan="2"></td>
        <td colspan="2" rowspan="2"></td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="9" rowspan="2">** Certified that I have no family, as defined in para 2(vii) of Employees’ Pension Scheme, 1995 and should I acquire a family Here after I shall furnish particulars thereon in the above form.</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="9" rowspan="2">I hereby nominate the following person for receiving the monthly widow pension (admissible under para 16 2(a)(i) and (ii) in the event of my death without leaving  any eligible family member for receiving Pension.</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="6">Name and Address of the Nominee</td>
        <td colspan="1">Date of Birth</td>
        <td colspan="2">Relationship with the member</td>
    </tr>
    <tr>
        <td colspan="6">1</td>
        <td colspan="1">2</td>
        <td colspan="2">3</td>
    </tr>
    <tr>
        <td colspan="1" rowspan="2">1</td>
        <td colspan="5" rowspan="2"></td>
        <td colspan="1" rowspan="2"></td>
        <td colspan="2" rowspan="2"></td>
    </tr>
    <tr></tr>

    <tr>
        <td colspan="1" rowspan="2">2</td>
        <td colspan="5" rowspan="2"></td>
        <td colspan="1" rowspan="2"></td>
        <td colspan="2" rowspan="2"></td>
    </tr>
    <tr></tr>

    <tr>
        <td colspan="2" >Date</td>
    </tr>
    <tr>
        <td colspan="2" >Place</td>
        <td colspan="4"></td>
        <td colspan="1">X</td>
    </tr>
    <tr>
        <td colspan="4">**Strike out whichever is not applicable.</td>
        <td colspan="1"></td>
        <td colspan="4">Signature or thumb impression of the subscriber</td>
    </tr>
    <tr>

    </tr>
    <tr>
        <td colspan="9">CERTIFICATE BY EMPLOYER</td>
    </tr>
    <tr>
        <td colspan="9" rowspan="2">Certified that the above declaration and nomination has been signed/thumb impressed before me by Shri/Smt./Kum. </td>
    </tr>

    <tr>

    </tr>
    <tr>
        <td colspan="2" > </td>
        <td colspan="7" >employed in my establishment after he/she has read the entries/entries have been </td>
    </tr>
    <tr>
        <td colspan="6" > read over to him/her by me and got confirmed by him/her.</td>
    </tr>
    <tr>
        <td colspan="2" >Place</td>

    </tr>
    <tr>
        <td colspan="2" >Date</td>
        <td colspan="4"></td>
        <td colspan="1">XX</td>
    </tr>
    <tr>
        <td colspan="5" ></td>
        <td colspan="4" >Signature of the employer or other</td>
    </tr>
     <tr>
            <td colspan="5" >{{$d->companyName.' '.$d->Address}}</td>
            <td colspan="4" >Authoried Officers of the Establishment.</td>
     </tr>
    <tr>
            <td colspan="5" >Name & Address of the Factory/</td>
     </tr>
    <tr>
            <td colspan="2" >Establishment or Rubber Stamp Thereon</td>
            <td colspan="3" ></td>
            <td colspan="4" >Designation</td>
     </tr>

</table>
    @endforeach