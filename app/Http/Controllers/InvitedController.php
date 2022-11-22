<?php

namespace App\Http\Controllers;

use App\Models\Invited;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\InviteRequest;


class InvitedController extends Controller
{
    /**
     * Accepts an invite by updating accept boolean of invite to true
     */
    public function accept(Request $request){
        if (!Auth::check()) {return response(route('login'), 302);}

        $invited_user_id = Auth::user()->userid;
        $event_id = $request['event_id'];

        $invite = Invited::where('invited.inviteduserid', '=',  $invited_user_id)
                        ->where('invited.eventid', '=', $event_id)
                        ->first();

        $this->authorize('update', $invite);
        $this->authorize('join', $event);

        $invite->status = TRUE;
        $invite->save();
        $event = $invite->event()->first();
        
        app('App\Http\Controllers\EventController')->join($invite->eventid);

        return response(null, 200);
    }

    /**
    * Rejects an invite by removing it from the database
    */
    //TODO pedir o inviter_user_id e se rejeitar 1 fica com todos os outros para esse evento mas se aceitar 1, todos os outros invites para esse evento de pessoas diferentes apagam se
    public function reject(Request $request) {
        if (!Auth::check()) {return response(route('login'), 302);}

        $invited_user_id = Auth::user()->userid;
        $event_id = $request['event_id'];

        $invite = Invited::where('invited.inviteduserid', '=',  $invited_user_id)
                        ->where('invited.eventid', '=', $event_id)
                        ->firstOrFail();
        
        if(!$invite){
            return response("invite doesnt exist", 313);
        }
        
        $this->authorize('delete', $invite);
        $invite->delete();
        
        return response(null, 200);
    }

    public function create(InviteRequest $request) {
        //$this->validate($request); 
        if (!Auth::check()) {return response(route('login'), 302);}

        $invited_user_id = $request['invited_user'];
        $inviter_user_id = Auth::user()->userid;
        $event_id = $request['event_id'];

        $invite = Invited::where('invited.inviteduserid', '=',  $invited_user_id)
                        ->where('invited.inviteruserid', '=', $inviter_user_id)
                        ->where('invited.eventid', '=', $event_id)
                        ->first();
        if(!$invite){
            $inv = new Invited;
            $inv->inviteduserid = $invited_user_id;
            $inv->inviteruserid = $inviter_user_id;
            $inv->eventid = $event_id;
            $inv->save();
            return response(null, 200);
        }

        return response(null, 409);
    }

}
/* 
TODO nao convidar a mim mesmo 
<div onclick="createInvite(50, 8)" style = "cursor: pointer; position: relative;">
    SEND INVITE TO USER 50 FOR EVENT 8
</div>

<div  onclick="rejectInvite(8)" style = "cursor: pointer; position: relative;">
    REJECT INVITE TO EVENT 8 (user that is currently logged in = 50)
</div>

<div  onclick="acceptInvite(8)" style = "cursor: pointer; position: relative;">
    ACCEPT INVITE TO EVENT 8 (user that is currently logged in = 50)
</div> */

