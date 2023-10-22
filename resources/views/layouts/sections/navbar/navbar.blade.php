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
    <img src="{{ asset('assets/img/avatars/DigiDevLogo.png') }}" style = "width : 140px ;">
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
      @isset($categories)
        @foreach ($categories as $category)
          <li><a class="dropdown-item" href="#">{{ $category->description }}</a></li>
        @endforeach
      @endisset
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

