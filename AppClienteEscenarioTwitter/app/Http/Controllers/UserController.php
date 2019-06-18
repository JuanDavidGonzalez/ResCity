<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('users.index', compact('users'));
    }

    public function edit($id)
    {
        dd($id);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        $validator =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if($validator->fails())
            return back()->withInput();//->with('fails', 'Se presento un error, verifique los datos ingresados');
    }
}
