<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtikelRequest;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

use App\Traits\FileUploads;

class ArtikelController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'artikel';
    private string $title = 'Artikel';
    private array $fields = [
        ['name' => 'id_kategori', 'type' => 'select|idkategori', 'label' => 'ID Kategori'],
        ['name' => 'judul', 'type' => 'text', 'label' => 'Judul'],
        ['name' => 'tgl', 'type' => 'date', 'label' => 'Tanggal'],
        ['name' => 'deskripsi', 'type' => 'richeditor', 'label' => 'Deskripsi'],
        ['name' => 'file1', 'type' => 'file', 'label' => 'File 1'],
        ['name' => 'file2', 'type' => 'file', 'label' => 'File 2'],
        ['name' => 'file3', 'type' => 'file', 'label' => 'File 3'],
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = Artikel::with('kategori')
            ->when($search, fn($query) => $query->where('judul', 'like', "%$search%"))
            ->paginate(10);

        return view('crud.table', [
            'data' => $data,
            'total' => Artikel::count(),
            'columns' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('crud.create', [
            'fields' => $this->fields,
            'kategoris' => KategoriArtikel::all(),
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function store(ArtikelRequest $request)
    {
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile(null, $request, $data, $fileField, $this->routePrefix));
        Artikel::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => Artikel::findOrFail($id),
            'kategoris' => KategoriArtikel::all(),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(ArtikelRequest $request, Artikel $artikel)
    {
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile($artikel, $request, $data, $fileField, $this->routePrefix, true));
        $artikel->update($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(Artikel $artikel)
    {
        $artikel->deleted = 1;
        $artikel->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
