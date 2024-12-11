<?php

namespace App\Http\Controllers;

use App\Traits\FileUploads;
use Illuminate\Http\Request;
use App\Http\Requests\BeritaRequest;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Log;

class BeritaController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'berita';
    private string $title = 'Berita';
    private array $fields = [
        ['name' => 'id_kategori', 'type' => 'select|idkategori', 'label' => 'Kategori'],
        ['name' => 'judul', 'type' => 'text', 'label' => 'Judul'],
        ['name' => 'tgl', 'type' => 'date', 'label' => 'Tanggal'],
        ['name' => 'deskripsi', 'type' => 'richeditor', 'label' => 'Deskripsi'],
        ['name' => 'file1', 'type' => 'file', 'label' => 'File 1'],
        ['name' => 'file2', 'type' => 'file', 'label' => 'File 2'],
        ['name' => 'file3', 'type' => 'file', 'label' => 'File 3'],
    ];

    public function index()
    {
         return view('crud.table', [
            'data' => Berita::all(),
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

    public function store(BeritaRequest $request)
    {
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile(null, $request, $data, $fileField, $this->routePrefix));
        Berita::create($data);

        return redirect()->route('berita.index')->with('status', "$this->title  has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => Berita::findOrFail($id),
            'kategoris' => KategoriBerita::all(),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(BeritaRequest $request, int $id)
    {
        $berita = Berita::findOrFail($id);
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile($berita, $request, $data, $fileField, $this->routePrefix, true));

        $berita->update($data);
        return redirect()->route('berita.index')->with('status', "$this->title  has been updated successfully");
    }


    public function destroy(int $id)
    {
        $berita = Berita::findOrFail($id);
        $berita->deleted = 1;
        $berita->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
