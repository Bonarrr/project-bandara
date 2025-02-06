<?php

namespace App\Http\Controllers;

use App\Models\artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    public function index()
    {
        $artworks = Artwork::paginate(12);

        return view('artworks.index', compact('artworks'));
    }

    public function create()
    {
        return view('artworks.create');
    }

    public function store(Request $request)
    {

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Artwork::create([
            
            'tipe' => $request->tipe,
            'nama' => $request->nama,
            'location' => $request->location,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName(),
        ]);

        return redirect()->route('artworks.index')->with('success', 'Add artwork Success');
    }

    public function edit(Artwork $artwork)
    {
        return view('artworks.edit', compact('artwork'));
    }

    public function update(Request $request, Artwork $artwork)
    {

        $artwork->tipe = $request->tipe;
        $artwork->nama = $request->nama;
        $artwork->location = $request->location;
        $artwork->deskripsi = $request->deskripsi;

        if ($request->file('foto')) {

            if ($artwork->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $artwork->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $artwork->foto = $foto->hashName();
        }

        $artwork->update();

        return redirect()->route('artworks.index')->with('success', 'Update artwork Success');
    }

    public function destroy(Artwork $artwork)
    {
        if ($artwork->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $artwork->foto);
        }

        $artwork->delete();

        return redirect()->route('artworks.index')->with('success', 'Delete artwork Success');
    }
}
