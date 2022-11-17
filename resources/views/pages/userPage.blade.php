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

        <div id = "selectOptions">
            <div id="myProfileOption" class="optionSelected option" onclick="selectOption(1)">My Profile</div>
            
            <div>
                <div id="myEventsOption" class="option" onclick="selectOption(2)">My Events</div>
                <div id="myEventsSubmenu" class = "submenuSleep" >
                    <ul>
                        <li onclick="showSubmenu(1)">Past Events</li>
                        <li onclick="showSubmenu(2)">Future Events</li>
                        <li onclick="showSubmenu(3)">Events Created By Me</li>
                    </ul>  
                </div>
            </div>

            <div>
                <div id="myInvitesOption" onclick="selectOption(3)" class="option">My Invites</div>
                <div id="myInvitesSubmenu" class = "submenuSleep">
                    <ul>
                        <li onclick="showSubmenu(4)">Received Invites</li>
                        <li onclick="showSubmenu(5)">Sent Invites</li>
                    </ul>  
                </div>
            </div>  
        </div>
    

    </section>
    <section id="selectDetails" class = "profile">
        <div id="myProfileDetails" class="optionDetails">
            myProfile
        </div>
        <div id="myEventsDetails" class="optionDetails optionDetailsHidden">
            <div id="pastEvents" class="submenuSleep">
                No past events :(
            </div>
            <div id="futureEvents" class="submenuSleep">
                No future events :(
            </div>
            <div id="eventsCreatedByMe" class="submenuSleep">
                No events created by you :(
            </div>
        </div>
        <div id="myInvitesDetails" class="optionDetails optionDetailsHidden">
            <div id="receivedInvites" class="submenuSleep">
                No invites Received :(
            </div>
            <div id="sentInvites" class="submenuSleep">
                No invites sent :(
            </div>
        </div>
        
    </section>

</div>
</html>

@endsection
