<?php

namespace App\Http\Controllers;

use App\Models\ReviewsReplies;
use Illuminate\Http\Request;

class ReviewsRepliesController extends Controller
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
        // Validation rules for the comment
        $this->validate($request, [
            'review_id' => 'required|exists:reviews,id',
            'message' => 'required',
        ]);
 
        // Create a new comment and associate it with the post
        $reviewsReplies = ReviewsReplies::create([
            'user_id' => auth()->id(),
            'review_id' => $request->review_id,
            'message' => $request->message,
        ]);
 
        // Redirect back to the post's page after adding the comment
        return redirect()->route('reviews.show', $request->review_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReviewsReplies  $reviewsReplies
     * @return \Illuminate\Http\Response
     */
    public function show(ReviewsReplies $reviewsReplies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReviewsReplies  $reviewsReplies
     * @return \Illuminate\Http\Response
     */
    public function edit(ReviewsReplies $reviewsReplies)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReviewsReplies  $reviewsReplies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReviewsReplies $reviewsReplies)
    {
        
        // Validate the request
        $this->validate($request, [
            'message' => 'required',
        ]);

        // Check if the authenticated user is the owner of the comment
    

        // Update the comment with the new message
        $reviewsReplies->message = $request->input('message');
        $reviewsReplies->save();

        // You can return a success response here, e.g., redirect to the post's page
        return response()->json(['message' => 'Comment updated successfully']);
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReviewsReplies  $reviewsReplies
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReviewsReplies $reviewsReplies)
    {
        if ($reviewsReplies->user_id !== auth()->id()) {
            return redirect()->route('reviews.index', $reviewsReplies->review_id)->with('error', 'You are not authorized to delete this comment.');
        }
    
        $review_id = $reviewsReplies->review_id;
        $reviewsReplies->delete();
    
        return redirect()->route('reviews.show', $reviews_id)->with('success', 'review replies deleted successfully.');
    }
}
