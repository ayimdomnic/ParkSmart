<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;
use App\Models\User;
use Auth;
use App\Http\Requests\UserRequest as Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all()->pluck('display_name', 'id');
        return view('backend.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('backend.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $picture = $request->file('avatar');

        if ($picture && $picture->isValid()) {
            $request['avatar'] = $picture->store('uploads/users');
        }
        
        // Create user
        $user = User::create($request->input());

        // Attach roles
        $user->roles()->attach($request['roles']);

        return redirect()->route('backend.users.index')->with('alerts', [
            'type' => 'success',
            'message' => 'User Added Succesfully!' 
          ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $role = Role::all();

        return view('backend.users.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = Role::all();

        return view('backend.users.edit',  compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $picture = $request->file('avatar');
        if ($picture && $picture->isValid()) {
            $request['avatar'] = $picture->store('uploads/users');
        }

        // Do not reset password if not entered/changed
        if (empty($request['password'])) {
            unset($request['password']);
            unset($request['password_confirmation']);
        }

        // Update user
        $user->update($request->input());

        // Attach roles
        $user->roles()->sync($request['roles']);

        return redirect()->route('backend.users.index')->with('alerts', ['type' => 'success', 'message' => 'User Updated Succesfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($user->id == \Auth::user()->id) {
            $message = 'You can not delete your own account';

            flash($message)->error();

            return redirect()->route('backend.users.index');
        }

    }
}
