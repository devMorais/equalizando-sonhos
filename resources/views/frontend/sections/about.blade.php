<section id="about" class="about section section-bg dark-background">
    <div class="container position-relative">
        <div class="row gy-5">
            <div class="content col-xl-5 d-flex flex-column" data-aos="fade-up" data-aos-delay="100">
                <h3>{{ $aboutConfig->title }}</h3>
                <p>
                    {{ $aboutConfig->description }}
                </p>
                @if ($aboutConfig->button_text)
                    <a href="{{ $aboutConfig->button_url }}"
                        class="about-btn align-self-center align-self-xl-start"><span>{{ $aboutConfig->button_text }}</span>
                        <i class="bi bi-chevron-right"></i></a>
                @endif
            </div>
            <div class="col-xl-7" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4">
                    <div class="col-md-6 icon-box position-relative">
                        <i class="bi bi-briefcase"></i>
                        <h4><a href="" class="stretched-link">Corporis voluptates sit</a></h4>
                        <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip
                        </p>
                    </div><!-- Icon-Box -->

                    <div class="col-md-6 icon-box position-relative">
                        <i class="bi bi-gem"></i>
                        <h4><a href="" class="stretched-link">Ullamco laboris nisi</a></h4>
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        </p>
                    </div><!-- Icon-Box -->

                    <div class="col-md-6 icon-box position-relative">
                        <i class="bi bi-broadcast"></i>
                        <h4><a href="" class="stretched-link">Labore consequatur</a></h4>
                        <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                    </div><!-- Icon-Box -->

                    <div class="col-md-6 icon-box position-relative">
                        <i class="bi bi-easel"></i>
                        <h4><a href="" class="stretched-link">Beatae veritatis</a></h4>
                        <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                    </div><!-- Icon-Box -->
                </div>
            </div>
        </div>
    </div>
</section>
