<?php

namespace App\Http\Controllers;

use App\Http\Requests\RunningTextRequest;
use App\Models\RunningText;
use Illuminate\Http\Request;

class RunningTextController extends Controller
{
    private string $routePrefix = 'running_text';
    private string $title = 'Running Text';
    private array $fields = [
        ['name' => 'running_text', 'type' => 'text', 'label' => 'Running Text'],
    ];

    public function index()
    {
        return view('crud.table', [
            'data' => RunningText::all(),
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

    public function store(RunningTextRequest $request)
    {
        RunningText::create($request->validated());

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => RunningText::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(RunningTextRequest $request, int $id)
    {
        $runningText = RunningText::findOrFail($id);
        $runningText->update($request->validated());

        return redirect()->route("$this->routePrefix.index")->with('status', "$this->title; has been updated successfully");
    }

    public function destroy(int $id)
    {
        $runningText = RunningText::findOrFail($id);
        $runningText->deleted = 1;
        $runningText->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }

}
