<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        // $data = [
        //     'users' => $users
        // ];
        // return view('users.index', $data);


        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|same:confirm'
        ]);

        $data['password'] = Hash::make($request->password);


        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $user->save();


        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' =>  Hash::make($request->password)
        // ]);

        $user = User::create($data);

        return redirect()->route('users.index');
        // return to_route('users.index');

    }



    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:8|same:confirm'
        ]);

        $data = $request->except('password');


        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }


        $user->update($data);

        return to_route('users.index');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return to_route('users.index');
    }
}


