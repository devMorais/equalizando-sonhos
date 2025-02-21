<section id="services" class="services section section-bg dark-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>{{ $serviceConfig->title }}</h2>
        <p>{{ $serviceConfig->description }}</p>
    </div>
    <div class="container">
        <div class="row gy-4">
            @foreach ($serviceItens as $index => $item)
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                    <div class="service-item d-flex position-relative h-100">
                        <i class="{{ $item->icon }} icon flex-shrink-0"></i>
                        <div>
                            <h4 class="title">{{ $item->title }}</h4>
                            <p class="description">{!! $item->description !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
