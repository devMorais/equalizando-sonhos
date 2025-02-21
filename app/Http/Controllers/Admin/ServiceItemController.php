<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServiceItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\ServiceItem;
use Illuminate\Http\Request;

class ServiceItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServiceItemDataTable $datatable)
    {
        return $datatable->render('admin.sections.service.service_itens.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.service.service_itens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:250'],
            'icon' => ['nullable', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
        ]);

        ServiceItem::create([
            'is_disabled' => $request->has('is_disabled'),
            'title' => $validatedData['title'],
            'icon' => $validatedData['icon'],
            'description' => $validatedData['description'],
        ]);

        flash()->success('Item da seção Serviço adicionado com sucesso.');
        return redirect()->route('admin.service-itens.index');
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
        $serviceItem = ServiceItem::findOrFail($id);
        return view('admin.sections.service.service_itens.edit', compact('serviceItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:250'],
            'icon' => ['nullable', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:500'],
        ]);
        $aboutItem = ServiceItem::findOrFail($id);
        $aboutItem->update([
            'is_disabled' => $request->has('is_disabled'),
            'title' => $validatedData['title'],
            'icon' => $validatedData['icon'],
            'description' => $validatedData['description'],
        ]);

        flash()->success('Item da seção Serviço atualizado com sucesso.');
        return redirect()->route('admin.service-itens.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serviceItem = ServiceItem::findOrFail($id);
        $serviceItem->delete();
        return response()->json(['status' => 'success', 'message' => 'Item excluído com sucesso.']);
    }
}
