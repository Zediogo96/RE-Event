@extends('layouts.app')

@section('content')

<form method='post' action="{{ route('deleteEvent') }}" enctype="multipart/form-data"> 

 @csrf

<h2> Delete this event </h2>    

<div class="form-group mb-3">
    <label for="eventid" class="form-label">Event to delete id</label>
    <input id="eventid" type="number" name="eventid" placeholder="Id of the event delete" class="input-group form-control">
</div>
<button type="submit" class="input-group btn btn-success">
    Delete
</button>
</form>
@endsection