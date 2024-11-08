<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaRequest;
use App\Models\Agenda;
use Illuminate\Http\Request;

use App\Traits\FileUploads;

class AgendaController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'agenda';
    private string $title = 'Agenda';
    private array $fields = [
        ['name' => 'judul', 'type' => 'text', 'label' => 'Judul'],
        ['name' => 'tgl', 'type' => 'date', 'label' => 'Tanggal'],
        ['name' => 'deskripsi', 'type' => 'richeditor', 'label' => 'Deskripsi'],
        ['name' => 'file1', 'type' => 'file', 'label' => 'File 1'],
        ['name' => 'file2', 'type' => 'file', 'label' => 'File 2'],
        ['name' => 'file3', 'type' => 'file', 'label' => 'File 3'],
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = Agenda::where('judul', 'like', "%$search%")
            ->paginate(10);

        return view('crud.table', [
            'data' => $data,
            'total' => Agenda::count(),
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

    public function store(AgendaRequest $request)
    {
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile(null, $request, $data, $fileField, $this->routePrefix));
        Agenda::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => Agenda::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(AgendaRequest $request, Agenda $agenda)
    {
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile($agenda, $request, $data, $fileField, $this->routePrefix, true));
        $agenda->update($data);

        return redirect()->route("$this->routePrefix.index")->with('status', "$this->title has been updated successfully");
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->deleted = 1;
        $agenda->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
