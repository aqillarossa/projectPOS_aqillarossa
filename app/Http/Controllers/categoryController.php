<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class categoryController extends Controller
{
    //
    public function index()
    {
        return view('category.category', [
            "title" => "Kategori",
            "data" => Category::all()
        ]);
    }
    public function store(Request $request): RedirectResponse
{
        $request->validate([
            "name" => "required",
            "description" => "nullable",
        ]);
        Category::create($request->all());

        return redirect()->route('kategori.index')->with('success','Kategori Berhasil Ditambahkan.');
}

}
