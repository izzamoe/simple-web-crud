<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Status;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::whereHas('status', function ($query) {
            $query->where('nama_status', 'bisa dijual');
        })->get();

        return view('produk.index', compact('produks'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        $statuses = Status::all();
        return view('produk.create', compact('kategoris', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',
            'status_id' => 'required',
        ]);

        Produk::create($request->all());

        return redirect('/')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategoris = Kategori::all();
        $statuses = Status::all();
        return view('produk.edit', compact('produk', 'kategoris', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'kategori_id' => 'required',
            'status_id' => 'required',
        ]);

        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect('/')->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect('/')->with('success', 'Produk berhasil dihapus.');
    }
}