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
    @include('frontend.sections.about')
    <!-- /About Section -->

    <!-- Stats Section -->
    @include('frontend.sections.stats')
    <!-- /Stats Section -->

    <!-- Tabs Section -->
    @include('frontend.sections.tabs')
    <!-- /Tabs Section -->

    <!-- Services Section -->
    @include('frontend.sections.services')
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
