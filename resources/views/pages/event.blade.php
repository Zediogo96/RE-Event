@extends('layouts.app')

@section('content')

<div class="container" id="event-content">

    <img src="https://www.loudmagazine.net/wp-content/uploads/2022/05/Metallica.jpg" style="border-radius: 5%;">
    <h1> METALLICA </h1>
    <h3> 2022-05-05 </h3>
    <button class="btn btn-info"> <a> <i class="fa fa-layer-group fa-fw"></i>
            BUY TICKETS </a></button>

    <nav>
        <ul id="menu-info">
            <li class="menu-info-item text-center">
                <div> Location </div>
                <p style="font-size: 15px"> Cenas </p>
            </li>
            <li class="menu-info-item text-center">
                <div> Capacity </div>
                <p style="font-size: 15px"> Cenas </p>
            </li>
            <li class="menu-info-item text-center">
                <div> Outra Info </div>
                <p style="font-size: 15px"> Cenas </p>
            </li>
        </ul>
    </nav>

</div>

<!-- bar to the side of the page -->
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

@endsection