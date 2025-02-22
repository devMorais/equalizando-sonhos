<section id="portfolio" class="portfolio section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $portfolioConfig->title }}</h2>
        <p>{{ $portfolioConfig->description }}</p>
    </div><!-- End Section Title -->
    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">Todas</li>
                @foreach ($portfolioCategories as $category)
                    <li data-filter=".filter-{{ $category->slug }}">{{ $category->title }}</li>
                @endforeach
            </ul>
            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($portfolioItems as $portfolioItem)
                    <div
                        class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $portfolioItem->category->slug }}">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset($portfolioItem->image) }}" class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>{{ $portfolioItem->title }}</h4>
                                <p>{{ \Illuminate\Support\Str::limit($portfolioItem->description, 100) }}</p>
                                <a href="{{ asset($portfolioItem->image) }}" title="{{ $portfolioItem->title }}"
                                    data-gallery="portfolio-gallery-{{ $portfolioItem->category->slug }}"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
{{-- Missing required parameter for [Route: portfolio.details] [URI: portfolio/{slug}] [Missing parameter: slug]. --}}
