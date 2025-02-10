<section id="stats" class="stats section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            @foreach ($stats as $stat)
                <div class="col-lg-3 col-md-6 d-flex flex-column align-items-center">
                    <i class="{{ $stat->icon }}"></i>
                    <div class="stats-item">
                        <span data-purecounter-start="0" data-purecounter-end="{{ $stat->count }}"
                            data-purecounter-duration="1" class="purecounter"></span>
                        <p>{{ $stat->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
