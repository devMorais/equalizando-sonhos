<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sections.clients.index');
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
        $request->validate([
            'logo' => ['nullable', 'image', 'max:8000'],
            'name' => ['required', 'string', 'max:255'],
            'website_url' => ['nullable', 'url'],
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = rand() . $logo->getClientOriginalName();
            $logo->move(public_path('/uploads'), $logoName);
            $logoPath = "/uploads/" . $logoName;
        }

        $client = new Client();
        $client->is_disabled = $request->has('is_disabled');
        $client->logo = $logoPath;
        $client->name = $request->name;
        $client->website_url = $request->website_url;

        $client->save();

        flash()->success('Cliente parceiro cadastrado com sucesso.');
        return redirect()->route('admin.client.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
