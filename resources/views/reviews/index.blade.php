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
		@php
    $classNames = [ 'bg-info'];
    shuffle($classNames);
    $classNamesCount = count($classNames);
    @endphp

			<!-- On parcourt la collection de Post -->
			@foreach ($reviews as $review)
			@php
    $cssClass = $classNames[array_rand($classNames)]; 
    @endphp
	<div class="col-md-6 col-xl-6">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card m-2" style="width: 88rem;">
                <div class="card-body">
            <h4 class="card-title" >rating : {{ $review->rating }}</h4>
			
			<h4 class="card-title" >Comment  :{{ $review->comment }}</h4>
			<h4 class="card-title" >Freelancer: {{ $review->freelancer->name }}</h4>
		    <h4 class="card-title" >Author: {{ $review->author->name }}</h4>
			</div>
			<a href="{{ route('reviews.show', $review) }}" >learn more </a>
			

			@auth
                @if (auth()->user()->id === $review->author_id)
				<h7>you are the author of this review   </h7>
                   
                    <form method="POST" action="{{ route('reviews.destroy', $review) }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                @endif
            @endauth
		</div>
    </div>
	</div>
			@endforeach
		</tbody>
	</table>
	
@endsection