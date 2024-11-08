<?php

namespace App\Http\Controllers;

use App\Http\Requests\PpidRequest;
use App\Models\KategoriPpid;
use App\Models\Ppid;
use App\Traits\FileUploads;
use Illuminate\Http\Request;

class PpidController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'ppid';
    private string $title = 'PPID';
    private array $fields = [
        ['name' => 'id_kategori', 'type' => 'select|idkategori', 'label' => 'ID Kategori'],
        ['name' => 'nama_dokumen', 'type' => 'text', 'label' => 'Nama Dokumen'],
        ['name' => 'file1', 'type' => 'file', 'label' => 'File 1'],
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = Ppid::with('nama_kategori')
            ->when($search, fn($query) => $query->where('judul', 'like', "%$search%"))
            ->paginate(10);

        return view('crud.table', [
            'data' => $data,
            'total' => Ppid::count(),
            'columns' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('crud.create', [
            'fields' => $this->fields,
            'kategoris' => KategoriPpid::all(),
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function store(PpidRequest $request)
    {
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile(null, $request, $data, 'file1', $this->routePrefix));
        Ppid::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => Ppid::findOrFail($id),
            'kategoris' => KategoriPpid::all(),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(PpidRequest $request, Ppid $ppid)
    {
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile($ppid, $request, $data, 'file1', $this->routePrefix, true));
        $ppid->update($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    public function destroy(Ppid $ppid)
    {
        $ppid->deleted = 1;
        $ppid->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
