@extends('layouts.app')

@section('content')

<form method='post' action="{{ route('updateEvent', ['eventid' => $event->eventid]) }}" enctype="multipart/form-data">

 @csrf

<h2> Edit Event Details</h2>    

<div class="form-group mb-3">
    <label for="name" class="form-label">Event Name</label>
    <input id="name" type="text" name="name" value="{{ $event->name }}" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="description" class="form-label">Description</label>
    <input id="description" type="text" name="description" value="{{ $event->description }}" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="date" class="form-label">Date</label>
    <input id="date" type="datetime" name="date" value="{{ $event->date }}" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="capacity" class="form-label">Capacity</label>
    <input id="capacity" type="number" name="capacity" value="{{ $event->capacity }}" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="city" class="form-label">City</label>
    <input id="city" type="text" name="city" value="{{ $event->city->name }}" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="country" class="form-label">Country</label>
    <input id="country" type="text" name="country" value="{{ $event->city->country->name }}" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="price" class="form-label">Price</label>
    <input id="price" type="number " min= "1" step="any" name="price" value="{{ $event->price }}" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="address" class="form-label">Address</label>
    <input id="address" type="text" name="address" value="{{ $event->address }}" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="tag" class="form-label">Event Tag</label>
    <input id="tag" type="text" name="tag" value="{{ $event->eventTag->name }}" class="input-group form-control">
</div>
<div class="input-group switch round blue-white-switch mt-2">
      <label>
        Public
        <input type="checkbox" checked="checked">
        <span class="lever"></span>
        Private
      </label>
    </div>

<button type="submit" class="input-group btn btn-primary">
    Submit
</button>
</form>
@endsection