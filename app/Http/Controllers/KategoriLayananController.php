<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriLayananRequest;
use App\Models\KategoriLayanan;
use Illuminate\Http\Request;

class KategoriLayananController extends Controller
{
    private string $routePrefix = 'kategori_layanan';
    private string $title = 'Kategori Layanan';
    private array $fields = [
        ['name' => 'kategori', 'type' => 'text', 'label' => 'Kategori'],
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => KategoriLayanan::all(),
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

    public function store(KategoriLayananRequest $request)
    {
        KategoriLayanan::create($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => KategoriLayanan::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(KategoriLayananRequest $request, int $id)
    {
        $kategoriLayanan = KategoriLayanan::findOrFail($id);
        $kategoriLayanan->update($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(int $id)
    {
        $kategoriLayanan = KategoriLayanan::findOrFail($id);
        $kategoriLayanan->deleted = 1;
        $kategoriLayanan->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
