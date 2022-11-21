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
    public function reject(Request $request) {
        if (!Auth::check()) {return response(route('login'), 302);}

        $invited_user_id = Auth::user()->userid;
        $event_id = $request['event_id'];

        $invite = Invited::where('invited.inviteduserid', '=',  $invited_user_id)
                        ->where('invited.eventid', '=', $event_id)
                        ->first();
        
        if(!$invite){
            return response("invite doesnt exist", 313);
        }
        
        $this->authorize('delete', $invite);
        return $invite;
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