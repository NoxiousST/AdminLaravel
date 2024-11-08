<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private string $routePrefix = 'user';
    private string $title = 'User';
    private array $fields = [
        ['name' => 'username', 'type' => 'text', 'label' => 'Username'],
        ['name' => 'pwd', 'type' => 'password', 'label' => 'Password'],
        ['name' => 'is_admin', 'type' => 'email', 'label' => 'Is Admin'],
        ['name' => 'id_kabupaten', 'type' => 'text', 'label' => 'ID Kabupaten'],
        ['name' => 'fullname', 'type' => 'text', 'label' => 'Fullname'],
        ['name' => 'NIP', 'type' => 'text', 'label' => 'NIP'],
        ['name' => 'email', 'type' => 'text', 'label' => 'Email'],
        ['name' => 'telp', 'type' => 'text', 'label' => 'Telepon'],
        ['name' => 'batas', 'type' => 'number', 'label' => 'Batas'],
        ['name' => 'isok', 'type' => 'number', 'label' => 'ISOK'],
    ];

    public function index(Request $request)
    {
        $search = $request->input('search');

        $data = User::where('username', 'like', "%$search%")
            ->paginate(10);

        return view('crud.table', [
            'data' => $data,
            'total' => User::count(),
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

    public function store(UserRequest $request)
    {
        User::create($request->validated());

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

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route("$this->routePrefix.index")->with('status', "$this->title; has been updated successfully");
    }

    public function destroy(User $user)
    {
        $user->deleted = 1;
        $user->save();

        return redirect()->back()->with('status', "$this->title has been updated successfully");
    }
}
