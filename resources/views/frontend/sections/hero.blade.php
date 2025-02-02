<section id="hero" class="hero section">
    <img src="{{ $hero->background_image }}" alt="Imagem inicial" data-aos="fade-in">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2 data-aos="fade-up" data-aos-delay="100">{{ $hero->title }}</h2>
                <p data-aos="fade-up" data-aos-delay="200">{{ $hero->description }}</p>
                <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                    @if ($hero->button_text)
                        <a href="{{ $hero->button_url }}" class="btn-get-started">{{ $hero->button_text }}</a>
                    @endif
                    <a href="{{ $hero->video_url }}" class="glightbox btn-watch-video d-flex align-items-center"><i
                            class="bi bi-play-circle"></i><span>Ver Vídeo</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
