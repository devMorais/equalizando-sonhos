<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioConfig;
use Illuminate\Http\Request;

class PortfolioConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolioConfig = PortfolioConfig::first();
        return view('admin.sections.portfolio.config.index', compact('portfolioConfig'));
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

        PortfolioConfig::updateOrCreate(
            ['id' => $id],
            [
                'is_disabled' => $request->has('is_disabled'),
                'title' => $request->title,
                'description' => $request->description,
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
