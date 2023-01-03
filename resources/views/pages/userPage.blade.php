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
                            <li onclick="showDetails(1)" id="pastEventsOption" class="optionSelected subOption">Past Events</li>
                            <li onclick="showDetails(2)" id="futureEventsOption" class="subOption">Future Events</li>
                            <li onclick="showDetails(3)" id="eventsCreatedByMeOption" class="subOption">Events Created By Me</li>
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
                    @endif
                </div>


        </section>
        <section id="selectDetails" class="profile">
            <div id="myProfileDetails" class="optionDetails">
                <h4>My Profile</h4>
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

                    <button type="submit" id="updateProfileDetailsButton" style="margin-left:80%" class="btn btn-success">Update Profile Details</button>
                </form>
            </div>
            <div id="myEventsDetails" class="optionDetails optionDetailsHidden">
                <div id="pastEvents" class="details submenuSleep">
                                <div class="single-post-title" style="padding-bottom: 1rem;">
                                    <h2>Past Events</h2>
                                </div>
                                <div class="single-post-content">
                                    <table class="events-list">
                                        @each('partials.pastEvents', $user->attendingEvents, 'event')
                                    </table>
                                </div>
                </div>
                <div id="fureEvents" class="details submenuSleep">
                                <div class="single-post-title" style="padding-bottom: 1rem;">
                                    <h2>Future Events</h2>
                                </div>
                                <div class="single-post-content">
                                    <table class="events-list">
                                    @each('partials.futureEvents', $user->attendingEvents, 'event')
                                    </table>

                                </div>

                </div>
            </div>
            <div id="eventsCreatedByMe" class="details submenuSleep">
                            <div class="single-post-title" style="padding-bottom: 1rem;">
                                <h2>Events you're hosting</h2>
                                <button class="btn btn-success" data-toggle="modal" data-target="#createEventModal"> New Event </button>
                            </div>
                            <div class="single-post-content">
                                <table class="events-list">
                                    @each('partials.hostedEvents', $user->hostedEvents, 'event')
                                </table>
                </div>
            </div>


            @if ($user->admin)
            <div id="userSearch" class="details submenuSleep">
                            <div class="single-post-title" style="padding-bottom: 1rem;">
                                <h2>User Search Tool</h2>
                                <button class="btn btn-success" data-toggle="modal" data-target="#createUserModal"> Create User </button>
                            </div>
                            <div class="single-post-content">
                                <input type="text" class="form-controller" id="search-users-admin" name="search" placeholder="Search for the user.."></input>
                                <table class="events-list" style="margin-top: 2rem;">

                                <thead>
                                        <tr>
                                            <th>UserID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody id="search-admin-users-res">
                                    </tbody>
                                </table>

                </div>
            </div>

            @endif
            <div id="myInvitesDetails" class="optionDetails optionDetailsHidden">
                <div id="receivedInvites" class="details submenuSleep">
                                <div class="single-post-title" style="padding-bottom: 1rem;">
                                    <h2>Received Invites</h2>
                                </div>
                                <div class="single-post-content">
                                    <table class="events-list">
                                        @each('partials.receivedInvite', $receivedInvites, 'invite')
                                    </table>
                                </div>
                </div>
                <div id="sentInvites" class="details submenuSleep">
                                <div class="single-post-title" style="padding-bottom: 1rem;">
                                    <h2>Sent Invites</h2>
                                </div>
                                <div class="single-post-content">
                                    <table class="events-list">
                                        @each('partials.sentInvite', $sentInvites, 'invite')
                                    </table>
                                </div>
                            </div>
            </div>

        </section>
    </div>
    <!-- Modal with bootstrap -->

    @foreach($user->hostedEvents as $event)

    @include('partials.updateEventModal', ['event' => $event])

    @endforeach

    <!-- CREATE EVENT MODAL -->
    @include('partials.createEventModal')
    @include('partials.createUserModal')

</body>

</html>

@endsection
