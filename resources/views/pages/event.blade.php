@extends('layouts.app')


@section('content')

<div class="container" id="event-content">


    <img src="{{$event -> photos[0]->path}}" style="border-radius: 5%; height:45rem;">
    <div class="wrapper-res">
        <div id="event-name"> {{$event->name}} </div>
        <div id="event-date"> {{date('Y-m-d', strtotime($event->date))}} </div>
    </div>

    @if (Auth::user() != NULL && !Auth::user()->attendingEvents->contains($event->eventid))

    <button onclick="ajax_selfAddUser({{Auth::user()->userid}}, {{$event->eventid}})" class="btn btn-info"> <a> <i class="fa fa-layer-group fa-fw"></i>
            Enroll Event </a></button>
    @else
    @if ((Auth::user() != NULL))
    <button onclick="ajax_selfRemoveUser({{Auth::user()->userid}}, {{$event->eventid}})" class="btn btn-danger"> <a> <i class="fa fa-layer-group fa-fw"></i>
            Leave Event </a></button>
    @endif
    @endif

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

        @if (Auth::user() != NULL &&Auth::user()->userid == $host->userid)
        <li class="list">
            <a href="#">
                <span class="icon">
                    <ion-icon name="person-outline"></ion-icon>
                </span>
                <span class="title" onclick="showOutroDiv()">Attendees</span>
            </a>
        </li>
        @endif

        <li class="list">
            <a href="#">
                <span class="icon">
                    <ion-icon name="call-outline"></ion-icon>
                </span>
                <span class="title">Contact</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon">
                    <ion-icon name="mail-outline"></ion-icon>
                </span>
                <span class="title" onclick="showInviteDiv()">Send Invite</span>
            </a>
        </li>

    </ul>


</div>

<div id="info-navbar-container">

    <div id="userDiv" style="display:none; text-align:center;" class="answer_list">
        <button id="close-modal-button"></button>
        <div class="svg-background"></div>
        <div class="svg-background2"></div>
        <div class="circle"></div>

        <img class="profile-img" src="{{$host->profilepic}}">
        <div class="text-container">
            <p class="title-text"> {{$host->name}}</p>
            <p class="info-text">Event Host</p>
            <p class="desc-text"> {{count($host->hostedEvents)}} events hosted </p>
        </div>

    </div>

    @if (Auth::user() != NULL && Auth::user()->userid == $host->userid)
    <div id="outroDiv" data-mdb-animation="slide-in-right" style="display:none;" class="answer_list">

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
    @endif

    <div id="inviteDiv" data-mdb-animation="slide-in-right" style="display:none; text-align:center; width: 500px; height: 500px;" class="answer_list">
     Please enter the email of the user you wish to invite
        <!--@csrf-->
        <button class="skrr" id="close-modal-button"></button>
        <input type="text" class="form-controller" id="sendInvite" name="email"></input>
        <button href="#" class="btn btn-success btn-sm btn-edit-event" type="submit" onClick="createInvite({{$event->eventid}})">Send Invite</button>
        
    </div>

</div>

<!-- ////////////////////////////////// END OF AJAX REQUESTS ////////////////////////////////////// -->

<script type="text/javascript">
    function ajax_selfAddUser(userid, eventid) {
        fetch("{{route('selfAddUser')}}", {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": '{{ csrf_token() }}'
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                userid: userid,
                eventid: eventid
            })
        }).then(function(data) {
            document.location.reload();
        }).catch(function(error) {
            console.log(error);
        });
    };

    function ajax_selfRemoveUser(userid, eventid) {
        fetch("selfRemoveUser", {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": '{{ csrf_token() }}'
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                userid: userid,
                eventid: eventid
            })
        }).then(function(data) {
            document.location.reload();
        }).catch(function(error) {
            console.log(error);
        });
    };


    function ajax_addUser(userid, eventid) {
        fetch("addEventUsers", {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": '{{ csrf_token() }}'
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                userid: userid,
                eventid: eventid
            })
        }).then(function(data) {
            refreshDiv();
        }).catch(function(error) {
            console.log(error);
        });
    };

    function ajax_remUser(userid, eventid) {
        fetch("removeEventUsers", {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": '{{ csrf_token() }}'
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                userid: userid,
                eventid: eventid
            })
        }).then(function(data) {
            refreshDiv();
        }).catch(function(error) {
            console.log(error);
        });
    };
</script>

<!-- ONLY AVAILABLE FOR HOST -->
@if (Auth::user() != NULL && Auth::user()->userid == $host->userid)
<script type="text/javascript">
    document.getElementById("search-users").addEventListener("keyup", function(e) {
        fetch("searchUsers", {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": '{{ csrf_token() }}'
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                search: e.target.value,
                event_id: '{{$event->eventid}}'
            })
        }).then(function(data) {
            return data.text();
        }).then(function(data) {
            document.getElementById("table-user-res").innerHTML = data;
        }).catch(function(error) {
            console.log(error);
        });
    });

    document.querySelector('#outroDiv > button').addEventListener('click', function() {
        let d = document.getElementById('outroDiv');
        d.classList.add("animate-out");
        setTimeout(function() {
            d.classList.remove("animate-out");
        }, 500);
        setTimeout(function() {
            d.style.display = "none";
        }, 450);
    })
</script>
@endif

<script type="text/javascript">
    function refreshDiv() {
        fetch("searchUsers", {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": '{{ csrf_token() }}'
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                search: document.getElementById("search-users").value,
                event_id: '{{$event->eventid}}'
            })
        }).then(function(data) {
            return data.text();
        }).then(function(data) {
            document.getElementById("table-user-res").innerHTML = data;
        }).catch(function(error) {
            console.log(error);
        });
    };

    //////////////////////////////// END OF AJAX REQUESTS //////////////////////////////////////

    const list = document.querySelectorAll('.list')

    function activeLink() {
        list.forEach((item) => item.classList.remove('active'))
        this.classList.add('active')
    }

    list.forEach((item) => item.addEventListener('click', activeLink))

    function showUserDiv() {
        document.getElementById("info-navbar-container").querySelectorAll('#info-navbar-container > div').forEach(n => n.style.display = 'none');
        let d = document.getElementById('userDiv');
        d.classList.add("animate");
        setTimeout(function() {
            d.classList.remove("animate");
        }, 500);
        d.style.display = "block";
    }

    function showOutroDiv() {
        document.getElementById("info-navbar-container").querySelectorAll('#info-navbar-container > div').forEach(n => n.style.display = 'none');
        let d = document.getElementById('outroDiv');
        d.classList.add("animate");
        setTimeout(function() {
            d.classList.remove("animate");
        }, 500);
        d.style.display = "block";
    }

    function showInviteDiv() {
        document.getElementById("info-navbar-container").querySelectorAll('#info-navbar-container > div').forEach(n => n.style.display = 'none');
        let d = document.getElementById('inviteDiv');
        d.classList.add("animate");
        setTimeout(function() {
            d.classList.remove("animate");
        }, 500);
        d.style.display = "block";
    }

    document.querySelector('#userDiv > button').addEventListener('click', function() {

        let d = document.getElementById('userDiv');
        d.classList.add("animate-out");
        setTimeout(function() {
            d.classList.remove("animate-out");
        }, 500);
        setTimeout(function() {
            d.style.display = "none";
        }, 500);
    })
    
    document.querySelector('#inviteDiv > .skrr').addEventListener('click', function() {
        let d = document.getElementById('inviteDiv');
        d.classList.add("animate-out");
        setTimeout(function() {
            d.classList.remove("animate-out");
        }, 500);
        setTimeout(function() {
            d.style.display = "none";
        }, 500);
    })


</script>

@endsection