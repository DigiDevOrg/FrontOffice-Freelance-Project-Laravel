@extends("layouts/contentNavbarLayout")
@section("title", "Tous les articles")
@section("content")

	<h1>Tous les articles</h1>

	<!-- Le tableau pour lister les articles/posts -->
	<table border="1" >
		<thead>
			
		</thead>
		<tbody>
			<!-- On parcourt la collection de Post -->
			@foreach ($reviews as $review)
			@if ($review->author_id === auth()->id())
			<div class="card m-2" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">rating : {{ $review->rating }}</h5>
			
			<h4 class="card-title">Comment  :{{ $review->comment }}</h4>
			
			<a href="{{ route('reviews.show', $review) }}" class="btn btn-secondary">learn more </a>
			@auth
                @if (auth()->user()->id === $review->author_id)
                    <a href="{{ route('reviews.edit', $review) }}" class="btn btn-secondary">Modifier</a>
                    <form method="POST" action="{{ route('reviews.destroy', $review) }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                @endif
            @endauth
		</div>
    </div>
	@endif
			@endforeach
		</tbody>
	</table>
	
@endsection