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
            <img src="profile_pictures/generic_pic.jpg" width="70" height="70" alt="Profile Picture" >
            <p>John Doe</p> 
        </div>

        <div id = "selectOptions">
            <div id="myProfileOption" class="optionSelected option" onclick="selectOption(1)">My Profile</div>
            
            <div>
                <div id="myEventsOption" class="option" onclick="selectOption(2)">My Events</div>
                <div id="myEventsSubmenu" class = "submenuSleep" >
                    <ul>
                        <li onclick="showDetails(1)" id="pastEventsOption" class = "optionSelected subOption">Past Events</li>
                        <li onclick="showDetails(2)" id="futureEventsOption" class = "subOption">Future Events</li>
                        <li onclick="showDetails(3)" id="eventsCreatedByMeOption" class = "subOption">Events Created By Me</li>
                    </ul>  
                </div>
            </div>

            <div>
                <div id="myInvitesOption" onclick="selectOption(3)" class="option">My Invites</div>
                <div id="myInvitesSubmenu" class = "submenuSleep">
                    <ul>
                        <li onclick="showDetails(4)" id="receivedInvitesOption" class = "optionSelected subOption">Received Invites</li>
                        <li onclick="showDetails(5)" id="sentInvitesOption" class = "subOption">Sent Invites</li>
                    </ul>  
                </div>
            </div>  
        </div>
    

    </section>
    <section id="selectDetails" class = "profile">
        <div id="myProfileDetails" class="optionDetails">
            <h4>My Profile</h4>
            <form action="updateProfileDetails" method="post" id="profileDetailsForm">
                <div class="updateProfileDetailsRow">
                    <div class="updateProfileInputBoxes updateProfileTextInput">
                        <label for="name"> Name </label>
                        <input type="text" name="name" id="profileDetailsNameInput">
                    </div>
                    <div class="updateProfileInputBoxes updateProfileTextInput">
                        <label for="email"> Email </label>
                        <input type="email" name="email" id="profileDetailsEmailInput">
                    </div>
                </div>
                <div class="updateProfileDetailsRow">
                    <div class="updateProfileInputBoxes updateProfileTextInput">
                        <label for="birthday"> Birthday </label>
                        <input type="date" name="birthday" id="profileDetailsBirthdayInput">
                    </div>
                    <div class="updateProfileInputBoxes updateProfileTextInput">
                        <label for="password"> Password </label>
                        <input type="password" name="password" id="profileDetailsPasswordInput">
                    </div>
                </div>
                <div class="updateProfileDetailsRow">
                    <div class="updateProfileInputBoxes">
                        <label for="gender"> Gender </label>
                        <select name="gender" id="profileDetailsGenderInput">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="updateProfileInputBoxes">
                        <label for="profilePic"> Profile Picture </label>
                        <input type="file" name="profilePic" id="profileDetailsProfilePicInput">
                    </div>
                </div>
            </form>
        </div>
        <div id="myEventsDetails" class="optionDetails optionDetailsHidden">
            <div id="pastEvents" class="details submenuSleep">
                No past events :(
            </div>
            <div id="futureEvents" class="details submenuSleep">
                No future events :(
            </div>
            <div id="eventsCreatedByMe" class="details submenuSleep">
                No events created by you :(
            </div>
        </div>
        <div id="myInvitesDetails" class="optionDetails optionDetailsHidden">
            <div id="receivedInvites" class="details submenuSleep">
                No invites Received :(
            </div>
            <div id="sentInvites" class="details submenuSleep">
                No invites sent :(
            </div>
        </div>
        
    </section>

</div>
</html>

@endsection
