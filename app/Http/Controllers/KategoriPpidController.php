<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategoriPpidRequest;
use App\Models\KategoriPpid;
use http\Env\Request;

class KategoriPpidController extends Controller
{
    private string $routePrefix = 'kategori_ppid';
    private string $title = 'Kategori PPID';
    private array $fields = [
        ['name' => 'nama_kategori', 'type' => 'text', 'label' => 'Nama Kategori'],
    ];

    public function index(\Illuminate\Http\Request $request)
    {
        $search = $request->input('search');

        $data = KategoriPpid::where('nama_kategori', 'like', "%$search%")
            ->paginate(10);

        return view('crud.table', [
            'data' => $data,
            'total' => KategoriPpid::count(),
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

    public function store(KategoriPpidRequest $request)
    {
        KategoriPpid::create($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => KategoriPpid::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(KategoriPpidRequest $request, KategoriPpid $kategoriPpid)
    {
        $kategoriPpid->update($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(KategoriPpid $kategoriPpid)
    {
        $kategoriPpid->deleted = 1;
        $kategoriPpid->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
