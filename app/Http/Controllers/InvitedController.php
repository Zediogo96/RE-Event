<?php

namespace App\Http\Controllers;

use App\Models\Invited;
use App\Models\User;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\InviteRequest;


class InvitedController extends Controller
{
    /**
     * Accepts an invite by updating accept boolean of invite to true
     */
    public function get_id_from_email($email){
        $user = User::where('user_.email', '=',  $email)
                        ->firstOrFail();
        return $user->userid;
    }

    public function accept(Request $request){
        if (!Auth::check()) {return response(route('login'), 302);}

        $invited_user_id = Auth::user()->userid;
        $event_id = $request['event_id'];

        $invite = Invited::where('invited.inviteduserid', '=',  $invited_user_id)
                        ->where('invited.eventid', '=', $event_id)
                        ->first();

        $this->authorize('update', $invite);
        
        $invite->status = TRUE;
        $invite->save();

        User::join($event_id);

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

        $eventid = $request['event_id'];
        $invited_user_id = InvitedController::get_id_from_email($request['invited_user']);
        $inviter_user_id = Auth::user()->userid;

        $invite = Invited::where('invited.inviteduserid', '=',  $invited_user_id)
                        ->where('invited.inviteruserid', '=', $inviter_user_id)
                        ->where('invited.eventid', '=', $eventid)
                        ->first();
        if(!$invite){
            $inv = new Invited;
            $inv->inviteduserid = $invited_user_id;
            $inv->inviteruserid = $inviter_user_id;
            $inv->eventid = $eventid;
            $inv->save();
            return response(null, 200);
        }

        return response(null, 409);
    }

    public function getMyInvites(){
        if (!Auth::check()) {return response(route('login'), 302);}

        $inviter_user_id = Auth::user()->userid;

        $invite = Invited::where('invited.inviteduserid', '=',  $invited_user_id)
                        ->where('invited.inviteruserid', '=', $inviter_user_id)
                        ->where('invited.eventid', '=', $eventid)
                        ->first();
        if(!$invite){
            $inv = new Invited;
            $inv->inviteduserid = $invited_user_id;
            $inv->inviteruserid = $inviter_user_id;
            $inv->eventid = $eventid;
            $inv->save();
            return response(null, 200);
        }

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

