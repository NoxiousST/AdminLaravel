<?php

namespace App\Http\Controllers;

use App\Http\Requests\PotensiRequest;
use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PotensiController extends Controller
{
    private string $routePrefix = 'potensi';
    private string $title = 'Potensi';
    private array $fields = [
        ['name' => 'nama_potensi', 'type' => 'text', 'label' => 'Nama Potensi'],
        ['name' => 'foto', 'type' => 'file', 'label' => 'Foto'],
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = Potensi::where('nama_potensi', 'like', "%$search%")
            ->paginate(10);

        return view('crud.table', [
            'data' => $data,
            'total' => Potensi::count(),
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

    public function store(PotensiRequest $request)
    {
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile(null, $request, $data, 'foto', $this->routePrefix));
        Potensi::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => Potensi::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(PotensiRequest $request, Potensi $potensi)
    {
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile($potensi, $request, $data, 'foto', $this->routePrefix, true));
        $potensi->update($data);

        return redirect()->route("$this->routePrefix.index")->with('status', "$this->title has been updated successfully");
    }

    public function destroy(Potensi $potensi)
    {
        $potensi->deleted = 1;
        $potensi->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}