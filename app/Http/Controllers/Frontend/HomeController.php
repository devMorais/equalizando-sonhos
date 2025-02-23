<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutConfig;
use App\Models\AboutItens;
use App\Models\Client;
use App\Models\Hero;
use App\Models\PortfolioCategory;
use App\Models\PortfolioConfig;
use App\Models\PortfolioItem;
use App\Models\PricingConfig;
use App\Models\Service;
use App\Models\ServiceItem;
use App\Models\Stat;
use App\Models\TabCategory;
use App\Models\TabItem;
use App\Models\Testimonials;
use App\Models\TestimonialsConfig;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Hero::first();
        $clients = Client::where('is_disabled', false)->orderBy('id')->get();
        $aboutConfig = AboutConfig::first();
        $aboutItens = AboutItens::where('is_disabled', false)->orderBy('id')->get();
        $stats = Stat::where('is_disabled', false)->orderBy('id')->get();
        $tabCategories = TabCategory::where('is_disabled', false)->orderBy('id')->get();
        $tabItens = TabItem::where('is_disabled', false)
            ->orderBy('id', 'desc')
            ->get()
            ->groupBy('category_id')
            ->map(function ($group) {
                return $group->first();
            });
        $serviceConfig = Service::first();
        $serviceItens = ServiceItem::where('is_disabled', false)->orderBy('id')->get();
        $portfolioCategories = PortfolioCategory::orderBy('id')->latest()->take(5)->get();
        $portfolioItems = PortfolioItem::with('category')->orderBy('id')->get();
        $portfolioConfig = PortfolioConfig::first();
        $testimonialsConfig = TestimonialsConfig::first();
        $testimonials = Testimonials::orderBy('id')->get();
        $PricingConfig = PricingConfig::first();
        return view('frontend.home', compact(
            'hero',
            'clients',
            'aboutConfig',
            'aboutItens',
            'stats',
            'tabCategories',
            'tabItens',
            'serviceConfig',
            'serviceItens',
            'portfolioCategories',
            'portfolioItems',
            'portfolioConfig',
            'testimonialsConfig',
            'testimonials',
            'PricingConfig'
        ));
    }
}
