<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TabCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\TabCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TabCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TabCategoryDataTable $datatable)
    {
        return $datatable->render('admin.sections.tab.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.tab.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'string', 'max:255'],
        ]);

        $slug = Str::slug($validatedData['title']) . '-' . Str::random(5);

        TabCategory::create([
            'is_disabled' => $request->has('is_disabled'),
            'title' => $validatedData['title'],
            'slug' => $slug,
            'icon' => $validatedData['icon'],
        ]);

        flash()->success('Categoria de guias de suporte cadastrado com sucesso.');
        return redirect()->route('admin.tab-category.index');
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
        $tabCategory = TabCategory::findOrFail($id);
        return view('admin.sections.tab.category.edit', compact('tabCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação dos dados
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'string', 'max:255'],
        ]);

        $tabCategory = TabCategory::findOrFail($id);

        $slug = Str::slug($validatedData['title']) . '-' . Str::random(5);
        $tabCategory->update([
            'is_disabled' => $request->has('is_disabled'),
            'title' => $validatedData['title'],
            'slug' => $slug,
            'icon' => $validatedData['icon'],
        ]);

        flash()->success('Categoria atualizada com sucesso.');
        return redirect()->route('admin.tab-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tabCategory = TabCategory::findOrFail($id);
        $tabCategory->delete();

        return response()->json(['status' => 'success', 'message' => 'Categoria excluída com sucesso.']);
    }
}
