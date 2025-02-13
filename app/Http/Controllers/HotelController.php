<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function userIndex(Request $request)
    {
        $jarak = $request->input('jarak'); 
        $harga = $request->input('harga');
    
        $query = Hotel::query();

        if ($jarak = request('jarak')) {
            if ($jarak === '15+') {
                $query->where('jarak', '>', 15);
            } else {
                [$min, $max] = explode('-', $jarak);
                $query->whereBetween('jarak', [(float) $min, (float) $max]);
            }
        }

        if ($harga = request('harga')) {
            if ($harga === '<500000') {
                $query->where('harga', '<', 500000);
            } else if ($harga === '>1000000'){
                $query->where('harga', '>', 1000000);
            }else{
                [$min, $max] = explode('-', $harga);
                $query->whereBetween('harga', [(float) $min, (float) $max]);
            }
        }

        $hotels = $query->paginate(10);

        $allDistance = [
            '0-5' => '0-5 km',
            '5-10' => '5-10 km',
            '10-15' => '10-15 km',
        ];
        
        $allPrice = [
            '<500000' => 'Budget (< 500k)',
            '500000-1000000' => 'Mid Range (500k - 1M)',
            '>1000000' => 'Luxury (>1M)',
        ];
    
        return view('welcome.information.hotel', compact('hotels', 'jarak', 'harga', 'allDistance','allPrice'));
    }

    public function index(Request $request)
    {
        $jarak = $request->input('jarak'); 
        $harga = $request->input('harga'); 
        $search = $request->input('search'); 
    
        $query = Hotel::query();

        if ($jarak = request('jarak')) {
            if ($jarak === '15+') {
                $query->where('jarak', '>', 15);
            } else {
                [$min, $max] = explode('-', $jarak);
                $query->whereBetween('jarak', [(float) $min, (float) $max]);
            }
        }

        if ($harga = request('harga')) {
            if ($harga === '<500000') {
                $query->where('harga', '<', 500000);
            } else if ($harga === '>1000000'){
                $query->where('harga', '>', 1000000);
            }else{
                [$min, $max] = explode('-', $harga);
                $query->whereBetween('harga', [(float) $min, (float) $max]);
            }
        }

        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $hotels = $query->paginate(10);

        $allDistance = [
            '0-5' => '0-5 km',
            '5-10' => '5-10 km',
            '10-15' => '10-15 km',
        ];
        
        $allPrice = [
            '<500000' => 'Budget (< 500k)',
            '500000-1000000' => 'Mid Range (500k - 1M)',
            '>1000000' => 'Luxury (>1M)',
        ];
    
        return view('admin.hotels.index', compact('hotels', 'jarak', 'harga', 'search', 'allDistance','allPrice'));
    }

    public function create()
    {
        return view('admin.hotels.create');
    }

    public function store(Request $request)
    {
        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Hotel::create([
            'jarak' => $request->jarak,
            'nama' => $request->nama,
            'harga' => str_replace(".", "", $request->harga),
            'alamat' => $request->alamat,
            'foto' => $foto->hashName(),
        ]);

        return redirect()->route('admin.hotels.index')->with('success', 'Add hotel Success');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {

        $hotel->jarak = $request->jarak;
        $hotel->nama = $request->nama;
        $hotel->harga = str_replace(".", "", $request->harga);
        $hotel->alamat = $request->alamat;

        if ($request->file('foto')) {

            if ($hotel->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $hotel->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $hotel->foto = $foto->hashName();
        }

        $hotel->update();

        return redirect()->route('admin.hotels.index')->with('success', 'Update hotel Success');
    }

    public function destroy(Hotel $hotel)
    {
        if ($hotel->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $hotel->foto);
        }

        $hotel->delete();

        return redirect()->route('admin.hotels.index')->with('success', 'Delete hotel Success');
    }
}
