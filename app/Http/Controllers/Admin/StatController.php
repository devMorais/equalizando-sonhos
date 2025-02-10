<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StatDataTable;
use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StatDataTable $datatable)
    {
        return $datatable->render('admin.sections.stat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.stat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:100'],
            'count' => ['required', 'integer'],
        ]);

        try {
            Stat::create([
                'is_disabled' => $request->has('is_disabled'),
                'title' => $validatedData['title'],
                'icon' => $validatedData['icon'],
                'count' => $validatedData['count'],
            ]);

            flash()->success('Dados estatísticos cadastrados com sucesso.');
        } catch (\Exception $e) {
            flash()->error('Erro ao cadastrar dados estatísticos.');
        }

        return redirect()->route('admin.stat.index');
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
        $stat = Stat::findOrFail($id);
        return view('admin.sections.stat.edit', compact('stat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:100'],
            'count' => ['required', 'integer'],
        ]);
        $stat = Stat::findOrFail($id);
        try {
            $stat->update([
                'is_disabled' => $request->has('is_disabled'),
                'title' => $validatedData['title'],
                'icon' => $validatedData['icon'],
                'count' => $validatedData['count'],
            ]);
            flash()->success('Dados estatísticos atualizados com sucesso.');
        } catch (\Exception $e) {
            flash()->error('Erro ao atualizar dados estatísticos.');
        }

        return redirect()->route('admin.stat.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stat = Stat::findOrFail($id);
        $stat->delete();
        return response()->json(['status' => 'success', 'message' => 'Informação excluído com sucesso.']);
    }
}
