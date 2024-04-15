<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use Illuminate\Http\RedirectResponse;

class categoryController extends Controller
{
    //
    public function index()
    {
        return view('categori.category', [
            "title" => "kategori",
            "data" => category::all()
        ]);
    }
    public function store(Request $request): RedirectResponse
{
        $request->validate([
            "name" => "required",
            "description" => "nullable",
        ]);
        category::create($request->all());

        return redirect()->route('kategori.index')->with('success','Kategori Berhasil Ditambahkan.');
}

}
