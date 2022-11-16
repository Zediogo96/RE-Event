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
                    <h5>{{$events[0] -> name}}</h5>
                    <p>{{$events[0] -> description}}</p>
                    <!-- button to buy tickets -->
                    <a href="{{route('event.show', $events[0]->eventid)}}" class="btn btn-primary">Buy Tickets</a>
                </div>
            </div>
            @for ($i = 1; $i <= 2; $i++)
            <div class="carousel-item">
                <img src="{{$events[$i] -> photos[0]->path}}" class="w-100 h-200 ">
                <div class="carousel-caption ">
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

    <!-- CREATE GRID OF CARDS WITH RANDOM IMAGES -->
    <h1> Other Events </h1>
    <div class="container-other-events">  

        @foreach ($events as $event) 
        <a  href="{{route('event.show', $event->eventid)}}"> 
        <div class="event-card">
            <img src= "{{$event -> photos[0]->path}}" alt="" class="card-image">
            <h3 class="card-title"> {{$event->name}} </h3>
        </div>
        </a>
        @endforeach
    </div>
</div>

@endsection
