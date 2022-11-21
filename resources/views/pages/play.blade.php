@extends('layouts.app')

@section('content')

<!--TODO nao convidar a mim mesmo -->
<div onclick="createInvite(50, 8)" style = "cursor: pointer; position: relative;">
    SEND INVITE TO USER 50 FOR EVENT 8
</div>

<div  onclick="rejectInvite(8)" style = "cursor: pointer; position: relative;">
    REJECT INVITE TO EVENT 8 (user that is currently logged in = 50)
</div>

<div  onclick="acceptInvite(8)" style = "cursor: pointer; position: relative;">
    ACCEPT INVITE TO EVENT 8 (user that is currently logged in = 50)
</div>

@endsection