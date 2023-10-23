@extends("layouts/contentNavbarLayout")
@section("title", "Editer un post")
@section("content")

<h1>Ajouter ou Editer un post</h1>

<!-- Si nous avons un Post $post -->
@if (isset($review))

<!-- Le formulaire est géré par la route "reviews.update" -->
<form method="POST" action="{{ route('reviews.update', $review) }}" enctype="multipart/form-data">

    @method('PUT')

@else

<!-- Le formulaire est géré par la route "reviews.store" -->
<form method="POST" action="{{ route('reviews.store') }}" enctype="multipart/form-data">

@endif

<!-- Le token CSRF -->
@csrf

<p>
    <label for="rating">Rating</label><br/>

    <input type="number" name="rating" class="form-control" id="rating" value="{{ isset($review->rating) ? $review->rating : old('rating') }}" placeholder="Le rating du post" >

    @error("rating")
    <div>{{ $message }}</div>
    @enderror
</p>

<p>
    <label for="comment">Comment</label><br/>

    <textarea name="comment" class="form-control" id="comment" lang="fr" rows="10" cols="50" placeholder="Le comment du review">{{ isset($review->comment) ? $review->comment : old('comment') }}</textarea>

    @error("comment")
    <div>{{ $message }}</div>
    @enderror
</p>

<input type="submit" class="btn btn-primary" name="valider" value="Valider">

</form>

@endsection
