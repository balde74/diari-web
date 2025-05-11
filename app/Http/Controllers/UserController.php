<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend/user/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $districts = District::all();
        $roles = Role::all();
        return view('backend/user/create',compact('districts','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'   => ['required', 'string', 'max:255', 'min:2'],
            'last_name'    => ['required', 'string', 'max:255', 'min:2'],
            'email'        => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'     => ['required', 'string', 'min:8', 'confirmed'],
            'role_id'      => ['required', 'integer','exists:roles,id'], 
            'district_id'  => ['required_unless:role_id,1,2', 'nullable', 'exists:districts,id'],
        ]);
      
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role_id'=> $request->role_id,
            'password' => Hash::make($request->password),
        ]);

        if($request->filled('district_id')) {
            $user->district_id = $request->district_id;
            $user->save();
        }

        return redirect(route('user.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $districts = District::all();
        $roles = Role::all();
        return view('backend/user/edit',compact('districts','roles','user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255', 'min:2'],
            'last_name'  => ['required', 'string', 'max:255', 'min:2'],
            'email'      => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role_id'    => ['required', 'exists:roles,id'],
            'district_id' => ['required_unless:role_id,1,2'],
            'password'   => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        
        if(Auth::user()->role_id == 1)
        {
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
        
            $user->role_id = $request->role_id;
            // District en tenant compte du role
            if (in_array($request->role_id, [1, 2])) {
                $user->district_id = null; 
            } else {
                $user->district_id = $request->district_id;
            }

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
        }
        return redirect()->route('user.index')->with('success', 'Utilisateur modifié avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
