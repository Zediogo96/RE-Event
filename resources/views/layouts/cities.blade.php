@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            City List
        </div>

        @foreach($cities as $city)
          <div>
            {{ $city['name'] }} - {{ $city->country->name}}
          </div>
        @endforeach

    </div>
</div>
@endsection