<?php

namespace App\Http\Controllers\Barang;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('admin.produk.index', compact('produk','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.produk.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'kategori_id' => 'required',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        $imagePath = $request->file('gambar')->store('products', 'public');

        $product = new Produk();
        $product->gambar = $imagePath;
        $product->kategori_id = $request->kategori_id;
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        return redirect()->route('produk.index')->with('success', 'Product created successfully.');
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
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.produk.edit', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Produk::findOrFail($id);

        $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori_id' => 'required',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            // Delete old image
            Storage::disk('public')->delete($product->gambar);

            // Store new image
            $imagePath = $request->file('gambar')->store('products', 'public');
            $product->gambar = $imagePath;
        }

        $product->kategori_id = $request->kategori_id;
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->save();

        return redirect()->route('produk.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Produk::findOrFail($id);

        // Delete image
        Storage::disk('public')->delete($product->gambar);

        $product->delete();

        return redirect()->route('produk.index')->with('success', 'Product deleted successfully.');
    }
}
