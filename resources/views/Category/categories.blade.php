@extends('layouts/contentNavbarLayout')
@section('content')
    <h1>All Categories</h1>

    <ul>
        @foreach($categories as $category)
        <a href="{{ route('services-by-category', $category) }}">{{ $category->name }}</a>
        @endforeach
    </ul>
@endsection