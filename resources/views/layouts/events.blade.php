@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Event List
        </div>

        @foreach($events as $event)
          <div>
            {{ $event['name'] }} 
          </div>
        @endforeach

    </div>
</div>
@endsection