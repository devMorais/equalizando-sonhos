<section id="testimonials" class="testimonials section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $testimonialsConfig->title }}</h2>
        <p>{{ $testimonialsConfig->description }}</p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
{
"loop": true,
"speed": 600,
"autoplay": {
  "delay": 5000
},
"slidesPerView": "auto",
"pagination": {
  "el": ".swiper-pagination",
  "type": "bullets",
  "clickable": true
},
"breakpoints": {
  "320": {
    "slidesPerView": 1,
    "spaceBetween": 40
  },
  "1200": {
    "slidesPerView": 3,
    "spaceBetween": 10
  }
}
}
</script>
            <div class="swiper-wrapper">
                @foreach ($testimonials as $testimonial)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <h3>{{ $testimonial->name }}</h3>
                            <h4>{{ $testimonial->position }}</h4>
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>{{ $testimonial->testimonial }}</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
