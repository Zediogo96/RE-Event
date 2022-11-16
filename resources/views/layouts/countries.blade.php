@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Country cities list
        </div>

        @foreach($countries as $country)
          <div>
            {{ $country['name'] }} - {{ $country->cities->pluck('name') }} 
          </div>
        @endforeach

    </div>
</div>
@endsection