<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleriFotoRequest;
use App\Models\GaleriFoto;
use App\Traits\FileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriFotoController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'galeri_foto';
    private string $title = 'Galeri Foto';
    private array $fields = [
        ['name' => 'judul', 'type' => 'text', 'label' => 'Judul'],
        ['name' => 'file1', 'type' => 'file', 'label' => 'File 1'],
        ['name' => 'file2', 'type' => 'file', 'label' => 'File 2'],
        ['name' => 'file3', 'type' => 'file', 'label' => 'File 3'],
        ['name' => 'file4', 'type' => 'file', 'label' => 'File 4'],
        ['name' => 'file5', 'type' => 'file', 'label' => 'File 5']
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => GaleriFoto::all(),
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

    public function store(GaleriFotoRequest $request)
    {
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3', 'file4', 'file5'] as $fileField)
            $data = array_merge($data, $this->handleFile(null, $request, $data, $fileField, $this->routePrefix));
        GaleriFoto::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => GaleriFoto::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(GaleriFotoRequest $request, int $id)
    {
        $galeriFoto = GaleriFoto::findOrFail($id);
        $data = $request->validated();

        // Loop through each file field to check if there's a new file
        foreach (['file1', 'file2', 'file3', 'file4', 'file5'] as $fileField)
            $data = array_merge($data, $this->handleFile($galeriFoto, $request, $data, $fileField, $this->routePrefix, true));
        $galeriFoto->update($data);

        return redirect()->route("$this->routePrefix.index")->with('status', "$this->title has been updated successfully");
    }

    public function destroy(int $id)
    {
        $galeriFoto = GaleriFoto::findOrFail($id);
        $galeriFoto->deleted = 1;
        $galeriFoto->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
