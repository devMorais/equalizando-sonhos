<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutConfig;
use Illuminate\Http\Request;

class AboutConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutConfig = AboutConfig::first();
        return view('admin.sections.about.config.index', compact('aboutConfig'));
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

        AboutConfig::updateOrCreate(
            ['id' => $id],
            [
                'is_disabled' => $request->has('is_disabled'),
                'title' => $request->title,
                'description' => $request->description,
                'button_text' => $request->button_text,
                'button_url' => $request->button_url,
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
