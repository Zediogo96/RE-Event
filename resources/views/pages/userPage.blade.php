@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/pages/userProfile.css') }}">
    <script type="text/javascript" src={{ asset('js/userPage.js') }} defer></script>
</head>

<div class = "userProfile">
    <section class = "profileAndDetails">
    
        <div class = "profile" id = "profileUserCard" >
            imagem: John Doe 
        </div>

        <div id = "selectOptions" class = "profile" >
            <ul>
                <li id="myProfileOption" class="optionSelected" onclick="selectOption(1)">My Profile</li>
                <li id="myEventsOption" onclick="selectOption(2)">My Events</li>
                <li id="myInvitesOption" onclick="selectOption(3)">My Invites</li>
            </ul>  
        </div>
    

    </section>
    <section id="selectDetails" class = "profile">
        <div id="myProfileDetails" class="userProfileDetails">
            myProfile
        </div>
        <div id="myEventsDetails" class="userProfileDetails userProfileDetailsHidden">
            myEvents
        </div>
        <div id="myInvitesDetails" class="userProfileDetails userProfileDetailsHidden">
            myInvites
        </div>
        
    </section>

</div>
</html>

@endsection
