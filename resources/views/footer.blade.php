<footer id="footer" class="mt-5 bg-light text-dark pt-5">
  <div class="container">
    <div class="row d-flex flex-wrap justify-content-between py-4">

      <!-- Brand + Social Links -->
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <div class="footer-menu">
          <div class="footer-intro mb-3">
            <a href="{{ url('/') }}">
              <img src="{{ asset('images/main-logo21.png') }}" alt="logo" style="max-width: 160px;">
            </a>
          </div>
          <p class="mb-3">Premium quality t-shirts crafted for style and comfort. Connect with us on WhatsApp to place your order.</p>
          <div class="social-links mt-3">
            <ul class="list-unstyled d-flex gap-3">
              <li><a href="#" class="text-secondary"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="https://www.instagram.com/yourbrand/" class="text-secondary" target="_blank"><i class="fab fa-instagram"></i></a></li>
              <li><a href="https://wa.me/919000000000" class="text-secondary" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
            </ul>
          </div>
          <div class="mt-3">
            <a href="https://www.instagram.com/yourbrand/" target="_blank" class="btn btn-dark btn-sm px-4">
              <i class="fab fa-instagram me-2"></i> Follow us
            </a>
          </div>
        </div>
      </div>

      <!-- Quick Links -->
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <h5 class="widget-title text-uppercase fw-semibold mb-3">Quick Links</h5>
        <ul class="list-unstyled text-uppercase fs-6">
          <li class="mb-2"><a href="{{ route('home') }}">Home</a></li>
          <li class="mb-2"><a href="{{ route('products') }}">Shop</a></li>
          <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
      </div>

      <!-- Support -->
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <h5 class="widget-title text-uppercase fw-semibold mb-3">Support</h5>
        <ul class="list-unstyled text-uppercase fs-6">
          <li class="mb-2"><a href="#">FAQs</a></li>
          <li class="mb-2"><a href="#">Shipping & Delivery</a></li>
          <li><a href="#">Return Policy</a></li>
        </ul>
      </div>

      <!-- Contact + Newsletter -->
      <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
        <h5 class="widget-title text-uppercase fw-semibold mb-3">Get In Touch</h5>
        <p class="mb-2">Email: <a href="mailto:support@zodlyclothing.com">support@zodlyclothing.com</a></p>
        <p class="mb-3">WhatsApp: <a href="https://wa.me/919000000000" target="_blank">+91 90000 00000</a></p>

        <h5 class="widget-title text-uppercase fw-semibold mt-4 mb-2">Newsletter</h5>
        <p class="mb-2">Stay updated with new arrivals & offers.</p>
        <form id="form">
          <div class="input-group input-group-sm">
            <input type="text" name="email" class="form-control" placeholder="Enter your email">
            <button class="btn btn-dark text-uppercase">Sign Up</button>
          </div>
        </form>
      </div>

    </div>
  </div>

  <!-- Bottom Bar -->
  <div class="border-top py-4 text-center">
    <div class="container">
      <p class="mb-0 small">© {{ date('Y') }} ZodlyClothing. All rights reserved.</p>
    </div>
  </div>
</footer>
