<?php

namespace App\Http\Controllers\admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $datatable)
    {
        return $datatable->render('admin.sections.portfolio.portfolio_itens.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PortfolioCategory::all();
        return view('admin.sections.portfolio.portfolio_itens.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'max:8000'],
            'category_id' => ['required', 'exists:portfolio_categories,id'],
        ]);

        $imagePatch = handleUpload('image');

        PortfolioItem::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'] ?? null,
            'image' => $imagePatch,
            'category_id' => $validatedData['category_id'],
        ]);

        flash()->success('Item cadastrado com sucesso.');
        return redirect()->route('admin.portfolio-itens.index');
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
        $portfolioItem = PortfolioItem::findOrFail($id);
        $categories = PortfolioCategory::all();
        return view('admin.sections.portfolio.portfolio_itens.edit', compact('portfolioItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:500'],
            'image' => ['nullable', 'image', 'max:8000'],
            'category_id' => ['required', 'exists:portfolio_categories,id'],
        ]);

        $portfolioItem = PortfolioItem::findOrFail($id);
        $imagePatch = handleUpload('image', $portfolioItem);
        $portfolioItem::update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'] ?? null,
            'image' => $imagePatch ?? $portfolioItem->image,
            'category_id' => $validatedData['category_id'],
        ]);

        flash()->success('Item atualizado com sucesso.');
        return redirect()->route('admin.portfolio-itens.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolioItem = PortfolioItem::findOrFail($id);
        $portfolioItem->delete();
        return response()->json(['status' => 'success', 'message' => 'Item excluído com sucesso.']);
    }
}
