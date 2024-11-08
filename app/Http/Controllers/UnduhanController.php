<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnduhanRequest;
use App\Models\KategoriUnduhan;
use App\Models\Unduhan;
use App\Traits\FileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UnduhanController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'unduhan';
    private string $title = 'Unduhan';
    private array $fields = [
        ['name' => 'id_kategori', 'type' => 'select|idkategori', 'label' => 'ID Kategori'],
        ['name' => 'deskripsi', 'type' => 'richeditor', 'label' => 'Deskripsi'],
        ['name' => 'file', 'type' => 'file', 'label' => 'File'],
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = Unduhan::with('kategori')
            ->when($search, fn($query) => $query->where('deskripsi', 'like', "%$search%"))
            ->paginate(10);

        return view('crud.table', [
            'data' => $data,
            'total' => Unduhan::count(),
            'columns' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('crud.create', [
            'fields' => $this->fields,
            'kategoris' => Unduhan::all(),
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function store(UnduhanRequest $request)
    {
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile(null, $request, $data, 'file', $this->routePrefix));
        Unduhan::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => Unduhan::findOrFail($id),
            'kategoris' => KategoriUnduhan::all(),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(UnduhanRequest $request, Unduhan $unduhan)
    {
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile($unduhan, $request, $data, 'file', $this->routePrefix, true));
        $unduhan->update($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(Unduhan $unduhan)
    {
        $unduhan->deleted = 1;
        $unduhan->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
