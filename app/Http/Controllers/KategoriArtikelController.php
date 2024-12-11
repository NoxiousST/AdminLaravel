<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriArtikelRequest;
use App\Models\KategoriArtikel;
use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    private string $routePrefix = 'kategori_artikel';
    private string $title = 'Kategori Artikel';
    private array $fields = [
        ['name' => 'kategori', 'type' => 'text', 'label' => 'Kategori'],
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => KategoriArtikel::all(),
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

    public function store(KategoriArtikelRequest $request)
    {
        KategoriArtikel::create($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => KategoriArtikel::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(KategoriArtikelRequest $request, int $id)
    {
        $kategoriArtikel = KategoriArtikel::findOrFail($id);
        $kategoriArtikel->update($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(int $id)
    {
        $kategoriArtikel = KategoriArtikel::findOrFail($id);
        $kategoriArtikel->deleted = 1;
        $kategoriArtikel->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
