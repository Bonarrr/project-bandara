<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status'); // Ambil status dari query string
        $kategori = $request->input('kategori'); // Ambil kategori dari query string
        $search = $request->input('search'); // Ambil search query dari input
    
        // Query produk
        $query = Product::query();
    
        // Filter berdasarkan status
        if ($status) {
            $query->where('status', $status);
        }
    
        // Filter berdasarkan kategori
        if ($kategori) {
            $query->where('kategori', $kategori);
        }
    
        // Filter berdasarkan nama produk (search)
        if ($search) {
            $query->where('nama', 'like', '%' . $search . '%');
        }
    
        // Eksekusi query dengan pagination
        $products = $query->paginate(10);
    
        // Ambil daftar kategori unik untuk dropdown
        $allCategories = Product::select('kategori')->distinct()->pluck('kategori');
    
        return view('products.index', compact('products', 'status', 'kategori', 'search', 'allCategories'));
    }
    
    
    

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'nama' => 'required',
        //     'harga' => 'required|numeric',
        //     'foto' => 'required|image|mimes:jpeg,png,jpg'
        // ]);

        $foto = $request->file('foto');
        $foto->storeAs('public', $foto->hashName());

        Product::create([
            'status' => $request->status,
            'kategori' => $request->kategori,
            'nama' => $request->nama,
            'harga' => str_replace(".", "", $request->harga),
            'deskripsi' => $request->deskripsi,
            'foto' => $foto->hashName(),
            'jadwal' => $request->jadwal,
            'jam_buka' => $request->jam_buka,
            'jam_tutup' => $request->jam_tutup
        ]);

        return redirect()->route('products.index')->with('success', 'Add Product Success');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {

        // dd($request);

        $product->status = $request->status;
        $product->kategori = $request->kategori;
        $product->nama = $request->nama;
        $product->harga = str_replace(".", "", $request->harga);
        $product->deskripsi = $request->deskripsi;
        $product->jadwal = $request->jadwal;
        $product->jam_buka = $request->jam_buka;
        $product->jam_tutup = $request->jam_tutup;

        if ($request->file('foto')) {

            if ($product->foto !== "noimage.png") {
                Storage::disk('local')->delete('public/' . $product->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('public', $foto->hashName());
            $product->foto = $foto->hashName();
        }

        $product->update();

        return redirect()->route('products.index')->with('success', 'Update Product Success');
    }

    public function destroy(Product $product)
    {
        if ($product->foto !== "noimage.png") {
            Storage::disk('local')->delete('public/' . $product->foto);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Delete Product Success');
    }
}