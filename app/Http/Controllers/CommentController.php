<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->input('text'))
        $comment = new Comment;
        $comment->text = $request->input('text');
        $comment->userid = $request->input('userid');
        $comment->eventid = $request->input('eventid');
        $comment->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        // 
    }

    public function getComments(Request $request)
    {
        $comments = Comment::where('eventid', $request->input('event_id'))->get();
        for ($i = 0; $i < count($comments); $i++) {
            $comments[$i]->user_profilePic = $comments[$i]->user->profilepic;
            $comments[$i]->user_name = $comments[$i]->user->name;
            $comments[$i]->upvote_count = $comments[$i]->upvotes->count();
            if (Auth::user() && $comments[$i]->upvotes->where('userid', Auth::user()->userid)->first()) {
                $comments[$i]->upvoted = true;
            } else {
                $comments[$i]->upvoted = false;
            }
        }
        return Response($comments);
    }

    public function deleteComment(Request $request)
    {
        $comment = Comment::where('commentid', $request->input('comment_id'))->first();
        $comment->delete();
    }
    
}
