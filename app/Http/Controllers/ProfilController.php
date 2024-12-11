<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilRequest;
use App\Models\Profil;
use App\Traits\FileUploads;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    use FileUploads;

    private string $routePrefix = 'profil';
    private string $title = 'Profil';
    private array $fields = [
        ['name' => 'nama_desa', 'type' => 'richeditor', 'label' => 'Nama Desa'],
        ['name' => 'sambutan', 'type' => 'richeditor', 'label' => 'Sambutan'],
        ['name' => 'profil', 'type' => 'richeditor', 'label' => 'Profil'],
        ['name' => 'visi', 'type' => 'richeditor', 'label' => 'Visi'],
        ['name' => 'misi', 'type' => 'richeditor', 'label' => 'Misi'],
        ['name' => 'tupoksi', 'type' => 'richeditor', 'label' => 'Tupoksi'],
        ['name' => 'sejarah', 'type' => 'richeditor', 'label' => 'Sejarah'],
        ['name' => 'wilayah_desa', 'type' => 'richeditor', 'label' => 'Wilayah Desa'],
        ['name' => 'alamat', 'type' => 'richeditor', 'label' => 'Alamat'],
        ['name' => 'iframe_maps', 'type' => 'richeditor', 'label' => 'Maps'],
        ['name' => 'nomor_telepon', 'type' => 'tel', 'label' => 'Telepon'],
        ['name' => 'file', 'type' => 'file', 'label' => 'File'],
        ['name' => 'file2', 'type' => 'file', 'label' => 'File 2'],
        ['name' => 'file3', 'type' => 'file', 'label' => 'File 3']
    ];

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('crud.table', [
            'data' => Profil::all(),
            'columns' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('crud.create', [
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    /**
     * @param ProfilRequest $request
     * @return RedirectResponse
     */
    public function store(ProfilRequest $request)
    {
        $data = $request->validated();

        foreach (['file', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile(null, $request, $data, $fileField, $this->routePrefix));
        Profil::create($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been created successfully");
    }

    /**
     * @param string $id
     * @return Application|Factory|View
     */
    public function edit(string $id)
    {
        return view('crud.edit', [
            'data' => Profil::findOrFail($id),
            'fields' => $this->fields,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    /**
     * @param ProfilRequest $request
     * @param Profil $profil
     * @return RedirectResponse
     */
    public function update(ProfilRequest $request, int $id)
    {
        $profil = Profil::findOrFail($id);
        $data = $request->validated();

        foreach (['file1', 'file2', 'file3'] as $fileField)
            $data = array_merge($data, $this->handleFile($profil, $request, $data, $fileField, $this->routePrefix, true));
        $profil->update($data);

        return redirect()->route("$this->routePrefix.index")
            ->with('status', "$this->title has been updated successfully");
    }

    /**
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $profil = Profil::findOrFail($id);
        $profil->delete();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
