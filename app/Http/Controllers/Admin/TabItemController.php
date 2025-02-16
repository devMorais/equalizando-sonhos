<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TabItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\TabCategory;
use App\Models\TabItem;
use Illuminate\Http\Request;

class TabItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TabItemDataTable $dataTable)
    {
        // Carregar dados para DataTable
        return $dataTable->render('admin.sections.tab.itens.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = TabCategory::all();
        return view('admin.sections.tab.itens.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'image' => ['nullable', 'image', 'max:8000'],
            'category_id' => ['required', 'numeric'],
        ]);

        $imagePath = handleUpload('image');

        TabItem::create([
            'is_disabled' => $request->has('is_disabled'),
            'image' => $imagePath,
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
        ]);

        flash()->success('Item cadastrado com sucesso.');
        return redirect()->route('admin.tab-item.index');
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
        $tabItem = TabItem::findOrFail($id);
        $categories = TabCategory::all();
        return view('admin.sections.tab.itens.edit', compact('tabItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'image' => ['nullable', 'image', 'max:8000'],
            'category_id' => ['required', 'numeric'],
        ]);

        $tabItem = TabItem::findOrFail($id);
        $imagePath = handleUpload('image', $tabItem);

        $tabItem->update([
            'is_disabled' => $request->has('is_disabled'),
            'image' => $imagePath ?? $tabItem->image,
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'category_id' => $validatedData['category_id'],
        ]);
        flash()->success('Item Atualizado com sucesso.');
        return redirect()->route('admin.tab-item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tabItem = TabItem::findOrFail($id);
        $tabItem->delete();

        return response()->json(['status' => 'success', 'message' => 'Item excluído com sucesso.']);
    }
}
