<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.index', compact('user'));
    }

    // public function loginAuth(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|dns:email',
    //         'password' => 'required|min:3',
    //     ]);

    //     $user = $request->only(['email', 'password']);
    //     if (Auth::attempt($user)) {
    //         return view('/home');
    //     } else{
    //         return redirect()->back()->with('Failed', 'Proses login gagal, silahkan coba kembali dengan data yang sesuai!');
    //     }
    // }

    // public function logout()
    // {
    //     Auth::logout();
    //     return redirect()->route('login')->with('logout', 'Anda telah logout');
    // }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
        ]);

        $password = substr ($request->email, 0, 3). substr($request->name, 0.3);

        User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' => Hash::make($password),
        ]);

        return redirect()->route('user.index')->with('success', 'Berhasil menambhkan data!');
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
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in::staff,guru',
        ]);

        if($request->password){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password)
            ]);
        } else{
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);
        }
        return redirect()->route('user.index')->with('succes', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('succes', 'Berhasil mengahapus data!');
    }
}
