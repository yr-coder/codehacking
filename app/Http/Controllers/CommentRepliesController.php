<?php

namespace App\Http\Controllers;

use App\CommentReply;
use App\Comment;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentRepliesController extends Controller
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
        //
    }

    public function createReply(Request $request)
    {

        $user = Auth::user();

        $data = [

            'comment_id'=>$request->comment_id,
            'author'=>$user->name,
            'email'=>$user->email,
            'is_active'=>1,
            'photo'=>$user->photo->file,
            'body'=>$request->body

        ];

        CommentReply::create($data);

        return redirect()->back();

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $replies = Comment::findOrFail($id)->replies;

        return view('admin.comments.replies.show', compact('replies'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        CommentReply::findOrFail($id)->update($request->all());

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reply = CommentReply::findOrFail($id);

        $reply->delete();

        return redirect()->back();
    }
}
