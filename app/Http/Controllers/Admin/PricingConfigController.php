<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingConfig;
use Illuminate\Http\Request;

class PricingConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pricingConfig = PricingConfig::first();
        return view('admin.sections.pricing.config.index', compact('pricingConfig'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:500'],
        ]);

        PricingConfig::updateOrCreate(
            ['id' => $id],
            [
                'is_disabled' => $request->has('is_disabled'),
                'title' => $request->title,
                'description' => $request->description
            ]
        );

        flash()->success('Configuração da seção atualizada com sucesso.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
