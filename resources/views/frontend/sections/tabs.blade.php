<section id="tabs" class="tabs section">
    <div class="container">
        <ul class="nav nav-tabs row d-flex" data-aos="fade-up" data-aos-delay="100">
            @foreach ($tabCategories as $category)
                <li class="nav-item col-3">
                    <a class="nav-link {{ $loop->first ? 'active show' : '' }}" data-bs-toggle="tab"
                        data-bs-target="#tabs-{{ $category->id }}">
                        <i class="{{ $category->icon }}"></i>
                        <h4 class="d-none d-lg-block">{{ $category->title }}</h4>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
            @foreach ($tabCategories as $category)
                <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="tabs-{{ $category->id }}">
                    @if (isset($tabItens[$category->id]))
                        @php $item = $tabItens[$category->id]; @endphp
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>{{ $item->title }}</h3>
                                {!! $item->description !!}
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                @if ($item->image)
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="img-fluid">
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
