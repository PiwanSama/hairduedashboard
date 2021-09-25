<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\Model\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
      $roles = Role::get();
      return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {

        $user = User::create($request->except('roles'));

        if($request->roles <> ''){
            $user->roles()->attach($request->roles);
        }

        return redirect()->route('users.index')->with('success','User has been created');

        //$model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        //return redirect()->route('user.index')->withStatus(__('User added successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $user = User::findOrFail($id);
        $roles = Role::get();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
      $user = User::findOrFail($id);
      $this->validate($request, [
          'name'=>'required|max:120',
          'email'=>'required|email|unique:user,email,'.$id,
          'password'=>'required|min:6|confirmed'
      ]);
      $input = $request->except('roles');
      $user->fill($input)->save();
      if ($request->roles <> '') {
          $user->roles()->sync($request->roles);
      }
      else {
          $user->roles()->detach();
      }
      return redirect()->route('users.index')->with('success',
           'User successfully updated.');
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
