<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AlbumController extends Controller
{
    private string $routePrefix = 'album';
    private string $title = 'Album';
    private array $fields = [
        ['name' => 'album', 'type' => 'text', 'label' => 'Album'],
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => Album::all(),
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

    public function store(AlbumRequest $request)
    {
        Album::create($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => Album::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(AlbumRequest $request, int $id)
    {
        $album = Album::findOrFail($id);
        $album->update($request->validated());

        return redirect()->route("$this->routePrefix.index")->with('status', "$this->title; has been updated successfully");
    }

    public function destroy(int $id)
    {
        $album = Album::findOrFail($id);
        $album->deleted = 1;
        $album->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
