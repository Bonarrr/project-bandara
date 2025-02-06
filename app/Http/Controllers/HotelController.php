<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::paginate(12);

        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('hotels.create');
    }

    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Hotel::create([
            'tipe' => $request->tipe,
            'nama' => $request->nama,
            'harga' => str_replace(".", "", $request->harga),
            'location' => $request->location,
            'foto' => $foto->hashName(),
        ]);

        return redirect()->route('hotels.index')->with('success', 'Add hotel Success');
    }

    public function edit(Hotel $hotel)
    {
        return view('hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {

        $hotel->tipe = $request->tipe;
        $hotel->nama = $request->nama;
        $hotel->harga = str_replace(".", "", $request->harga);
        $hotel->location = $request->location;

        if ($request->file('foto')) {

            if ($hotel->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $hotel->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $hotel->foto = $foto->hashName();
        }

        $hotel->update();

        return redirect()->route('hotels.index')->with('success', 'Update hotel Success');
    }

    public function destroy(Hotel $hotel)
    {
        if ($hotel->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $hotel->foto);
        }

        $hotel->delete();

        return redirect()->route('hotels.index')->with('success', 'Delete hotel Success');
    }
}
