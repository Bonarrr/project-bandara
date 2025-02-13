<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TenantController extends Controller
{
    public function userIndex(Request $request)
    {
        $location = $request->input('location'); 
        $kategori = $request->input('kategori'); 
        $search = $request->input('search'); 
    
        $query = Tenant::query();

        if ($location) {
            $query->where('location', $location);
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi_en', 'like', '%' . $search . '%');
            });
        }

        $tenants = $query->paginate(10);

        $allCategories = [
            'Food & Beverage',
            'Retail',
            'Services',
            'Duty Free'
        ];

        $allLocation = [
            'Terminal 1',
            'Terminal 2',
            'Domestic Area',
            'International Area'
        ];
    
        return view('welcome.tenant', compact('tenants', 'location', 'kategori', 'search', 'allCategories','allLocation'));
    }
    
    public function index(Request $request)
    {
        $status = $request->input('status'); 
        $kategori = $request->input('kategori'); 
        $search = $request->input('search'); 
    
        $query = Tenant::query();

        if ($status) {
            $query->where('status', $status);
        }

        if ($kategori) {
            $query->where('kategori', $kategori);
        }

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi', 'like', '%' . $search . '%')
                  ->orWhere('deskripsi_en', 'like', '%' . $search . '%');
            });
        }

        $tenants = $query->paginate(10);

        $allCategories = tenant::select('kategori')->distinct()->pluck('kategori');
    
        return view('admin.tenants.index', compact('tenants', 'status', 'kategori', 'search', 'allCategories'));
    }

    public function create()
    {
        return view('admin.tenants.create');
    }

    public function store(Request $request)
    {

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Tenant::create([
            
            'status' => $request->status,
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'location' => $request->location,
            'deskripsi' => $request->deskripsi,
            'deskripsi_en' => $request->deskripsi_en,
            'foto' => $foto->hashName(),
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup
        ]);

        return redirect()->route('admin.tenants.index')->with('success', 'Add Tenant Success');
    }

    public function edit(Tenant $tenant)
    {   
        return view('admin.tenants.edit', compact('tenant'));
    }

    public function update(Request $request, Tenant $tenant)
    {

        $tenant->status = $request->status;
        $tenant->kategori = $request->kategori;
        $tenant->nama = $request->nama;
        $tenant->location = $request->location;
        $tenant->deskripsi = $request->deskripsi;
        $tenant->deskripsi_en = $request->deskripsi_en;
        $tenant->jam_buka = $request->jam_buka;
        $tenant->jam_tutup = $request->jam_tutup;

        if ($request->file('foto')) {

            if ($tenant->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $tenant->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $tenant->foto = $foto->hashName();
        }

        $tenant->update();

        return redirect()->route('admin.tenants.index')->with('success', 'Update Tenant Success');
    }

    public function destroy(Tenant $tenant)
    {
        if ($tenant->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $tenant->foto);
        }

        $tenant->delete();

        return redirect()->route('admin.tenants.index')->with('success', 'Delete Tenant Success');
    }
}
