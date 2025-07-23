<section id="billboard" class="banner-wrapper position-relative"> 
  <img src="{{ asset('images/bg-image.jpeg') }}" alt="New Collection" class="img-fluid w-100 vh-100 object-fit-cover"> <!-- Optional dark overlay -->
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.4); z-index: 1;"></div> <!-- Text Overlay -->
  <div class="banner-content position-absolute top-50 start-50 translate-middle text-center text-white z-2">
    <h1 class="display-3 fw-bold text-uppercase mb-3" data-aos="fade-up">THINK DIFFERENT KEEP IT CLASSY</h1>
    <p class="lead mb-4" data-aos="fade-up" data-aos-delay="200">Explore our latest arrivals in style</p> 
<a href="{{ route('products') }}" class="btn custom-btn px-5 py-3 text-uppercase fw-bold" data-aos="fade-up" data-aos-delay="400">
      Shop Now
    </a>
    </div>
</section>