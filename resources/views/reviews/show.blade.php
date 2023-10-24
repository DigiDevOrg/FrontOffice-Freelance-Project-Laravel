@extends("layouts/contentNavbarLayout")
@section("rating", $review->rating)
@section("content")

<div class="card m-2" style="width: 80rem;">
        <div class="card-body">
        <h4 class="card-title">rating          : {{ $review->rating }}</h4>
			
			<h4 class="card-title">Comment       :{{ $review->comment }}</h4>
			<h4 class="card-title">Freelancer    : {{ $review->freelancer->name }}</h4>
		    <h4 class="card-title">Author         : {{ $review->author->name }}</h4>
</div></div>
	<p><a href="{{ route('reviews.index') }}" title="Retourner aux articles" >Retourner aux reviews</a></p>
	
    <h2>Comments</h2>


<!-- Add a new comment form -->
@auth
    <form action="{{ route('reviewsReplies.store') }}" method="post">
        @csrf
        <input type="hidden" name="review_id" value="{{ $review->id }}">
        <textarea name="message"  class="form-control" placeholder="Add a comment"></textarea>
        <button type="submit" class="btn btn-primary mt-2 mb-4">Submit Comment</button>
    </form>
@else
    <p>Please <a href="{{ route('login') }}">log in</a> to leave a comment.</p>
@endauth

@if ($review->reviewsReplies->count() > 0)
    @foreach ($review->reviewsReplies as $reviewsReplies)
    <div class="card mb-3">
  <div class="card-body">
        
            <strong>{{ $reviewsReplies->user->name }}:</strong>
            <span class="comment-content" data-comment-id="{{ $reviewsReplies->id }}">{{ $reviewsReplies->message }}</span>
            
            @auth
                @if ($reviewsReplies->user_id === auth()->id())
                    <div style="display: flex; align-items: center;">
                        <form action="{{ route('reviewsReplies.destroy', $reviewsReplies) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
        </div>
    @endforeach
@else
    <p>No comments yet.</p>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Function to enable editing
    function enableCommentEditing(commentId) {
        var commentContent = $(`.reviewsReplies-content[data-reviewsReplies-id="${commentId}"]`);
        var editButton = $(`.edit-reviewsReplies[data-reviewsReplies-id="${commentId}"]`);
        var commentInput = $(`<input type="text" class="comment-input" data-comment-id="${commentId}" value="${commentContent.text()}">`);

        // Replace the comment content with an input field
        commentContent.replaceWith(commentInput);

        // Change the button to "Save"
        editButton.text("Save");

        // Handle the "Save" button click
        editButton.off("click").click(function () {
            var updatedComment = commentInput.val();

            // Send an AJAX request to update the comment
            $.ajax({
                url: `{{ route('reviewsReplies.update', '') }}/${reviewsRepliesId}`,
                type: "PUT",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "message": updatedReviewsReplies
                },
                success: function (data) {
                    // Update the comment content
                    reviewsRepliesContent.text(updatedReviewsReplies);

                    // Change the button back to "Edit"
                    editButton.text("Edit");

                    // Re-enable editing
                    enableCommentEditing(reviewsRepliesId);
                },
                error: function (xhr) {
                    // Handle errors if needed
                    console.log(xhr.responseText);
                }
            });
        });
    }

    $(".edit-reviewsReplies").click(function () {
        var reviewsRepliesId = $(this).data("reviewsReplies-id");
        enableCommentEditing(reviewsRepliesId);
    });
});

</script>









@endsection