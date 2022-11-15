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
        <h1 style="font-size: 80px; margin-top: 10px;">About RE-EVENT</h1>
        <p style="font-size: 20px;">Some text about who we are and what we do.</p>
    </div>

    <h1 style="text-align:center; font-size: 50px; margin-top: 30px;">Our Team</h1>

    <div class="container-profile-cards" style="margin-top: 10vh">
        <!-- AFONSO -->
        <div class="column">
            <div class="profile-card">
                <div class="profile-card-header">
                    <img src="https://p.kindpng.com/picc/s/78-785805_computer-icons-user-download-avatar-male-male-user.png" alt="" class="profile-image">

                    <div class="profile-info">
                        <h3 class="profile-name">Afonso Martins </h3>
                        <p class="profile-desc">Developer</p>
                    </div>
                </div>

                <div class="profile-card-body">
                    <div class="action">
                        <button type="button" class="btn btn-blue-outline"> Github </button>
                        <button type="button" class="btn btn-red-outline" href="mailto:up202005900@fe.up.pt"> E-mail </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- END AFONSO -->

        <!-- EDU -->

        <div class="column">
            <div class="profile-card">
                <div class="profile-card-header">
                    <img src="https://p.kindpng.com/picc/s/78-785805_computer-icons-user-download-avatar-male-male-user.png" alt="" class="profile-image">

                    <div class="profile-info">
                        <h3 class="profile-name">José Diogo </h3>
                        <p class="profile-desc">Developer</p>
                    </div>
                </div>

                <div class="profile-card-body">
                    <div class="action">
                    <button type="button" class="btn btn-blue-outline"> Github </button>
                        <button class="btn btn-red-outline" href="mailto:up202005283@fe.up.pt"> E-mail </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END EDU -->

        <!-- ZÉ -->
        <div class="column">
            <div class="profile-card">
                <div class="profile-card-header">
                    <img src="https://p.kindpng.com/picc/s/78-785805_computer-icons-user-download-avatar-male-male-user.png" alt="" class="profile-image">

                    <div class="profile-info">
                        <h3 class="profile-name">Eduardo Silva </h3>
                        <p class="profile-desc">Developer</p>
                    </div>
                </div>

                <div class="profile-card-body">
                    <div class="action">
                    <button type="button" class="btn btn-blue-outline"> Github </button>
                        <button class="btn btn-red-outline" href="mailto:up202003529@fe.up.pt"> E-mail </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END ZÉ -->

        <!-- MATILDE -->

        <div class="column">
            <div class="profile-card">
                <div class="profile-card-header">
                    <img src="https://p.kindpng.com/picc/s/76-763010_female-user-icon-png-transparent-png.png" alt="" class="profile-image">

                    <div class="profile-info">
                        <h3 class="profile-name">Matilde Silva </h3>
                        <p class="profile-desc">Developer</p>
                    </div>
                </div>

                <div class="profile-card-body">
                    <div class="action">
                    <button type="button" class="btn btn-blue-outline"> Github </button>
                        <button class="btn btn-red-outline" href="mailto:up202007928@fe.up.pt"> E-mail </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MATILDE -->
    </div>
</body>

</html>

@endsection