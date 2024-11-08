<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdukHukumRequest;
use App\Models\KategoriBerita;
use App\Models\ProdukHukum;
use App\Traits\FileUploads;
use Illuminate\Http\Request;

class ProdukHukumController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'produk_hukum';
    private string $title = 'Produk Hukum';
    private array $fields = [
        ['name' => 'id_kategori', 'type' => 'select|idkategori', 'label' => 'ID Kategori'],
        ['name' => 'judul', 'type' => 'text', 'label' => 'Judul'],
        ['name' => 'tgl', 'type' => 'date', 'label' => 'Tanggal'],
        ['name' => 'deskripsi', 'type' => 'richeditor', 'label' => 'Deskripsi'],
        ['name' => 'file1', 'type' => 'file', 'label' => 'File 1']
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = ProdukHukum::with('kategori')
            ->when($search, fn($query) => $query->where('judul', 'like', "%$search%"))
            ->paginate(10);

        return view('crud.table', [
            'data' => $data,
            'total' => ProdukHukum::count(),
            'columns' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('crud.create', [
            'fields' => $this->fields,
            'kategoris' => KategoriBerita::all(),
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function store(ProdukHukumRequest $request)
    {
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile(null, $request, $data, 'file1', $this->routePrefix));
        ProdukHukum::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => ProdukHukum::findOrFail($id),
            'kategoris' => KategoriBerita::all(),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(ProdukHukumRequest $request, ProdukHukum $produkHukum)
    {
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile($produkHukum, $request, $data, 'file1', $this->routePrefix, true));
        $produkHukum->update($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(ProdukHukum $produkHukum)
    {
        $produkHukum->deleted = 1;
        $produkHukum->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
