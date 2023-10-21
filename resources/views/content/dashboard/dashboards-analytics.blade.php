@extends('layouts/contentNavbarLayout')

@section('title', 'Welcome to Our Freelance Marketplace')

@section('content')
<div class="row">
  <div class="col-md-12 welcome-section text-center text-black" style=" height: 80vh; display: flex; flex-direction: column; justify-content: center;">
    <h1 style="font-size: 4rem; color: black;">Welcome to Our Freelance Marketplace</h1>
    <p>Find the perfect freelance services for your project needs.</p>
  </div>
</div>

<div class="row" style="margin-top: 30px;">
  <div class="col-md-12 text-center">
    <h2  style="font-size: 2.5rem; color: black;">How It Works</h2>
  </div>
</div>

<div class="row" style="margin-top: 50px;">
  <div class="col-md-4">
    <div class="card" style="height: 150px;">
      <div class="card-body d-flex flex-column  align-items-center">
      <i class='bx bx-search bx-flashing' style="font-size: 3rem;"></i>
        <p class="text-center" style="margin-top: 20px;">Browse categories to find the service you need.</p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card" style="height: 150px;">
      <div class="card-body d-flex flex-column  align-items-center">
      <i class='bx bx-list-ul bx-burst' style="font-size: 3rem;"></i>
        <p class="text-center" style="margin-top: 20px;">Explore the profiles of talented freelancers.</p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card" style="height: 150px;">
      <div class="card-body d-flex flex-column  align-items-center">
      <i class='bx bx-book-reader bx-flashing' style="font-size: 3rem;" ></i>
        <p class="text-center" style="margin-top: 20px;"> Read client reviews to make an informed choice.</p>
      </div>
    </div>
  </div>
</div>

<div class="row" style="margin-top: 60px;">
  <div class="col-md-12 text-center">
    <h2  style="font-size: 2.5rem; color: black;">Why Choose Us</h2>
  </div>
</div>

<div class="row" style="margin-top: 50px;">
  <div class="col-md-4">
    <div class="card" style="height: 150px;">
      <div class="card-body d-flex flex-column  align-items-center">
      
      <i class='bx bx-bulb bx-flashing' style="font-size: 3rem;" ></i>
        <p class="text-center" style="margin-top: 20px;">Access to a wide range of skilled freelancers.</p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card" style="height: 150px;">
      <div class="card-body d-flex flex-column  align-items-center">
      <i class='bx bxs-check-shield bx-flashing' style="font-size: 3rem;"  ></i>
        <p class="text-center" style="margin-top: 20px;">Secure and hassle-free hiring process.</p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card" style="height: 150px;">
      <div class="card-body d-flex flex-column  align-items-center">
      <i class='bx bx-star bx-flashing' style="font-size: 3rem;"  ></i>
        <p class="text-center" style="margin-top: 20px;">Client reviews for transparent decision-making.</p>
      </div>
    </div>
  </div>
</div>

<div class="row" style="margin-top: 60px;">
  <div class="col-md-12 text-center">
    <h2 style="font-size: 2.5rem; color: black;">Get Started</h2>
  </div>
</div>

<div class="row" style="margin-top: 50px;">
  <div class="col-md-12 text-center">
    <p>Join our freelance community today and get your project started.</p>
    <a href="/register" class="btn btn-primary">Sign Up</a>
  </div>
</div>
@endsection
