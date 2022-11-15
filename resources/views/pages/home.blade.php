@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 20px">
    <!-- CAROUSEL SLIDER -->
    <div id="carouselSlider" class="carousel slide">
        <ol class="carousel-indicators">
            <li data-target="#carouselSlider" data-slide-to="0" class="active"></li>
            <li data-target="#carouselSlider" data-slide-to="1"></li>
            <li data-target="#carouselSlider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://www.loudmagazine.net/wp-content/uploads/2022/05/Metallica.jpg" class="w-100 h-200 ">
                <div class="carousel-caption ">
                    <h5>Metallica</h5>
                    <p>One of the most icon metal bands in the world is coming to Portugal!</p>
                    <!-- button to buy tickets -->
                    <a href="{{route('home.show')}}" class="btn btn-primary">Buy Tickets</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://www.iol.pt/multimedia/oratvi/multimedia/imagem/id/6307579b0cf2ea367d4b0e37/1024.jpg" class="w-100 h-100 ">
                <div class="carousel-caption ">
                    <h5>Coldplay</h5>
                    <p>This is second slide</p>
                    <a href="{{route('home.show')}}" class="btn btn-primary">Buy Tickets</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://akamai.sscdn.co/uploadfile/letras/fotos/7/b/d/a/7bda8810fb3661290d9744100cecd82d.jpg" class="w-100 h-100 ">
                <div class="carousel-caption ">
                    <h5>Pearl Jam</h5>
                    <p>This is third slide</p>
                    <a href="{{route('home.show')}}" class="btn btn-primary">Buy Tickets</a>
                </div>
            </div>
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
        <div class="event-card">
            <h3 class="card-title"> METALLICA </h3>
            <img src="https://www.loudmagazine.net/wp-content/uploads/2022/05/Metallica.jpg" alt="" class="card-image">
        </div>

        <div class="event-card">
            <img src="https://www.loudmagazine.net/wp-content/uploads/2022/05/Metallica.jpg" alt="" class="card-image">
            <h3 class="card-title"> METALLICA </h3>
        </div>

        <div class="event-card">
            <img src="https://www.loudmagazine.net/wp-content/uploads/2022/05/Metallica.jpg" alt="" class="card-image">
            <h3 class="card-title"> METALLICA </h3>
        </div>

        <div class="event-card">
            <img src="https://www.loudmagazine.net/wp-content/uploads/2022/05/Metallica.jpg" alt="" class="card-image">
            <h3 class="card-title"> METALLICA </h3>
        </div>

        <div class="event-card">
            <img src="https://www.loudmagazine.net/wp-content/uploads/2022/05/Metallica.jpg" alt="" class="card-image">
            <h3 class="card-title"> METALLICA </h3>
        </div>

        <div class="event-card">
            <img src="https://www.loudmagazine.net/wp-content/uploads/2022/05/Metallica.jpg" alt="" class="card-image">
            <h3 class="card-title"> METALLICA </h3>
        </div>

        <div class="event-card">
            <img src="https://www.loudmagazine.net/wp-content/uploads/2022/05/Metallica.jpg" alt="" class="card-image">
            <h3 class="card-title"> METALLICA </h3>
        </div>

        <div class="event-card">
            <img src="https://www.loudmagazine.net/wp-content/uploads/2022/05/Metallica.jpg" alt="" class="card-image">
            <h3 class="card-title"> METALLICA </h3>
        </div>
        
    </div>
</div>

@endsection