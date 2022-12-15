<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserPut;
use App\Http\Requests\StoreUserPost;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return Inertia::render('Users/Index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * StoreUserPost (clase de validaciones)
     */
    public function store(StoreUserPost $request)
    {
        // Validar los campos necesarios
        // Usando el FACADE (class) para las validaciones puntuales.
        // Request::validate([
        //     'name' => 'required|string|max:255',
        // ]);
        // User::create($request->all());

        // Validaciones personalizadas

        User::create($request->validated());

        return Inertia::render('Users/Create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        $customer = User::find($customer);
        return Inertia::render('Users/Show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($customer)
    {
        $customer = User::find($customer);
        return Inertia::render('Users/Edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer)
    {
        $customer = User::find($customer);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $customer->id,
            'password' => 'required|min:8|string',
        ]);


        $customer->update($request->all());

        return redirect()->route('users.index', $customer)->with('success', 'El nivel fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
