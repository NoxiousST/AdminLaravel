<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriUnduhanRequest;
use App\Models\KategoriUnduhan;
use Illuminate\Http\Request;

class KategoriUnduhanController extends Controller
{
    private string $routePrefix = 'kategori_unduhan';
    private string $title = 'Kategori Unduhan';
    private array $fields = [
        ['name' => 'kategori', 'type' => 'text', 'label' => 'Kategori'],
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => KategoriUnduhan::all(),
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

    public function store(KategoriUnduhanRequest $request)
    {
        KategoriUnduhan::create($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => KategoriUnduhan::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(KategoriUnduhanRequest $request, int $id)
    {
        $kategoriUnduhan = KategoriUnduhan::findOrFail($id);
        $kategoriUnduhan->update($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(int $id)
    {
        $kategoriUnduhan = KategoriUnduhan::findOrFail($id);
        $kategoriUnduhan->deleted = 1;
        $kategoriUnduhan->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
