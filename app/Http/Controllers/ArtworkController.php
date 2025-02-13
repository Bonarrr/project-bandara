<?php

namespace App\Http\Controllers;

use App\Models\artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    public function userIndex(Request $request)
    {
        $location = $request->input('location'); 
        $search = $request->input('search'); 
    
        $query = Artwork::query();

        if ($location) {
            $query->where('location', $location);
        }

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $artworks = $query->paginate(10);

        $allLocation = [
            'Terminal 1',
            'Terminal 2',
            'Departure Hall',
            'Arrival Hall',
            'Airport Garden'
        ];
    
        return view('welcome.information.artwork', compact('artworks', 'location', 'search', 'allLocation'));
    }

    public function index(Request $request)
    {
        $location = $request->input('location');
        $search = $request->input('search'); 
    
        $query = Artwork::query();

        if ($location) {
            $query->where('location', $location);
        }

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $artworks = $query->paginate(10);

        $allLocation = artwork::select('location')->distinct()->pluck('location');
    
        return view('admin.artworks.index', compact('artworks', 'location', 'search', 'allLocation'));
    }

    public function create()
    {
        return view('admin.artworks.create');
    }

    public function store(Request $request)
    {

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Artwork::create([
            
            'nama' => $request->nama,
            'location' => $request->location,
            'deskripsi' => $request->deskripsi,
            'deskripsi_en' => $request->deskripsi_en,
            'foto' => $foto->hashName(),
        ]);

        return redirect()->route('admin.artworks.index')->with('success', 'Add artwork Success');
    }

    public function edit(Artwork $artwork)
    {
        return view('admin.artworks.edit', compact('artwork'));
    }

    public function update(Request $request, Artwork $artwork)
    {

        $artwork->nama = $request->nama;
        $artwork->location = $request->location;
        $artwork->deskripsi = $request->deskripsi;
        $artwork->deskripsi_en = $request->deskripsi_en;

        if ($request->file('foto')) {

            if ($artwork->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $artwork->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $artwork->foto = $foto->hashName();
        }

        $artwork->update();

        return redirect()->route('admin.artworks.index')->with('success', 'Update artwork Success');
    }

    public function destroy(Artwork $artwork)
    {
        if ($artwork->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $artwork->foto);
        }

        $artwork->delete();

        return redirect()->route('admin.artworks.index')->with('success', 'Delete artwork Success');
    }
}
