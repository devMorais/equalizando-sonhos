<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AboutItensDataTable;
use App\Http\Controllers\Controller;
use App\Models\AboutItens;
use Illuminate\Http\Request;

class AboutItensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AboutItensDataTable $databale)
    {
        return $databale->render('admin.sections.about.about_itens.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.about.about_itens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:250'],
            'url' => ['nullable', 'url'],
            'icon' => ['nullable', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
        ]);

        AboutItens::create([
            'is_disabled' => $request->has('is_disabled'),
            'title' => $validatedData['title'],
            'url' => $validatedData['url'],
            'icon' => $validatedData['icon'],
            'description' => $validatedData['description'],
        ]);

        flash()->success('Item da seção Sobre adicionado com sucesso.');
        return redirect()->route('admin.about-itens.index');
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
        $aboutItens = AboutItens::findOrFail($id);
        return view('admin.sections.about.about_itens.edit', compact('aboutItens'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:250'],
            'url' => ['nullable', 'url'],
            'icon' => ['nullable', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
        ]);
        $aboutItem = AboutItens::findOrFail($id);
        $aboutItem->update([
            'is_disabled' => $request->has('is_disabled'),
            'title' => $validatedData['title'],
            'url' => $validatedData['url'],
            'icon' => $validatedData['icon'],
            'description' => $validatedData['description'],
        ]);

        flash()->success('Item da seção Sobre atualizado com sucesso.');
        return redirect()->route('admin.about-itens.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $aboutItem = AboutItens::findOrFail($id);
        $aboutItem->delete();

        return response()->json(['status' => 'success', 'message' => 'Item excluído com sucesso.']);
    }
}
