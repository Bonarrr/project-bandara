<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{

    public function userIndex()
    {
        $destinations = Destination::paginate(10);

        return view('welcome.information.todo', compact('destinations'));
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Destination::query();

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $destinations = $query->paginate(10);

        return view('admin.destinations.index', compact('destinations', 'search'));
    }

    public function create()
    {
        return view('admin.destinations.create');
    }

    public function store(Request $request)
    {

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Destination::create([
            
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'deskripsi_en' => $request->deskripsi_en,
            'tipe' => $request->tipe,
            'foto' => $foto->hashName(),
        ]);

        return redirect()->route('admin.destinations.index')->with('success', 'Add destination Success');
    }

    public function edit(Destination $destination)
    {
        return view('admin.destinations.edit', compact('destination'));
    }

    public function update(Request $request, Destination $destination)
    {

        $destination->nama = $request->nama;
        $destination->deskripsi = $request->deskripsi;
        $destination->deskripsi_en = $request->deskripsi_en;
        $destination->tipe = $request->tipe;

        if ($request->file('foto')) {

            if ($destination->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $destination->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $destination->foto = $foto->hashName();
        }

        $destination->update();

        return redirect()->route('admin.destinations.index')->with('success', 'Update destination Success');
    }

    public function destroy(Destination $destination)
    {
        if ($destination->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $destination->foto);
        }

        $destination->delete();

        return redirect()->route('admin.destinations.index')->with('success', 'Delete destination Success');
    }
}
