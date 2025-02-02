<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        return view('admin.sections.hero.index', compact('hero'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:500'],
            'background_image' => ['max:8000', 'image']
        ]);

        $hero = Hero::findOrFail($id);
        if ($request->hasFile('background_image')) {
            if ($hero->background_image && File::exists(public_path($hero->background_image))) {
                File::delete(public_path($hero->background_image));
            }
            $image = $request->file('background_image');
            $imageName = rand() . $image->getClientOriginalName();
            $image->move(public_path('/uploads'), $imageName);
            $imagePath = "/uploads/" . $imageName;
        }

        $hero->update([
            'is_disabled' => $request->has('is_disabled'),
            'background_image' => $request->hasFile('background_image') ? $imagePath : $hero->background_image,
            'title' => $request->title,
            'description' => $request->description,
            'button_text' => $request->button_text,
            'button_url' => $request->button_url,
            'video_url' => $request->video_url
        ]);

        flash()->success('Seção principal atualizada com sucesso.');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
