
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
    <td class="event-venue hidden-xs"><i class="icon-map-marker"></i>  {{ $invite->cityName }}</td>


    <td>
        <button href="#" class="btn btn-success btn-sm"><img src="icons/check.svg" alt="check-icon"><p>Accept Invite</p></button>
        <button href="#" class="btn btn-danger btn-sm"><img src="icons/reject.svg" alt="reject-icon"><p>Reject Invite</p></button>
    </td>
</tr>
