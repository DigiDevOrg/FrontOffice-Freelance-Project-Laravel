@extends('layouts/contentNavbarLayout')

<style>
  #carousel-container {
  position: relative;
  text-align: center;
}

#carousel-title {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 10px;
  font-size: 36px; /* Adjust the font size to your preference */
  white-space: nowrap; /* Prevent text from wrapping to a new line */
  overflow: hidden; /* Hide any overflowing text */
  text-overflow: ellipsis; /* Show an ellipsis (...) for very long text (optional) */
}

</style>

@section('content')
<div id="carousel-container">
  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="{{asset('assets/img/backgrounds/R.3png.png')}}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('assets/img/backgrounds/R2.jpg')}}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="{{asset('assets/img/backgrounds/R.3png.png')}}" alt="Third slide">
      </div>
    </div>
  </div>
  <div id="carousel-title">
    <h2 style = "font-size: 65px; color : black;">Welcome to Our Freelance Marketplace</h2>
    <p style = "color : black;">Find the perfect freelance services for your project needs.</p>
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
      <a href="{{route('all-categories')}}"><i class='bx bx-search bx-flashing' style="font-size: 3rem;"></i></a>
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

@if(Auth::check())
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12 text-center">
            <p>Welcome, {{ Auth::user()->name }}</p>
        </div>
    </div>
@else
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-12 text-center">
            <p>Join our freelance community today and get your project started.</p>
            <a href="/register" class="btn btn-primary">Sign Up</a>
        </div>
    </div>
@endif

@endsection
