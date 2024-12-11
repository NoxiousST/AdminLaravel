<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriBeritaRequest;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KategoriBeritaController extends Controller
{
    private string $routePrefix = 'kategori_berita';
    private string $title = 'Kategori Berita';
    private array $fields = [
        ['name' => 'kategori', 'type' => 'text', 'label' => 'Kategori']
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => KategoriBerita::all(),
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
        Log::debug(KategoriBerita::findOrFail($id));
        return view('crud.edit', [
            'data' => KategoriBerita::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(KategoriBeritaRequest $request, int $id)
    {
        KategoriBerita::find($id)->update($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(int $id)
    {
        $kategoriBerita = KategoriBerita::findOrFail($id);
        $kategoriBerita->deleted = 1;
        $kategoriBerita->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
