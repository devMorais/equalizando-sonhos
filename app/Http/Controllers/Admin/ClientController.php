<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ClientsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ClientsDataTable $dataTable)
    {
        return $dataTable->render('admin.sections.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'website_url' => ['nullable', 'url'],
            'logo' => ['nullable', 'image', 'max:8000'],
        ]);

        $logoPath = handleUpload('logo');

        Client::create([
            'is_disabled' => $request->has('is_disabled'),
            'logo' => $logoPath,
            'name' => $validatedData['name'],
            'website_url' => $validatedData['website_url'],
        ]);

        flash()->success('Cliente parceiro cadastrado com sucesso.');
        return redirect()->route('admin.client.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implementação futura
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('admin.sections.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:250'],
            'logo' => ['nullable', 'image', 'max:8000'],
            'website_url' => ['required', 'url'],
        ]);

        $client = Client::findOrFail($id);
        $imagePath = handleUpload('logo', $client);

        $client->update([
            'is_disabled' => $request->has('is_disabled'),
            'logo' => $imagePath ?? $client->logo,
            'name' => $validatedData['name'],
            'website_url' => $validatedData['website_url'],
        ]);

        flash()->success('Cliente parceiro atualizado com sucesso.');
        return redirect()->route('admin.client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(['status' => 'success', 'message' => 'Cliente excluído com sucesso.']);
    }
}
