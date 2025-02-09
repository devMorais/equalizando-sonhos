<section id="about" class="about section section-bg dark-background">
    <div class="container position-relative">
        <div class="row gy-5">
            <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
                <h3>{{ $aboutConfig->title }}</h3>
                <p>
                    {{ $aboutConfig->description }}
                </p>
                @if ($aboutConfig->button_text && $aboutConfig->button_url)
                    <a href="{{ $aboutConfig->button_url }}" class="about-btn align-self-center align-self-xl-start">
                        <span>{{ $aboutConfig->button_text }}</span> <i class="bi bi-chevron-right"></i>
                    </a>
                @endif
            </div>
            <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4">
                    @foreach ($aboutItens as $item)
                        <div class="col-md-6 icon-box position-relative">
                            {{-- <i class="{{ $item->icon }}"></i> --}}
                            <i class="bi bi-briefcase"></i>
                            <h4><a href="{{ $item->url }}" class="stretched-link">{{ $item->title }}</a></h4>
                            <p>{{ $item->description }}</p>
                        </div><!-- Icon-Box -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
