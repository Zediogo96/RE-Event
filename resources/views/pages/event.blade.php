@extends('layouts.app')

@section('content')

<div class="container" id="event-content">

    <img src="{{$event -> photos[0]->path}}" style="border-radius: 5%; height:45rem;">
    <h1> {{$event->name}} </h1>
    <h3> {{date('Y-m-d', strtotime($event->date))}} </h3>
    <button class="btn btn-info"> <a> <i class="fa fa-layer-group fa-fw"></i>
            BUY TICKETS </a></button>

    <nav>
        <ul id="menu-info">
            <li class="menu-info-item text-center">
                <div> Location </div>
                <p style="font-size: 15px"> {{$event->city->country->name}}, {{$event->city->name}} </p>
            </li>
            <li class="menu-info-item text-center">
                <div> Capacity </div>
                <p style="font-size: 15px"> {{$event->capacity}} places </p>
            </li>
            <li class="menu-info-item text-center">
                <div> Address </div>
                <p style="font-size: 15px"> {{$event->address}} </p>
            </li>
        </ul>
    </nav>

    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li>
                    <a href="#">Event Host</a>
                </li>
                <li>
                    <a href="#">Atendees List</a>
                </li>
                <li>
                    <a href="#"> Outro 1</a>
                </li>
                <li>
                    <a href="#"> Outro 2 </a>
                </li>
                <li>
                    <a href="#">Outro 3</a>
                </li>
                <li>
                    <a href="#"> Outro 4</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!-- bar to the side of the page -->




@endsection