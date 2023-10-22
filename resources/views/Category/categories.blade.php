@extends('layouts/contentNavbarLayout')
@section('content')
<div class="row">
    @php
    $classNames = ['bg-warning', 'bg-danger', 'bg-success', 'bg-info', 'bg-primary', 'bg-secondary'];
    shuffle($classNames);
    $classNamesCount = count($classNames);
    @endphp

    @foreach ($categories as $category)
    @php
    $cssClass = $classNames[array_rand($classNames)]; 
    @endphp

    <div class="col-md-6 col-xl-4">
        <div class="card {{ $cssClass }} text-white mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="card-title" style="color : white;"> <a href="{{ route('services-by-category', $category) }}" style = "color : white; ">{{ $category->name }}</a></h5>
                </div>
               
            </div>
            <div class="card-body">
                <p class="card-text">{{ $category->description }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

