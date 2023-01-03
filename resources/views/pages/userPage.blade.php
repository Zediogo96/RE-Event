@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/pages/userProfile.css') }}">
    <script type="text/javascript" src={{ asset('js/userPage.js') }} defer></script>
</head>

<body>

    <div class="userProfile">
        <section class="profileAndDetails">

            <div class="profile" id="profileUserCard">
                <img src="{{$user->profilepic}}" width="70" height="70" alt="Profile Picture">
                <p>{{$user->name}}</p>
            </div>

            <div id="selectOptions">
                <div id="myProfileOption" class="optionSelected option" onclick="selectOption(1)">My Profile</div>

                <div>
                    <div id="myEventsOption" class="option" onclick="selectOption(2)">My Events</div>
                    <div id="myEventsSubmenu" class="submenuSleep">
                        <ul>
                            <li onclick="showDetails(2)" id="futureEventsOption" class="subOption"> Events I'm attending</li>
                            <li onclick="showDetails(3)" id="eventsCreatedByMeOption" class="subOption">Events I'm hosting</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div id="myInvitesOption" onclick="selectOption(3)" class="option">
                        <div class="optionText">
                            <p>My Invites</p>
                            @if ($numberInvites != 0)
                            <span class="numberNotification">{{$numberInvites}}</span>
                            @endif
                        </div>
                    </div>
                    <div id="myInvitesSubmenu" class="submenuSleep">
                        <ul>
                            <li onclick="showDetails(4)" id="receivedInvitesOption" class="optionSelected subOption">Received Invites</li>
                            <li onclick="showDetails(5)" id="sentInvitesOption" class="subOption">Sent Invites</li>
                        </ul>
                    </div>
                </div>

                @if($user->admin)
                <div>
                    <div id="usersSearchOption" onclick="selectOption(4)" class="option">Search Users
                    </div>

                </div>
                @endif

                <div>
                    <div id="viewReportsOption" onclick="selectOption(5)" class="option"> View Reports
                    </div>
                </div>


        </section>
        <section id="selectDetails" class="profile">

            <div id="myProfileDetails" class="optionDetails">
                <form action="{{route('updateUser', ['userid' => $user->userid])}}" method="post" id="profileDetailsForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="userid" value="{{$user->userid}}">
                    <div class="updateProfileDetailsRow">
                        <div class="updateProfileInputBoxes updateProfileTextInput">
                            <label for="name"> Name </label>
                            <input type="text" name="name" id="profileDetailsNameInput" value="{{$user->name}}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="updateProfileInputBoxes updateProfileTextInput">
                            <label for="email"> Email </label>
                            <input type="email" name="email" id="profileDetailsEmailInput" value="{{$user->email}}">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="updateProfileDetailsRow">
                        <div class="updateProfileInputBoxes updateProfileTextInput">
                            <label for="birthday"> Birthday </label>
                            <input type="date" name="birthdate" id="profileDetailsBirthdayInput" value="{{$user->birthdate}}">
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="updateProfileInputBoxes updateProfileTextInput">
                            <label for="password"> Password </label>
                            <input type="password" name="password" id="profileDetailsPasswordInput" placeholder="New Password">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="updateProfileDetailsRow">
                        <div class="updateProfileInputBoxes">
                            <label for="gender"> Gender </label>
                            <select name="gender" id="profileDetailsGenderInput" selected="{{$user->gender}}">
                                <option value='M' @if ($user->gender === 'M') selected @endif >Male</option>
                                <option value='F' @if ($user->gender === 'F') selected @endif>Female </option>
                                <option value='O' @if ($user->gender === 'O') selected @endif>Other</option>
                            </select>
                        </div>
                        <div class="updateProfileInputBoxes">
                            <label for="profilePic"> Profile Picture </label>
                            <input type="file" name="profilePic" id="profileDetailsProfilePicInput">
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Update Profile Details</button>
                </form>
                <button href="#del_acc_modal" data-toggle="modal" id="del_account" type="button" class="btn btn-danger"> Delete Account </button>
            </div>
            
            <div id="myEventsDetails" class="optionDetails optionDetailsHidden">
                <div id="futureEvents" class="details submenuSleep">
                    <div>
                        <h2>Events I'm attending</h2>
                    </div>
                    <div class="tableContainer">
                        <table class="events-list">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name</th>
                                <th>City</th>
                                <th></th>

                            </tr>

                        </thead>
                        @each('partials.futureEvents', $user->attendingEvents, 'event')
                        </table>

                    </div>
                </div>
                <div id="eventsCreatedByMe" class="details submenuSleep">
                    <div class="headerDiv">
                        <h2>Events I'm hosting</h2>
                        <button class="btn btn-success" data-toggle="modal" data-target="#createEventModal"> New Event </button>
                    </div>
                    <div class="tableContainer">
                        <table class="events-list">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Privacy</th>
                                    <th></th>
                                    
                                </tr>
                                
                            </thead>
                            @each('partials.hostedEvents', $user->hostedEvents, 'event')
                        </table>
                    </div>
                </div>
            </div>

            <div id="myInvitesDetails" class="optionDetails optionDetailsHidden">
                <div id="receivedInvites" class="details submenuSleep">
                    <div>
                        <h2>Received Invites</h2>
                    </div>
                    <div class="tableContainer">
                        <table class="events-list">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name of Event</th>
                                <th>City</th>
                                <th>Email of inviter</th>
                                <th>Respond to Invite</th>
                            </tr>
                        </thead>
                            @each('partials.receivedInvite', $receivedInvites, 'invite')
                        </table>
                    </div>
                </div>
                <div id="sentInvites" class="details submenuSleep">
                    <div>
                        <h2>Sent Invites</h2>
                    </div>
                    <div class="tableContainer">
                        <table class="events-list">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Name of Event</th>
                                <th>Email of invited person</th>
                                <th>Invite Status</th>
                            </tr>

                        </thead>
                            @each('partials.sentInvite', $sentInvites, 'invite')
                        </table>
                    </div>
                </div>
            </div>

            @if ($user->admin)
            <div id="userSearch" class="details submenuSleep">
                <div>
                    <h2>User Search Tool</h2>
                    <div class="searchDiv">
                        <input type="text" class="form-controller" id="search-users-admin" name="search" placeholder="Search for the user.."></input>
                        <button class="btn btn-success" data-toggle="modal" data-target="#createUserModal"> Create User </button>
                    </div>
                </div>
                <div class="tableContainer">
                    <table class="events-list">

                    <thead>
                            <tr>
                                <th>UserID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="search-admin-users-res">
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="viewReports" class="details submenuSleep">
                <button type="button" data-toggle="modal" data-target="#view_comment_report" style="visibility:hidden"> </button>
                <div>
                    <h2> View Reports </h2>
                </div>
                <div class="tableContainer">
                    <table class="events-list">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Username</th>
                                <th>Reason</th>
                                <th>Description </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
            </div>
            @endif
        </section>
    </div>
    <!-- Modal with bootstrap -->

    @foreach($user->hostedEvents as $event)

    @include('partials.updateEventModal', ['event' => $event])

    @endforeach

    <!-- CREATE EVENT MODAL -->
    @include('partials.createEventModal')
    @include('partials.createUserModal')
    <!-- DELETE ACCOUNT MODAL -->
    @include('partials.conf_del_acc')
    @if ($user->admin)
    @include('partials.viewCommentReport')
    @endif

</body>

</html>

@endsection
