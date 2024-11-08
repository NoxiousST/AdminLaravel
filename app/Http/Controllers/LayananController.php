<?php

namespace App\Http\Controllers;

use App\Http\Requests\LayananRequest;
use App\Models\KategoriLayanan;
use App\Models\Layanan;
use App\Traits\FileUploads;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'layanan';
    private string $title = 'Layanan';
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

        $data = Layanan::with('kategori')
            ->when($search, fn($query) => $query->where('judul', 'like', "%$search%"))
            ->paginate(10);

        return view('crud.table', [
            'data' => $data,
            'total' => Layanan::count(),
            'columns' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('crud.create', [
            'fields' => $this->fields,
            'kategoris' => KategoriLayanan::all(),
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function store(LayananRequest $request)
    {
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile(null, $request, $data, $fileField, $this->routePrefix));
        Layanan::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => Layanan::findOrFail($id),
            'kategoris' => KategoriLayanan::all(),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(LayananRequest $request, Layanan $layanan)
    {
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile($layanan, $request, $data, $fileField, $this->routePrefix, true));
        $layanan->update($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->deleted = 1;
        $layanan->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
