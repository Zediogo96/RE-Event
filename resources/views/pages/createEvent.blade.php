@extends('layouts.app')

@section('content')

<form method='post' action="{{ route('storeEvent')}}" enctype="multipart/form-data">

 @csrf

<h2> Edit Event Details</h2>    

<div class="form-group mb-3">
    <label for="name" class="form-label">Event Name</label>
    <input id="name" type="text" name="name" placeholder="Event name" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="description" class="form-label">Description</label>
    <input id="description" type="text" name="description" placeholder="Event description" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="date" class="form-label">Date</label>
    <input id="date" type="datetime-local" name="date" placeholder="Event date" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="capacity" class="form-label">Capacity</label>
    <input id="capacity" type="number" name="capacity" placeholder="Event capacity" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="city" class="form-label">City</label>
    <input id="city" type="text" name="city" placeholder="City" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="country" class="form-label">Country</label>
    <input id="country" type="text" name="country" placeholder="Country" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="price" class="form-label">Price</label>
    <input id="price" type="number " min= "1" step="any" name="price" placeholder="Price" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="address" class="form-label">Address</label>
    <input id="address" type="text" name="address" placeholder="Venue address" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="tag" class="form-label">Event Tag</label>
    <input id="tag" type="text" name="tag" placeholder="Tag - a word/category for your new event (e.g. sports, technology...)" class="input-group form-control">
</div>
<div class="form-group mb-3">
    <label for="img" class="form-label">Event Image</label>
    <input id="img" type="file" name="img" placeholder="Upload an image for you event" class="input-group form-control">
</div>
<div class="input-group form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name = "isprivate">
  <span class="lever"></span>
  </span>
  <label class="form-check-label" for="flexSwitchCheckDefault">Private</label>
</div>
<!-- <div class="input-group form-check form-switch">
      <label>
        Public
        <input type="checkbox" role = "switch" checked="checked">
        <span class="lever"></span>
        Private
      </label>
    </div> -->

<button type="submit" class="input-group btn btn-primary">
    Submit
</button>
</form>
@endsection