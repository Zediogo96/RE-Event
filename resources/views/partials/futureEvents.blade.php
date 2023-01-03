<thead>
    <tr>
        <th>Date</th>
        <th>Name</th>
        <th>City</th>
        <th></th>

    </tr>

</thead>

<tr>
    <td>
        <div class="event-date">
            <div class="event-day"> {{substr($event->date, 8, 2)}}</div>
            <div class="event-month"> {{substr(date('F', mktime(0, 0, 0, substr($event->date, 5,2), 10)), 0, 3);}}</div>
        </div>
    </td>
    <td>
        {{$event->name}}
    </td>
    <td class="event-venue hidden-xs"><i class="icon-map-marker"></i> {{$event->city->name}}</td>
    <td><button href="#" class="btn btn-danger btn-sm btn-edit-event">Leave Event</button></td>
</tr>