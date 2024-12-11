<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    private string $routePrefix = 'account';
    private string $title = 'Account';
    private array $fields1 = [
        ['name' => 'username', 'type' => 'text', 'label' => 'Username', 'placeholder' => 'John'],
        ['name' => 'fullname', 'type' => 'text', 'label' => 'Nama Lengkap', 'placeholder' => 'John Doe'],
        ['name' => 'NIP', 'type' => 'text', 'label' => 'NIP', 'placeholder' => '12345'],
        ['name' => 'email', 'type' => 'text', 'label' => 'Email', 'placeholder' => 'johndoe@example.com'],
        ['name' => 'telp', 'type' => 'text', 'label' => 'Telepon', 'placeholder' => '08123456789'],
    ];
    private array $fields2 = [
        ['name' => 'is_admin', 'type' => 'number', 'label' => 'Is Admin', 'placeholder' => '0'],
        ['name' => 'id_kabupaten', 'type' => 'number', 'label' => 'ID Kabupaten', 'placeholder' => '0'],
        ['name' => 'batas', 'type' => 'number', 'label' => 'Batas', 'placeholder' => '0'],
        ['name' => 'isok', 'type' => 'number', 'label' => 'ISOK', 'placeholder' => '0'],
    ];

    public function index()
    {
        return view('account', [
            'account' => Auth::user()->first(),
            'fields1' => $this->fields1,
            'fields2' => $this->fields2,
            'routePrefix' => $this->routePrefix,
            'title' => $this->title,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user()->first();
        $validated = $request->validate([
            'fullname' => 'nullable',
            'NIP' => 'nullable',
            'email' => 'nullable',
            'telp' => 'nullable',
            'is_admin' => 'required|integer',
            'id_kabupaten' => 'required|integer',
            'batas' => 'required|integer',
            'isok' => 'required|integer',
        ]);
        $user->update($validated);

        return redirect()->back()->with('status', "Account has been updated successfully");
    }
}
