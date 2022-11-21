<?php

namespace App\Policies;

use App\Models\Event;
use App\Models\User;
use App\Models\Invited;
use App\Models\EventHost;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Event $event, Invited $invited)
    {
        return ($user->userID == $invited->userID && $event->eventID == $invited->eventID && $invited->status == TRUE) || ($event->isPrivate == FALSE);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Event $event, $hostid)   //changed here
    {
        return $user->userID == $eventHost->userID && $event->eventID == $eventHost->eventID;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Event $event, EventHost $eventHost)
    {
        return $user->userID == $eventHost->userID && $event->eventID == $eventHost->eventID;
    }
    

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Event $event, EventHost $eventHost)
    {
        return $user->userID == $eventHost->userID && $event->eventID == $eventHost->eventID;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Event $event, EventHost $eventHost)
    {
        return $user->userID == $eventHost->userID && $event->eventID == $eventHost->eventID;
    }



    public function isHost(User $user, Event $event, EventHost $eventHost)
    {
        //dd($user->userid === $eventHost->userid);
        return $user->userid === $eventHost->userid && $event->eventid === $eventHost->eventid;
    }


}
