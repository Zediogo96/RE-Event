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
    public function accept($invited_user_id, $inviter_user_id, $event_id){
        $invite = Invited::find([$invited_user_id, $inviter_user_id,$event_id]);
        $this->authorize('join', $event);
        $this->authorize('update', $invite);

        $invite->status = TRUE;
        $invite->save();
        $event = $invite->event()->first();
        
        app('App\Http\Controllers\EventController')->join($invite->eventID);

        return response(null, 200);
    }

    /**
    * Rejects an invite by removing it from the database
    */
    public function reject($invited_user_id, $inviter_user_id,$event_id) {
        $invite = Invite::find([$invited_user_id, $inviter_user_id,$event_id]);
        $this->authorize('delete', $invite);
        $invite->delete();
        return response(null, 200);
    }

    public function create(InviteRequest $request) {
        $this->validated();
        if (!Auth::check()) return redirect('/login');

        $invited_user_id = $request['invited_user'];
        $inviter_user_id = Auth::user()->userID;
        $event_id = $request['event_id'];

        $invite = Invite::findOr([$invited_user_id, $inviter_user_id,$event_id], function($invited_user_id, $inviter_user_id,$event_id) {
            $inv = new Invited;
            $inv->invitedUserid = $invited_user_id;
            $inv->inviterUserID = $inviter_user_id;
            $inv->eventid = $event_id;
            $inv->save();
        });

        return response($request, 200);
    }

}