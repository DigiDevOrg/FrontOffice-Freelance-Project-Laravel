@php
$containerNav = $containerNav ?? 'container-fluid';
$navbarDetached = ($navbarDetached ?? '');

@endphp
  
<style>
.navbar-nav .nav-link:hover {
  color: #696CFF; /* Change the text color to your desired color */
}
</style>
<!-- Navbar -->
<nav class="layout-navbar {{$containerNav}} navbar navbar-expand-xl {{$navbarDetached}} align-items-center bg-navbar-theme" id="layout-navbar">

  <!-- Logo -->
  <a href="{{url('/')}}" class="navbar-brand">
    <span class="app-brand-logo demo">
      @include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])
    </span>
    <span class="app-brand-text demo menu-text fw-bolder">{{config('variables.templateName')}}</span>
  </a>

  <!-- Centered Links -->
  <ul class="navbar-nav mx-auto">
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Explore</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Blogs</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Blogs</a>
    </li>
    <li class="nav-item dropdown"> <!-- This is a dropdown -->
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown">
       Services
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
      @foreach ($categories as $category)
        <li><a class="dropdown-item" href="#">{{ $category->name }}</a></li>
      @endforeach
      </ul>
    </li>
  </ul>

  <!-- User Dropdown -->
  <ul class="navbar-nav">
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <!-- User dropdown menu items here -->
        <!-- ... -->
      </ul>
    </li>
  </ul>

</nav>
<!-- / Navbar -->

