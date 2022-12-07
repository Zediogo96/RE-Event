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
                    <div id="myInvitesOption" onclick="selectOption(3)" class="option">My Invites</div>
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
                        </div>
                        <div class="updateProfileInputBoxes updateProfileTextInput">
                            <label for="email"> Email </label>
                            <input type="email" name="email" id="profileDetailsEmailInput" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="updateProfileDetailsRow">
                        <div class="updateProfileInputBoxes updateProfileTextInput">
                            <label for="birthday"> Birthday </label>
                            <input type="date" name="birthdate" id="profileDetailsBirthdayInput" value="{{$user->birthdate}}">
                        </div>
                        <div class="updateProfileInputBoxes updateProfileTextInput">
                            <label for="password"> Password </label>
                            <input type="password" name="password" id="profileDetailsPasswordInput" placeholder="New Password">
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
                        </div>
                    </div>

                    <button type="submit" id="updateProfileDetailsButton" style="margin-left:80%" class="btn btn-success">Update Profile Details</button>
                </form>
            </div>
            <div id="myEventsDetails" class="optionDetails optionDetailsHidden">
                <div id="pastEvents" class="details submenuSleep">
                    <div class="container">
                        <div class="section">
                            <div class="blog-post blog-single-post">
                                <div class="single-post-title" style="padding-bottom: 1rem;">
                                    <h2>Past Events</h2>
                                </div>
                                <div class="single-post-content">
                                    <table class="events-list">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th></th>

                                            </tr>

                                        </thead>
                                        <tr>
                                            <td>
                                                <div class="event-date">
                                                    <div class="event-day">16</div>
                                                    <div class="event-month">MAR</div>
                                                </div>
                                            </td>
                                            <td>
                                                Donec hendrerit massa metus, a ultrices elit iaculis eu. Pellentesque ullamcorper augue lacus.
                                            </td>
                                            <td class="event-venue hidden-xs"><i class="icon-map-marker"></i> Siemens Arena</td>

                                            <td><button href="#" class="btn btn-success btn-sm btn-edit-event">View Event</button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="event-date">
                                                    <div class="event-day">5</div>
                                                    <div class="event-month">APR</div>
                                                </div>
                                            </td>
                                            <td>
                                                Phasellus et est quis diam iaculis fringilla id nec sapien.
                                            </td>
                                            <td class="event-venue hidden-xs"><i class="icon-map-marker"></i> Nike Arena</td>

                                            <td><button href="#" class="btn btn-success btn-sm btn-edit-event">View Event</button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="event-date">
                                                    <div class="event-day">31</div>
                                                    <div class="event-month">MAY</div>
                                                </div>
                                            </td>
                                            <td>
                                                Ut consectetur commodo justo, sed sollicitudin massa venenatis ut 2013.
                                            </td>
                                            <td class="event-venue hidden-xs"><i class="icon-map-marker"></i> Samsung Arena</td>
                                            <td><button href="#" class="btn btn-success btn-sm btn-edit-event">View Event</button></td>
                                        </tr>

                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="futureEvents" class="details submenuSleep">
                    <div class="container">
                        <div class="section">
                            <div class="blog-post blog-single-post">
                                <div class="single-post-title" style="padding-bottom: 1rem;">
                                    <h2>Future Events</h2>
                                </div>
                                <div class="single-post-content">
                                    <table class="events-list">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Name</th>
                                                <th>City</th>
                                                <th></th>

                                            </tr>

                                        </thead>
                                        @foreach($user->attendingEvents as $event)

                                        <tr>
                                            <td>
                                                <div class="event-date">
                                                    <div class="event-day"> {{substr($event->date, 8, 2)}}</div>
                                                    <div class="event-month"> {{substr(date('F', mktime(0, 0, 0, substr($event->date, 5,2), 10)), 0, 3);}}</div>
                                                </div>
                                            </td>
                                            <td>
                                                {{$event->name}}
                                            </td>
                                            <td class="event-venue hidden-xs"><i class="icon-map-marker"></i> {{$event->city->name}}</td>
                                            <td><button href="#" class="btn btn-danger btn-sm btn-edit-event">Leave Event</button></td>
                                        </tr>
                                        @endforeach
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="eventsCreatedByMe" class="details submenuSleep">
                <div class="container">
                    <div class="section">
                        <div class="blog-post blog-single-post">
                            <div class="single-post-title" style="padding-bottom: 1rem;">
                                <h2>Events you're hosting</h2>
                                <button class="btn btn-success" data-toggle="modal" data-target="#createEventModal"> New Event </button>
                            </div>
                            <div class="single-post-content">
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

                                    @foreach($user->hostedEvents as $event)
                                    <tr>
                                        <td>
                                            <div class="event-date">
                                                <div class="event-day"> {{substr($event->date, 8, 2)}}</div>
                                                <div class="event-month"> {{substr(date('F', mktime(0, 0, 0, substr($event->date, 5,2), 10)), 0, 3);}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            {{$event->name}}
                                        </td>
                                        <td class="event-venue hidden-xs"><i class="icon-map-marker"></i> {{$event->city->name}}</td>
                                        <td> {{$event->isprivate ? ('Private'): ('Public')}}</td>
                                        <td><button href=" #" class="btn btn-warning btn-sm btn-edit-event" data-toggle="modal" data-target="#editModal{{$event->eventid}}" value="{{$event->eventid}}">Edit Event</button></td>
                                    </tr>
                                    @endforeach

                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($user->admin)
            <div id="userSearch" class="details submenuSleep">
                <div class="container">
                    <div class="section">
                        <div class="blog-post blog-single-post">
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
                    </div>
                </div>
            </div>

            @endif
            <div id="myInvitesDetails" class="optionDetails optionDetailsHidden">
                <div id="receivedInvites" class="details submenuSleep">
                    <div class="container">
                        <div class="section">
                            <div class="blog-post blog-single-post">
                                <div class="single-post-title" style="padding-bottom: 1rem;">
                                    <h2>Received Invites</h2>
                                </div>
                                <div class="single-post-content">
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
                        </div>
                    </div>
                </div>
                <div id="sentInvites" class="details submenuSleep">
                    <div class="container">
                        <div class="section">
                            <div class="blog-post blog-single-post">
                                <div class="single-post-title" style="padding-bottom: 1rem;">
                                    <h2>Sent Invites</h2>
                                </div>
                                <div class="single-post-content">
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
                    </div>
                </div>
            </div>

        </section>
    </div>
    <!-- Modal with bootstrap -->

    @foreach($user->hostedEvents as $event)

    <div class="modal fade" id="editModal{{$event->eventid}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="edit-modal-content">
                <div class="modal-header">
                    <button id="close-modal-button" data-dismiss="modal"></button>
                    <h4 class="modal-title" id="editModalLabel">Edit Event</h4>
                </div>
                <div class="modal-body">

                    <form id="teste-form" method='post' action="{{ route('updateEvent', ['eventid' => $event->eventid])}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @csrf
                        <!-- get value from event-id2 in laravel  -->
                        <div class="form-group mb-3 form-event-edit">
                            <label for="name" class="form-label">Event Name</label>
                            <input id="name" type="text" name="name" onKeyUp="handleNameChange({{$event->eventid}})" value="{{$event->name}}" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="description" class="form-label">Description</label>
                            <input id="description" type="text" name="description" value="{{$event->description}}" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="date" class="form-label">Date</label>
                            <input id="date" type="datetime-local" name="date" value="{{$event->date}}" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input id="capacity" type="number" name="capacity" onKeyUp="handleCapacityChange({{$event->eventid}})" value="{{$event->capacity}}" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="city" class="form-label">City</label>
                            <input id="city" type="text" name="city" onKeyUp="handleLocationChange({{$event->eventid}})" value="{{$event->city->name}}" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="country" class="form-label">Country</label>
                            <input id="country" type="text" name="country" onKeyUp="handleLocationChange({{$event->eventid}})" value="{{$event->city->country->name}}" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="price" class="form-label">Price</label>
                            <input id="price" type="number " min="1" step="any" name="price" value="{{$event->price}}" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="address" class="form-label">Address</label>
                            <input id="address" type="text" name="address" onKeyUp="handleAddressChange({{$event->eventid}})" value="{{$event->address}}" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="tag" class="form-label">Event Tag</label>
                            <input id="tag" type="text" name="tag" value="{{$event->eventTag->name}}" class="input-group form-control">
                        </div>
                        <div class="input-group switch round blue-white-switch mt-2">
                            <div class="form-check form-switch" style="padding-top: 0.7rem;">

                                <input class="form-check-input" type="checkbox" role="switch" style='height: 1.5rem; width: 3rem;' id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked" style="padding-left: 2.1rem; font-size: 1.5rem"> Is the Event private? </label>

                            </div>
                        </div>

                        <button type="submit" class="input-group btn btn-primary">
                            Submit
                        </button>
                    </form>

                    <div id="preview-container" style="position:relative">

                        <img src="{{$event->photos[0]->path}}" id="preview-image" style="border-radius: 5%;">
                        <h1 id="preview-name"> {{$event->name}} </h1>
                        <h3 id="preview-date"> {{date('Y-m-d', strtotime($event->date))}} </h3>
                        <button class="btn btn-info"> <a> <i class="fa fa-layer-group fa-fw"></i>
                                BUY TICKETS </a></button>

                        <nav>
                            <ul id="menu-info">
                                <li class="menu-info-item text-center" style="width: 11rem;">
                                    <div> Location </div>
                                    <p style="font-size: 15px" id="preview-location"> {{$event->city->country->name}} , {{$event->city->name}} </p>
                                </li>
                                <li class="menu-info-item text-center" style="width: 11rem;">
                                    <div> Capacity </div>
                                    <p id="preview-capacity" style="font-size: 15px"> {{$event->capacity}} places </p>
                                </li>
                                <li class="menu-info-item text-center" style="width: 11rem;">
                                    <div> Address </div>
                                    <p id="preview-address" style="font-size: 15px"> {{$event->address}} </p>
                                </li>
                            </ul>
                        </nav>


                    </div>
                </div>
            </div>
        </div>
        <!-- End of Modal with bootstrap -->
    </div>

    @endforeach

    <!-- CREATE EVENT MODAL -->
    <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="createEventModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="edit-modal-content" style="height: 85vh">
                <div class="modal-header">
                    <button id="close-modal-button" data-dismiss="modal"></button>
                    <h4 class="modal-title" id="editModalLabel">Edit Event</h4>
                </div>
                <div class="modal-body">

                    <form id="teste-form" method='post' action="{{ route('storeEvent')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @csrf
                        <!-- get value from event-id2 in laravel  -->

                        <div class="form-group mb-3 form-event-edit">
                            <label for="name" class="form-label">Event Name</label>
                            <input id="name" type="text" name="name" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="description" class="form-label">Description</label>
                            <input id="description" type="text" name="description" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="date" class="form-label">Date</label>
                            <input id="date" type="datetime-local" name="date" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="capacity" class="form-label">Capacity</label>
                            <input id="capacity" type="number" name="capacity" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="city" class="form-label">City</label>
                            <input id="city" type="text" name="city" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="country" class="form-label">Country</label>
                            <input id="country" type="text" name="country" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="price" class="form-label">Price</label>
                            <input id="price" type="number " min="1" step="any" name="price" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="address" class="form-label">Address</label>
                            <input id="address" type="text" name="address" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="tag" class="form-label">Event Tag</label>
                            <input id="tag" type="text" name="tag" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3 form-event-edit">
                            <label for="img" class="form-label">Event Image</label>
                            <input id="img" type="file" name="img" onChange="preview_image()" placeholder="Upload an image for you event" class="input-group form-control">
                        </div>
                        <div class="input-group switch round blue-white-switch mt-2">
                            <div class="form-check form-switch" style="padding-top: 0.7rem;">
                                <input class="form-check-input" type="checkbox" role="switch" style='height: 1.5rem; width: 3rem;' id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked" style="padding-left: 2.1rem; font-size: 1.5rem"> Is the Event private? </label>
                            </div>
                        </div>

                        <button type="submit" class="input-group btn btn-primary">
                            Submit
                        </button>
                    </form>

                    <div id="preview-container" style="position:relative; bottom: 40rem;">

                        <img src="event_photos/default_event.jpg" id="preview-image" style="border-radius: 5%;">
                        <h1 id="preview-name"> Event Name </h1>
                        <h3 id="preview-date"> 2023-01-23 </h3>
                        <button class="btn btn-info"> <a> <i class="fa fa-layer-group fa-fw"></i>
                                BUY TICKETS </a></button>

                        <nav>
                            <ul id="menu-info">
                                <li class="menu-info-item text-center" style="width: 11rem;">
                                    <div> Location </div>
                                    <p style="font-size: 15px" id="preview-location"> Country , City </p>
                                </li>
                                <li class="menu-info-item text-center" style="width: 11rem;">
                                    <div> Capacity </div>
                                    <p id="preview-capacity" style="font-size: 15px"> 4500 places </p>
                                </li>
                                <li class="menu-info-item text-center" style="width: 11rem;">
                                    <div> Address </div>
                                    <p id="preview-address" style="font-size: 15px"> Pavilhão Atlântico </p>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="edit-modal-content" style="height: 85vh">
                <div class="modal-header">
                    <button id="close-modal-button" data-dismiss="modal"></button>
                    <h4 class="modal-title" id="editModalLabel">Create New User </h4>
                </div>
                <div class="modal-body">
                    <form method='post' action="{{ route('storeUser')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">User Name</label>
                            <input id="name" type="text" name="name" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="text" name="email" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="birthdate" class="form-label">Birthdate</label>
                            <input id="birthdate" type="datetime-local" name="birthdate" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" name="password" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <input id="gender" type="text" name="gender" value="" class="input-group form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="profilePic" class="form-label">Profile Picture</label>
                            <input id="profilePic" type="file" name="profilePic" value="" class="input-group form-control">
                        </div>
                        <button type="submit" class="input-group btn btn-primary">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

@endsection