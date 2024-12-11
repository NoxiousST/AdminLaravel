<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkTerkaitRequest;
use App\Models\LinkTerkait;
use App\Traits\FileUploads;
use Illuminate\Http\Request;

class LinkTerkaitController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'link_terkait';
    private string $title = 'Link Terkait';
    private array $fields = [
        ['name' => 'link_terkait', 'type' => 'text', 'label' => 'Link Terkait'],
        ['name' => 'file', 'type' => 'file', 'label' => 'File']
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => LinkTerkait::all(),
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

    public function store(LinkTerkaitRequest $request)
    {
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile(null, $request, $data, 'file', $this->routePrefix));
        LinkTerkait::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => LinkTerkait::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(LinkTerkaitRequest $request, int $id)
    {
        $linkTerkait = LinkTerkait::findOrFail($id);
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile($linkTerkait, $request, $data, 'file', $this->routePrefix, true));
        $linkTerkait->update($data);

        return redirect()->route("$this->routePrefix.index")->with('status', "$this->title has been updated successfully");
    }

    public function destroy(int $id)
    {
        $linkTerkait = LinkTerkait::findOrFail($id);
        $linkTerkait->deleted = 1;
        $linkTerkait->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }

}
