@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-8 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          @foreach ($services as $service)
          <div class="card-body">
            <h5 class="card-title text-primary">Congratulations {{ $service->user_name }}! 🎉</h5>
            <p class="mb-4">You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in your profile.</p>

            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
          </div>
          @endforeach
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
          </div>
        </div>
      </div>
    </div>
  </div>
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
                    <h5 class="card-title" style="color : white;"><a href="" style="color : white;">{{ $category->name }}</a></h5>
                </div>
                
            </div>
            <div class="card-body">
                <p class="card-text">{{ $category->description }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
  

</div>
<div class="row">
  
  <!--/ Transactions -->
</div>
@endsection
