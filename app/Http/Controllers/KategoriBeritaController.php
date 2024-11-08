<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriBeritaRequest;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{
    private string $routePrefix = 'kategori_berita';
    private string $title = 'Kategori Berita';
    private array $fields = [
        ['name' => 'kategori', 'type' => 'text', 'label' => 'Kategori']
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = KategoriBerita::where('kategori', 'like', "%$search%")
            ->paginate(10);

        return view('crud.table', [
            'data' => $data,
            'total' => KategoriBerita::count(),
            'columns' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('crud.create', [
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function store(KategoriBeritaRequest $request)
    {
        KategoriBerita::create($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => KategoriBerita::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(KategoriBeritaRequest $request, KategoriBerita $kategoriBerita)
    {
        $kategoriBerita->update($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(KategoriBerita $kategoriBerita)
    {
        $kategoriBerita->deleted = 1;
        $kategoriBerita->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
