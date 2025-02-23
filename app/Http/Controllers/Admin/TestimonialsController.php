<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Testimonials;
use Illuminate\Http\Request;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TestimonialsDataTable $dataable)
    {
        return $dataable->render('admin.sections.testimonials.itens.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sections.testimonials.itens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'testimonial' => ['nullable', 'string', 'max:500'],
            'position' => ['required', 'string', 'max:255'],
        ]);

        Testimonials::create([
            'name' => $validatedData['name'],
            'testimonial' => $validatedData['testimonial'] ?? null,
            'position' => $validatedData['position'],
        ]);

        flash()->success('Item cadastrado com sucesso.');
        return redirect()->route('admin.testimonials.index');
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
        $testimonial = Testimonials::findOrFail($id);
        return view('admin.sections.testimonials.itens.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'testimonial' => ['nullable', 'string', 'max:500'],
            'position' => ['required', 'string', 'max:255'],
        ]);

        $testimonial = Testimonials::findOrFail($id);
        $testimonial->update([
            'name' => $validatedData['name'],
            'testimonial' => $validatedData['testimonial'] ?? null,
            'position' => $validatedData['position'],
        ]);

        flash()->success('Item atualizado com sucesso.');
        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonials::findOrFail($id);
        $testimonial->delete();
        return response()->json(['status' => 'success', 'message' => 'Item excluído com sucesso.']);
    }
}
