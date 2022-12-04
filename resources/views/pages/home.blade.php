@extends('layouts.app')

@section('content')



<div class="container" style="margin-top: 40px">
    <!-- CAROUSEL SLIDER -->
    <div id="carouselSlider" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#carouselSlider" data-slide-to="0" class="active"></li>
            <li data-target="#carouselSlider" data-slide-to="1"></li>
            <li data-target="#carouselSlider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{$events[0] -> photos[0]->path}}" class="w-100 h-200 ">
                <div class="carousel-caption ">
                    <input type="hidden" name="event-date" value="{{$events[0]->date}}">
                    <h5>{{$events[0] -> name}}</h5>
                    <p>{{$events[0] -> description}}</p>
                    <!-- button to buy tickets -->
                    <a href="{{route('event.show', $events[0]->eventid)}}" class="btn btn-primary">View Event</a>
                </div>
            </div>
            @for ($i = 1; $i <= 2; $i++) <div class="carousel-item">
                <img src="{{$events[$i] -> photos[0]->path}}" class="w-100 h-200 ">
                <div class="carousel-caption ">
                    <input type="hidden" name="event-date" value="{{$events[$i]->date}}">
                    <h5>{{$events[$i] -> name}}</h5>
                    <p>{{$events[$i] -> description}}</p>
                    <!-- button to buy tickets -->
                    <a href="{{route('event.show', $events[$i]->eventid)}}" class="btn btn-primary">Buy Tickets</a>
                </div>
        </div>
        @endfor
    </div>
    <a class="carousel-control-prev " href="#carouselSlider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon "></span>
        <span>Previous</span>
    </a>
    <a class="carousel-control-next " href="#carouselSlider" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span>Next</span>
    </a>
</div>
<!-- END CAROUSEL SLIDER -->

<script type="text/javascript" defer>
    setTimeout(function() {
        displayCountdown();
    }, 1000);


    function displayCountdown() {

        let date = document.querySelector('.carousel-item.active input[name="event-date"]').value;

        let split_ = date.split(" ");
        let date_ = split_[0].split("-");

        let year = date_[0].slice(-2);
        let month = date_[2];
        let day = date_[1];

        let string = day + " " + month + " " + year + " " + split_[1];
        console.log(string);
        const newDate = Date.parse(string);
        console.log(newDate);

        const countdown = setInterval(() => {
            const date = new Date().getTime();
            const diff = newDate - date;

            const month = Math.floor(
                (diff % (1000 * 60 * 60 * 24 * (365.25 / 12) * 365)) /
                (1000 * 60 * 60 * 24 * (365.25 / 12))
            );
            const days = Math.floor(
                (diff % (1000 * 60 * 60 * 24 * (365.25 / 12))) / (1000 * 60 * 60 * 24)
            );
            const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((diff % (1000 * 60)) / 1000);

            document.querySelector(".seconds").innerHTML =
                seconds < 10 ? "0" + seconds : seconds;
            document.querySelector(".minutes").innerHTML =
                minutes < 10 ? "0" + minutes : minutes;
            document.querySelector(".hours").innerHTML =
                hours < 10 ? "0" + hours : hours;
            document.querySelector(".days").innerHTML = days < 10 ? "0" + days : days;
            document.querySelector(".months").innerHTML =
                month < 10 ? "0" + month : month;
        });

    }
</script>
<!-- COUNTDOWN TIMER -->
<div class="countdown">
    <div>
        <span class="number months"></span>
        <span>Months</span>
    </div>
    <div>
        <span class="number days"></span>
        <span>Days</span>
    </div>
    <div>
        <span class="number hours"></span>
        <span>Hours</span>
    </div>
    <div>
        <span class="number minutes"></span>
        <span>Minutes</span>
    </div>
    <div>
        <span class="number seconds"></span>
        <span>Seconds</span>
    </div>
</div>
<!-- END COUNTDOWN TIMER -->

<!-- Return false disables the page scrolling to the top automatically after the ajax request  -->
<nav id="categories-navbar">
    <ul>
        <li>
            <a onclick="getDataFromTag('all'); return false;">All </a>
        </li>
        <li>
            <a onclick="getDataFromTag('sports'); return false;">Sports</a>
        </li>
        <li>
            <a onclick="getDataFromTag('music'); return false;">Music</a>
        </li>
        <li>
            <a onclick="getDataFromTag('family'); return false;">Family</a>
        </li>
<!--         <li>
            <a onclick="getDataFromTag('books'); return false;">Books</a>
        </li> -->
        <li>
            <a onclick="getDataFromTag('technology'); return false;">Technology</a>
        </li>
    </ul>
</nav>

<!-- CREATE GRID OF CARDS WITH RANDOM IMAGES -->
<div id="container-other-events-title"> Other Events </div>
<div class="container-other-events">

    @foreach ($events as $event)
    <a href="{{route('event.show', $event->eventid)}}">
        <div class="event-card">
            <img src="{{$event -> photos[0]->path}}" alt="" class="card-image">
            <h3 class="card-title"> {{$event->name}} </h3>
        </div>
    </a>
    @endforeach
</div>

<!-- Full screen modal -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" data-backdrop="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="height: 18rem;">
            <div class="form-group">
                <input type="text" class="form-controller" id="searchInput" name="search"></input>
            </div>
            <table class="table table-bordered table-hover" style="margin-top:1rem;">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody id="table-res">
                </tbody>
            </table>
            <button id="close-modal-button" data-dismiss="modal"></button>

        </div>
    </div>
</div>

</div>


<script type="text/javascript" defer>
    function getDataFromTag(tag) {
        fetch("{{route('searchEventsByTag')}}" + "?" + new URLSearchParams({
            category_name: tag
        }), {
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-Token": '{{ csrf_token() }}'
            },
            method: "get",
            credentials: "same-origin",
        }).then(function(data) {
            return data.json();
        }).then(function(data) {
            console.log(data);
            // iterate through the data
            let container = document.querySelector('.container-other-events');
            container.innerHTML = "";
            data.forEach(function(event) {
                let a = document.createElement('a');
                a.href = "{{route('event.show', '')}}" + event.eventid;
                let div = document.createElement('div');
                div.className = "event-card";
                let img = document.createElement('img');
                img.src = "event_photos/" + event.eventid + ".jpg";
                img.className = "card-image";
                let h3 = document.createElement('h3');
                h3.className = "card-title";
                h3.innerHTML = event.name;
                div.appendChild(img);
                div.appendChild(h3);
                a.appendChild(div);
                container.appendChild(a);
            });
        }).catch(function(error) {
            console.log(error);
        });
    }
</script>

@endsection