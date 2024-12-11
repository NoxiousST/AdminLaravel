<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use App\Traits\FileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'banner';
    private string $title = 'Banner';
    private array $fields = [
        ['name' => 'file', 'type' => 'file', 'label' => 'File'],
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => Banner::all(),
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

    public function store(BannerRequest $request)
    {
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile(null, $request, $data, 'file', $this->routePrefix));
        Banner::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function uploads(Request $request)
    {
        Log::debug($request->all());
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => Banner::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(BannerRequest $request, int $id)
    {
        $banner = Banner::findOrFail($id);
        $data = $request->validated();

        $data = array_merge($data, $this->handleFile($banner, $request, $data, 'file', $this->routePrefix, true));
        $banner->update($data);

        return redirect()->route("{$this->routePrefix}.index")->with('status', "$this->title has been updated successfully");
    }

    public function destroy(int $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->deleted = 1;
        $banner->save();

        return redirect()->back()->with('status', "$this->title has been deleted successfully");
    }
}
