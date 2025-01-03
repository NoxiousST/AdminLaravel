<?php

namespace App\Http\Controllers;

use App\Http\Requests\GaleriVideoRequest;
use App\Models\GaleriVideo;
use Illuminate\Http\Request;

class GaleriVideoController extends Controller
{
    private string $routePrefix = 'galleri_video';
    private string $title = 'Galeri Video';
    private array $fields = [
        ['name' => 'link_video', 'type' => 'text', 'label' => 'Link Video'],
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => GaleriVideo::all(),
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

    public function store(GaleriVideoRequest $request)
    {
        GaleriVideo::create($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => GaleriVideo::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(GaleriVideoRequest $request, int $id)
    {
        $galeriVideo = GaleriVideo::findOrFail($id);
        $galeriVideo->update($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title; has been updated successfully");
    }

    public function destroy(int $id)
    {
        $galeriVideo = GaleriVideo::findOrFail($id);
        $galeriVideo->deleted = 1;
        $galeriVideo->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
