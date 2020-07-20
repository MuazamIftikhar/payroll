@php
    libxml_use_internal_errors(true);
@endphp
@foreach($declaration as $d)
<table>
    <tbody>
    <tr>
        <td colspan="4"></td>
        <td colspan="4">New Form 11- Declaration Form</td>
        <td colspan="1">1</td>
    </tr>
    <tr>
        <td colspan="4"></td>
        <td colspan="5">(To be retained by the Employer for future reference)</td>
    </tr>
    <tr>
        <td colspan="5">{{$d->companyName}}</td>
        <td colspan="1">Emp Code</td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td colspan="5" rowspan="2">THE EMPLOYEES’ PROVIDENT FUNDS SCHEME, 1952 (Paragraph-34 & 57)  & THE EMPLOYEES’ PENSION SCHEME, 1995 (Paragraph 24)</td>
        <td colspan="1" rowspan="2">Company</td>
        <td colspan="3" rowspan="2">{{$d->Address}}</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="9">(Declaration by a person taking up employment in an any establishment on which EPF scheme 1952 & / OR EPS 1955 is applicable)</td>
    </tr>

    <tr>
        <td colspan="1">01</td>
        <td colspan="4">Name of the member</td>
        <td colspan="4">{{$d->Name}}
        </td>
    </tr>
    <tr>
        <td colspan="1">02</td>
        <td colspan="4">"Father’s Name (   ) Spouse’s Name (  ) <br>(Please Tick Whichever Is Applicable)"
        </td>
        <td colspan="4">{{$d->fatherName}}
        </td>
    </tr>
    <tr>
        <td colspan="1">03</td>
        <td colspan="4">Date of Birth (DD/MM/YYYY)</td>
        <td colspan="4">{{$d->DOB}}
        </td>
    </tr>
    <tr>
        <td colspan="1">04</td>
        <td colspan="4">Gender: ( male / Female /Transgender )
        </td>
        <td colspan="4">{{$d->Gender}}
        </td>
    </tr>
    <tr>
        <td colspan="1">05</td>
        <td colspan="4">Marital Status (married /Unmarried /widow/divorce)
        </td>
        <td colspan="4">{{$d->Status}}
        </td>
    </tr>
    <tr>
        <td colspan="1">06</td>
        <td colspan="4">(a)Email ID:
        </td>
        <td colspan="4">{{$d->Email}}
        </td>
    </tr>
    <tr>
        <td colspan="1">07*</td>
        <td colspan="4">Whether earlier a member of Employees ‘provident Fund Scheme 1952
        </td>
        <td colspan="4">
        </td>
    </tr>
    <tr>
        <td colspan="1">08*</td>
        <td colspan="4">Whether earlier a member of Employees ‘Pension Scheme ,1995
        </td>
        <td colspan="4">
        </td>
    </tr>
    <tr>
        <td colspan="1" rowspan="7">09</td>
        <td colspan="8" >If response to any or both of (7) & (8) above is yes. MANDATORY FILL UP THE (COLUMN 9)</td>
    </tr>

    <tr>
        <td colspan="4" >Universal Account Number(UAN)</td>
        <td colspan="4" ></td>
    </tr>
    <tr>
        <td colspan="1" rowspan="2" >Universal Account Number(UAN)</td>
        <td colspan="1" >AP</td>
        <td colspan="1" >HYD</td>
        <td colspan="1" >EST.CODE</td>
        <td colspan="1" >EXTN</td>
        <td colspan="1" >PF NO.</td>
        <td colspan="2" ></td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="4" >c)    Date of exit from previous employment (DD/MM/YYY)</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="4" >d)   Scheme Certificate No (if Issued )</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="4" >e)    Pension Payment Order (PPO)No (if Issued)</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="1" rowspan="4">10</td>
        <td colspan="4" > a)    International Worker:</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="4" > b)   If Yes , State Country Of Origin (India /Name of Other Country)</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="4" > c)    Passport No</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="4" > c)    Passport No</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="1" rowspan="4">10</td>
        <td colspan="8" >KYC Details: (attach Self attested copies of following KYCs) **</td>
    </tr>
    <tr>
        <td colspan="4" >a)    Bank Account No .& IFS code</td>
        <td colspan="4" >{{$d->accountNumber}}</td>
    </tr>
    <tr>
        <td colspan="4" >b)   AADHAR Number (12 Digit)</td>
        <td colspan="4" >{{$d->adharNumber}}</td>
    </tr>
    <tr>
        <td colspan="4" >c)    Permanent Account Number (PAN),If available</td>
        <td colspan="4" >{{$d->panNumber}}</td>
    </tr>
    <tr></tr>
    <tr><td colspan="9">UNDERTAKING</td></tr>
    <tr><td colspan="9">1) Certified that the Particulars are true to the best of my Knowledge</td></tr>
    <tr><td colspan="9">2) I authorize EPFO to use my Aadhar for verification / e KYC purpose for service delivery</td></tr>
    <tr><td colspan="9" rowspan="2">3) Kindly transfer the funds and service details, if applicable if applicable, from the previous PF account as declared above to the present P.F Account(The Transfer Would be possible only if the identified KYC details approved by previous employer has been verified by present employer</td></tr>
   <tr></tr>
    <tr><td colspan="9">4) In case of changes In above details the same Will be intimate to employer at the earliest</td></tr>
    <tr>
        <td colspan="1">Date</td>
        <td colspan="2"></td>
        <td colspan="3"></td>
        <td colspan="1">X</td>
    </tr>
    <tr>
        <td colspan="1">Place</td>
        <td colspan="2"></td>
        <td colspan="3"></td>
        <td colspan="3">Signature of Member</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="9">DECLARATION BY PRESENT EMPLOYER</td>
    </tr>
    <tr>
        <td colspan="2">A) The member Mr./Ms./Mrs</td>
        <td colspan="1">{{$d->Name}}</td>
        <td colspan="2">has joined on</td>
        <td colspan="1">{{$d->DOJ}}</td>
        <td colspan="2">and has been allotted PF Number</td>
        <td colspan="1"></td>
    </tr>
    <tr>
        <td colspan="9">B) In case person was earlier not a member of EPF Scheme ,1952 and EPS,1995</td>
    </tr>
    <tr>
        <td colspan="9"> (Post allotment of UAN ) The UAN Allotted for the member is  …………..</td>
    </tr>
    <tr>
        <td colspan="9"> Please tick the Appropriate Option:</td>
    </tr>
    <tr>
        <td colspan="9"> The KYC details of the above member in the UAN database</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="8">&#29; Have not been uploaded</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="8">&#29; Have been uploaded but not approved</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="8">&#29; Have been uploaded and approved with DSC</td>
    </tr>
    <tr>
        <td colspan="8">C) In case the person was earlier a member of EPF Scheme ,1952 and EPS, 1995:</td>
    </tr>
    <tr>
        <td colspan="9">&#29; The above PF account number /UAN of the member as mentioned in (a) above has been tagged with his /her UAN/previous member ID as declared by member</td>
    </tr>
    <tr>
        <td colspan="9">&#29; Please Tick the Appropriate Option</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="8">&#29; The KYC details of the above member in the UAN database have been approved with digital signature Certificate and transfer request has been generated on portal.</td>
    </tr>
    <tr>
        <td colspan="1"></td>
        <td colspan="8"> <tr>
    </tr>
    <tr>

        <td colspan="1" rowspan="2"></td>
        <td colspan="8" rowspan="2">&#29; The KYC details of the above member in the UAN database have been approved with digital signature Certificate and transfer request has been generated on portal.</td>
    </tr>
    <tr></tr>
    <tr>
        <td colspan="5" ></td>
        <td colspan="1" >XX</td>
    </tr>
    <tr>
        <td colspan="1" >Date</td>
        <td colspan="3" ></td>
        <td colspan="5" >Signature of Employer With seal of Establishment</td>
    </tr>
    </tbody>
</table>
@endforeach
