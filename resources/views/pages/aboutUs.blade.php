@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/pages/aboutUs.css') }}">
</head>

<body>

    <div class="about-section">
        <h1 style= "font-size: 70px;">About RE-EVENT</h1>
        <p>Some text about who we are and what we do.</p>
    </div>

    <h1 style="text-align:center">Our Team</h1>

    <div class="row">

        <!-- AFONSO -->
        <div class="column">
            <div class="card">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" alt="" style="width:100%">
                <div class="container">
                    <h2>Afonso Martins</h2>
                    <p class="title">Developer</p>
                    <p>DESCREVER CENAS</p>
                    <p>
                        <a href="mailto:up202005900@fe.up.pt">
                            <i class="fa fa-envelope">up202005900@fe.up.pt</i>
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <!-- EDU -->
        <div class="column">
            <div class="card">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" alt="" style="width:100%">
                <div class="container">
                    <h2>Eduardo Silva</h2>
                    <p class="title">Developer</p>
                    <p>DESCREVER CENAS</p>
                    <p>
                        <a href="mailto:up202005283@fe.up.pt">
                            <i class="fa fa-envelope">up202005283@fe.up.pt</i>
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <!-- ZÉ -->
        <div class="column">
            <div class="card">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/000/439/863/small/Basic_Ui__28186_29.jpg" alt="" style="width:100%">
                <div class="container">
                    <h2>José Diogo</h2>
                    <p class="title">Developer</p>
                    <p>DESCREVER CENAS</p>
                    <p>
                        <a href="mailto:up202003529@fe.up.pt">
                            <i class="fa fa-envelope">up202003529@fe.up.pt</i>
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <!-- MATILDE -->

        <div class="column">
            <div class="card">
                <img src="https://images.freeimages.com/vhq/images/previews/4e1/female-user-icon-clip-art-92637.png" alt="" style="width:100%">
                <div class="container">
                    <h2>Matilde Silva</h2>
                    <p class="title">Developer</p>
                    <p>DESCREVER CENAS</p>

                    <p>
                        <a href="mailto:up202007928@fe.up.pt">
                            <i class="fa fa-envelope">up202007928@fe.up.pt</i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

@endsection