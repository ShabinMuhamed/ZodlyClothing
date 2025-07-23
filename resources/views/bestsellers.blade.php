<section id="editors-picks" class="product-carousel py-5 position-relative overflow-hidden">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
      <h4 class="text-uppercase">Feautured Styles</h4>
      <a href="{{ route('products') }}" class="btn-link">View All Products</a>
    </div>

    <div class="swiper product-swiper open-up" data-aos="zoom-out">
      <div class="swiper-wrapper d-flex">
        @foreach ($editorsPicks as $product)
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder position-relative">
                <a href="{{ route('product.details', $product->id) }}">
                  <img 
                    src="{{ asset('storage/' . ($product->images->first()->image_path ?? 'images/default.jpg')) }}" 
                    alt="{{ $product->name }}" 
                    class="product-image img-fluid"
                    style="width: 230px; height: 300px; object-fit: cover;">
                </a>

                <a href="#" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="#heart"></use>
                  </svg>
                </a>

                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">
                    <a href="{{ route('product.details', $product->id) }}">{{ $product->name }}</a>
                  </h5>
                  <span class="text-dark">₹{{ number_format($product->price, 2) }}</span>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="swiper-pagination"></div>
    </div>

    <!-- Swiper arrows (if used) -->
    <div class="icon-arrow icon-arrow-left">
      <svg width="50" height="50" viewBox="0 0 24 24">
        <use xlink:href="#arrow-left"></use>
      </svg>
    </div>
    <div class="icon-arrow icon-arrow-right">
      <svg width="50" height="50" viewBox="0 0 24 24">
        <use xlink:href="#arrow-right"></use>
      </svg>
    </div>
  </div>
</section>
