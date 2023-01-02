@extends('layouts.app')

@section('content')

<form method='post' action="{{ route('transferOwnership') }}" enctype="multipart/form-data"> 

 @csrf

<h2> Transfer the ownership of this event </h2>    

<div class="form-group mb-3">
    <label for="newuserid" class="form-label">New owner user id</label>
    <input id="newuserid" type="number" name="newuserid" placeholder="Id of the new owner user" class="input-group form-control">
    <label for="eventid" class="form-label">Event to transfer id</label>
    <input id="eventid" type="number" name="eventid" placeholder="Id of the event to transfer ownership" class="input-group form-control">
</div>
<button type="submit" class="input-group btn btn-success">
    Transfer
</button>
</form>
@endsection