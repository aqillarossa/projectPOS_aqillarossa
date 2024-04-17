<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index',[
            "title"=>"data pengguna",
            "data"=>User::all()
        ]);
    }
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "email"=>"email:dns",
            "password"=>"required"
        ]);
        $password=Hash::make($request->password);
        $request->merge([
            "password"=>$password
        ]);
        User::create($request->all());
        return redirect()->route('pengguna.index')->with('succes','data berhasil di tambahkan');
    }


}
