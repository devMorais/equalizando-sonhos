@extends('frontend.layouts.layout')
@section('content')
    <!-- Hero Section -->
    @if (!$hero->is_disabled)
        @include('frontend.sections.hero')
    @endif
    <!-- /Hero Section -->

    <!-- Clients Section -->
    @if ($clients->isNotEmpty())
        @include('frontend.sections.clientes')
    @endif
    <!-- Clients Section -->

    <!-- About Section -->
    @if (!$aboutConfig->is_disabled)
        @include('frontend.sections.about')
    @endif
    <!-- /About Section -->

    <!-- Stats Section -->
    @if ($stats->isNotEmpty())
        @include('frontend.sections.stats')
    @endif
    <!-- /Stats Section -->

    <!-- Tabs Section -->
    @if ($tabItens->isNotEmpty())
        @include('frontend.sections.tabs')
    @endif
    <!-- /Tabs Section -->

    <!-- Services Section -->
    @if ($serviceConfig)
        @include('frontend.sections.services')
    @endif
    <!-- /Services Section -->

    <!-- Portfolio Section -->
    @include('frontend.sections.portfolio')
    <!-- /Portfolio Section -->

    <!-- Testimonials Section -->
    @include('frontend.sections.testimonials')
    <!-- /Testimonials Section -->

    <!-- Pricing Section -->
    @include('frontend.sections.pricing')
    <!-- /Pricing Section -->

    <!-- Faq Section -->
    @include('frontend.sections.faq')
    <!-- /Faq Section -->

    <!-- Team Section -->
    @include('frontend.sections.team')
    <!-- /Team Section -->

    <!-- Contact Section -->
    @include('frontend.sections.contact')
    <!-- /Contact Section -->
@endsection
