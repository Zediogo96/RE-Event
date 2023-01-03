<thead>
    <tr>
        <th>Date</th>
        <th>Name of Event</th>
        <th>Email of invited person</th>
        <th>Invite Status</th>
    </tr>

</thead>

<tr>
    <td>
        <div class="event-date">
            <div class="event-day">{{ intval(date("d", strtotime($invite->date))) }}</div>
            <div class="event-month">{{ strtoupper(date("M", strtotime($invite->date))) }}</div>
        </div>
    </td>
    <td>
    {{ $invite->name }}
    </td>
    <td class="event-venue hidden-xs"><i class="icon-map-marker"></i>  {{ $invite->email }}</td>

    <td>
    @if ($invite->status) 
        Invite Accepted     
    @else 
        Invite Pending 
    @endif
    </td>
</tr>