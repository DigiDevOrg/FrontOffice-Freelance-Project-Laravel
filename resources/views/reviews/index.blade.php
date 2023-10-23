@extends("layouts/contentNavbarLayout")
@section("title", "Tous les articles")
@section("content")

	<h1> Reviews</h1>

	<p>
		<!-- Lien pour créer un nouvel article : "posts.create" -->
		<a href="{{ route('reviews.create') }}" title="Créer un article" >Add review</a>
	</p>

	<!-- Le tableau pour lister les articles/posts -->
	<table border="1" >
		<thead>
			
		</thead>
		<tbody>
			<!-- On parcourt la collection de Post -->
			@foreach ($reviews as $review)
			<div class="card m-2" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">rating : {{ $review->rating }}</h5>
			
			<h4 class="card-title">Comment  :{{ $review->comment }}</h4>
			<h4 class="card-title">Freelancer: {{ $review->freelancerId }}</h4>
		    <h4 class="card-title">Author: {{ $review->author->name }}</h4>
			
			<a href="{{ route('reviews.show', $review) }}" class="btn btn-secondary">learn more </a>
			<div></div>
			@auth
                @if (auth()->user()->id === $review->author_id)
				<h7>it's your reviews  </h7>
                   
                    <form method="POST" action="{{ route('reviews.destroy', $review) }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                @endif
            @endauth
		</div>
    </div>
			@endforeach
		</tbody>
	</table>
	
@endsection