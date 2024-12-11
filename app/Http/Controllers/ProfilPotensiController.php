<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilPotensiRequest;
use App\Models\KategoriBerita;
use App\Models\Potensi;
use App\Models\ProfilPotensi;
use App\Traits\FileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilPotensiController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'profil_potensi';
    private string $title = 'Profil Potensi';
    private array $fields = [
        ['name' => 'id_kategori', 'type' => 'select|idkategori', 'label' => 'ID Kategori'],
        ['name' => 'nama_tempat', 'type' => 'text', 'label' => 'Nama Tempat'],
        ['name' => 'deskripsi', 'type' => 'richeditor', 'label' => 'Deskripsi'],
        ['name' => 'file1', 'type' => 'file', 'label' => 'File 1'],
        ['name' => 'file2', 'type' => 'file', 'label' => 'File 2'],
        ['name' => 'file3', 'type' => 'file', 'label' => 'File 3'],
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => ProfilPotensi::all(),
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

    public function store(ProfilPotensiRequest $request)
    {
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile(null, $request, $data, $fileField, $this->routePrefix));
        ProfilPotensi::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => ProfilPotensi::findOrFail($id),
            'kategoris' => KategoriBerita::all(),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(ProfilPotensiRequest $request, int $id)
    {
        $profilPotensi = ProfilPotensi::findOrFail($id);
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile($profilPotensi, $request, $data, $fileField, $this->routePrefix, true));
        $profilPotensi->update($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(int $id)
    {
        $profilPotensi = ProfilPotensi::findOrFail($id);
        $profilPotensi->deleted = 1;
        $profilPotensi->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
