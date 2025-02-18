<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutConfig;
use App\Models\AboutItens;
use App\Models\Client;
use App\Models\Hero;
use App\Models\Service;
use App\Models\Stat;
use App\Models\TabCategory;
use App\Models\TabItem;

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
        return view('frontend.home', compact(
            'hero',
            'clients',
            'aboutConfig',
            'aboutItens',
            'stats',
            'tabCategories',
            'tabItens',
            'serviceConfig'
        ));
    }
}
