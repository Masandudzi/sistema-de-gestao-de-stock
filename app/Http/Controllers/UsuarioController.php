<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegisterRequest;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::where('is_active', '1')->get();
        return view('usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = Role::all();
      return view('usuario.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRegisterRequest $request)
    {
      $role = Role::where('slug', $request->role)->first();
    if ($role) {
          $user = User::create([
              'name' => $request->name,
              'email' => $request->email,
              'username' => $request->username,
              'password' => Hash::make($request->password),
              'remember_token' => $request->_token,
          ]);
          $user->roles()->attach($role->id);
          return redirect(route('usuario.create'))->with('success', "Criou novo usuário com permissões de " . $role->name);
      } else {
          return redirect()->back()->with('error', "Precisa definir um nível de acesso válido ao usuáro")->withInput();

      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\  $user->id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = new User();
        $id = $user->decode($id)[0];

        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('usuario.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $user = new User();
      $id = $user->decode($id)[0];

      $user = User::findOrFail($id);
      return $user;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = new User();
      $id = $user->decode($id)[0];

      $user = User::findOrFail($id);
      $user->update(array('is_active' => '0'));

      return redirect(route('usuario.index'))->with('success', "Usuário removido com sucesso");
    }
}
