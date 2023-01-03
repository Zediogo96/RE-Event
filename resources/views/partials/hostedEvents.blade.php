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
    <td> {{$event->isprivate ? ('Private'): ('Public')}}</td>
    <td><button href=" #" class="btn btn-warning btn-sm btn-edit-event" data-toggle="modal" data-target="#editModal{{$event->eventid}}" value="{{$event->eventid}}">Edit Event</button></td>
</tr>