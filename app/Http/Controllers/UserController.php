<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::create($data);
        return response()->json(['message' => 'User created Successfull', 'user'=>$user],201);
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        if(!$user){
            return response()->json(['message' => 'User not Found'],404);
        }
        
        $user->update($request->all());
        return response()->json(['message'=>'Update User Successfully', 'user' => $user]);
    }
}
