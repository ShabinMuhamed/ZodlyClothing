<div class="preloader text-white fs-6 text-uppercase overflow-hidden"></div>

<div class="search-popup">
  <div class="search-popup-container">

    <form role="search" method="get" class="form-group" action="">
      <input type="search" id="search-form" class="form-control border-0 border-bottom"
        placeholder="Type and press enter" value="" name="s" />
      <button type="submit" class="search-submit border-0 position-absolute bg-white"
        style="top: 15px;right: 15px;"><svg class="search" width="24" height="24">
          <use xlink:href="#search"></use>
        </svg></button>
    </form>
  </div>
</div>

<nav class="navbar navbar-expand-lg bg-light text-uppercase fs-6 p-3 border-bottom fixed-top">
  <div class="container-fluid">

    <!-- Left (Logo) -->
    <a class="navbar-brand mx-auto" href="{{route('home')}}">
      <img src="{{asset('images/main-logo21.png')}}" alt="zodlyclothing" width="112" height="55" />
    </a>

    <!-- Center (Nav Links for Desktop only) -->
    <div class="collapse navbar-collapse justify-content-center d-none d-lg-flex">
      <ul class="navbar-nav gap-4">
        <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Shop</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
      </ul>
    </div>

    <!-- Right (Wishlist and Search Icons) -->
    <div class="d-flex align-items-center ms-auto gap-3">

      <!-- Wishlist Icon -->
      <a href="#" class="d-inline-block">
        <svg width="24" height="24" viewBox="0 0 24 24">
          <use xlink:href="#heart"></use>
        </svg>
      </a>

      <!-- Search Icon -->
      <a href="#search" class="search-button d-inline-block">
        <svg width="24" height="24" viewBox="0 0 24 24">
          <use xlink:href="#search"></use>
        </svg>
      </a>
    </div>

    <!-- Mobile Toggle (Only in Mobile) -->
    <button class="navbar-toggler d-lg-none me-3" type="button" data-bs-toggle="offcanvas"
  data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
  <span class="navbar-toggler-icon"></span>
</button>
  </div>
</nav>

<!-- Mobile Menu -->
<div class="offcanvas offcanvas-end d-lg-none" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('products') }}">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</div>


