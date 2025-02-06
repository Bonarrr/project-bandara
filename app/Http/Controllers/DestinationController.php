<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::paginate(12);

        return view('destinations.index', compact('destinations'));
    }

    public function create()
    {
        return view('destinations.create');
    }

    public function store(Request $request)
    {

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Destination::create([
            
            'tipe' => $request->tipe,
            'nama' => $request->nama,
            'location' => $request->location,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName(),
        ]);

        return redirect()->route('destinations.index')->with('success', 'Add destination Success');
    }

    public function edit(Destination $destination)
    {
        return view('destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {

        $destination->tipe = $request->tipe;
        $destination->nama = $request->nama;
        $destination->location = $request->location;
        $destination->deskripsi = $request->deskripsi;

        if ($request->file('foto')) {

            if ($destination->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $destination->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $destination->foto = $foto->hashName();
        }

        $destination->update();

        return redirect()->route('destinations.index')->with('success', 'Update destination Success');
    }

    public function destroy(Destination $destination)
    {
        if ($destination->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $destination->foto);
        }

        $destination->delete();

        return redirect()->route('destinations.index')->with('success', 'Delete destination Success');
    }
}
