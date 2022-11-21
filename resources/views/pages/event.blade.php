@extends('layouts.app')

@section('content')

<div class="container" id="event-content">

    <img src="{{$event -> photos[0]->path}}" style="border-radius: 5%; height:45rem;">
    <div class="wrapper-res">
        <div id="event-name"> {{$event->name}} </div>
        <div id="event-date"> {{date('Y-m-d', strtotime($event->date))}} </div>
    </div>
    <button class="btn btn-info"> <a> <i class="fa fa-layer-group fa-fw"></i>
            BUY TICKETS </a></button>

    <nav>
        <ul id="menu-info">
            <li class="menu-info-item text-center">
                <div> Location </div>
                <p> {{$event->city->country->name}}, {{$event->city->name}} </p>
            </li>
            <li class="menu-info-item text-center">
                <div> Capacity </div>
                <p> {{$event->capacity}} places </p>
            </li>
            <li class="menu-info-item text-center">
                <div> Address </div>
                <p> {{$event->address}} </p>
            </li>
        </ul>
    </nav>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</div>

<div class="navigation">
    <ul>
        <li class="list active">
            <a href="#">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title" onclick="showUserDiv()">Event Host</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                </span>
                <span class="title" onclick="showOutroDiv()">Attendees</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon">
                    <ion-icon name="call-outline"></ion-icon>
                </span>
                <span class="title">Contact</span>
            </a>
        </li>

    </ul>


</div>

<div id="info-navbar-container">

    <div id="userDiv" style="display:none;" class="answer_list"> WELCOME
        <button id="close-modal-button"></button>
    </div>
    <div id="outroDiv" style="display:none;" class="answer_list">

        <input type="text" class="form-controller" id="search-users" name="search"></input>
        <table class="table table-bordered table-hover" style="margin-top:1rem;">
            <thead>
                <tr>
                    <th>UserName</th>
                    <th>Email</th>
                    <th>ACTION </th>
                </tr>
            </thead>
            <tbody id="table-user-res">
            </tbody>
        </table>
        <button id="close-modal-button"></button>
    </div>

</div>

<script type="text/javascript" defer>
    $('#search-users').on('keyup', function() {
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{URL::to('
            searchUsers ')}}',
            data: {
                'search': $value,
                'event_id': '{{$event->eventid}}'
            },
            success: function(data) {
                $('#table-user-res').html(data);
            }
        });
    })
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'csrftoken': '{{ csrf_token() }}'
        }
    });
</script>

<script type="text/javascript">
    const list = document.querySelectorAll('.list')

    function activeLink() {
        list.forEach((item) => item.classList.remove('active'))
        this.classList.add('active')
    }

    list.forEach((item) => item.addEventListener('click', activeLink))

    function showUserDiv() {
        document.getElementById("info-navbar-container").querySelectorAll('div').forEach(n => n.style.display = 'none');
        document.getElementById('userDiv').style.display = "block";
    }

    function showOutroDiv() {
        document.getElementById("info-navbar-container").querySelectorAll('div').forEach(n => n.style.display = 'none');
        document.getElementById('outroDiv').style.display = "block";
    }

    document.querySelector('#outroDiv > button').addEventListener('click', function() {
        document.getElementById('outroDiv').style.display = "none";
    })
</script>

@endsection