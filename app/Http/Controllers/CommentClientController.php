<?php

namespace App\Http\Controllers;

use App\Models\CommentClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class CommentClientController extends Controller
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

       $this->validate($request, [
        'post_id' => 'required|exists:posts,id',
        'message' => 'required',
    ]);

    // Create a new comment and associate it with the post
    $comment = CommentClient::create([
        'user_id' => auth()->id(),
        'post_id' => $request->post_id,
        'message' => $request->message,
    ]);

    // Redirect back to the post's page after adding the comment
    return redirect()->route('posts.show', $request->post_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommentClient  $commentClient
     * @return \Illuminate\Http\Response
     */
    public function show(CommentClient $commentClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommentClient  $commentClient
     * @return \Illuminate\Http\Response
     */
    public function edit(CommentClient $commentClient)
    {
        if ($commentClient->user_id !== auth()->id()) {
            return redirect()->route('posts.show', $commentClient->post_id)->with('error', 'You are not authorized to edit this comment.');
        }
    
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommentClient  $commentClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommentClient $commentClient)
    {
        $this->validate($request, [
            'message' => 'required',
        ]);
      
        $commentClient->message = $request->input('message');
        $commentClient->save();
        return response()->json(['message' => 'Comment updated successfully']);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommentClient  $commentClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommentClient $commentClient)
    {
        if ($commentClient->user_id !== auth()->id()) {
            return redirect()->route('posts.show', $commentClient->post_id)->with('error', 'You are not authorized to delete this comment.');
        }
    
        $post_id = $commentClient->post_id;
        $commentClient->delete();
    
        return redirect()->route('posts.show', $post_id)->with('success', 'Comment deleted successfully.');
   
    }
}
