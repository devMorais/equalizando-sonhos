<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioCategoryDataTable $datatable)
    {
        return $datatable->render('admin.sections.portfolio.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.portfolio.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $slug = Str::slug($validatedData['title']) . '-' . Str::random(5);

        PortfolioCategory::create([
            'title' => $validatedData['title'],
            'slug' => $slug
        ]);

        flash()->success('Categoria cadastrada com sucesso.');
        return redirect()->route('admin.portfolio-category.index');
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
        $portfolioCategory = PortfolioCategory::findOrFail($id);
        return view('admin.sections.portfolio.category.edit', compact('portfolioCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        $portfolioCategory = PortfolioCategory::findOrFail($id);

        $slug = Str::slug($validatedData['title']) . '-' . Str::random(5);
        $portfolioCategory->update([
            'title' => $validatedData['title'],
            'slug' => $slug,
        ]);

        flash()->success('Categoria atualizada com sucesso.');
        return redirect()->route('admin.portfolio-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolioCategory = PortfolioCategory::findOrFail($id);
        $portfolioCategory->delete();
        return response()->json(['status' => 'success', 'message' => 'Categoria excluída com sucesso.']);
    }
}
