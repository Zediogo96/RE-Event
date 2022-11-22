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

    <div id="userDiv" style="display:none; text-align:center;" class="answer_list"> TO DO: EVENT HOST CARD
        <button id="close-modal-button"></button>
    </div>
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

</div>

<!-- ////////////////////////////////// END OF AJAX REQUESTS ////////////////////////////////////// -->

<script type="text/javascript">
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
        document.getElementById("info-navbar-container").querySelectorAll('div').forEach(n => n.style.display = 'none');
        document.getElementById('userDiv').style.display = "block";
    }

    function showOutroDiv() {
        document.getElementById("info-navbar-container").querySelectorAll('div').forEach(n => n.style.display = 'none');
        let d = document.getElementById('outroDiv');
        d.classList.add("animate");
        setTimeout(function() {
            d.classList.remove("animate");
        }, 500);
        d.style.display = "block";
    }

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

    document.querySelector('#userDiv > button').addEventListener('click', function() {
        let d = document.getElementById('userDiv');
        d.style.display = "none";
    })
</script>

@endsection