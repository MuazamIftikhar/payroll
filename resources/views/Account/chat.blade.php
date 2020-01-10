<h1 style="align-items: center;">Pick and Drop Booking</h1>
<table>
    <thead>
    <tr>
        <th style="font-size: 12px; font-weight: bold;">Name</th>
        <th style="font-size: 12px; font-weight: bold;">Staff</th>
        <th style="font-size: 12px; font-weight: bold;">Pick</th>
        <th style="font-size: 12px; font-weight: bold;">Drop</th>
        <th style="font-size: 12px; font-weight: bold;">Date</th>
        <th style="font-size: 12px; font-weight: bold;">Program</th>
        <th style="font-size: 12px; font-weight: bold;">Pax</th>
        <th style="font-size: 12px; font-weight: bold;">Detail</th>
        <th style="font-size: 12px; font-weight: bold;">Note</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $b)
        <tr>
            <td>{{$b->Name}}</td>
            <td>{{$b->Staff}}</td>
            <td>{{$b->Pick}}</td>
            <td>{{$b->Drop}}</td>
            <td>{{$b->Date}}</td>
            <td>{{$b->Program}}</td>
            <td>{{$b->Pax}}</td>
            <td>{{$b->Detail}}</td>
            <td>{{$b->Note}}</td>
        </tr>
    @endforeach
    </tbody>
</table>






