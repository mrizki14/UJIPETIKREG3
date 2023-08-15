<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $witels = [
            1 => 'BANDUNG',
            2 => 'BANDUNG BARAT',
            3 => 'CIREBON',
            4 => 'KARAWANG',
            5 => 'SUKABUMI',
            6 => 'TASIKMALAYA'
        ];

        $users = User::with('role')->get();
        $roles = Role::all();
        return view('user',[
            "witels" => $witels,
            "users" => $users,
            "roles" => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'witel' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.index')
                ->withErrors($validator)
                ->withInput();
            // dd('ada kesalahan');
        }
        $create_user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'witel' => $request->witel,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);
      
        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'username' => 'nullable',
            'witel' => 'nullable',
            'password' => 'nullable',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.index')
                ->withErrors($validator)
                ->withInput();
            // dd('ada kesalahan');
        }

        $users = User::where('id', $id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'witel' => $request->witel,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);
   
        return redirect()->route('users.index')->with('success', 'User berhasil diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
