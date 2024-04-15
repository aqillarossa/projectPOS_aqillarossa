<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
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

public function edit(Category $kategori): View
    {
        return view('categori.edit', compact('kategori'))->with(["title" => "Edit Kategori"]);
    }

    public function update(Request $request, Category $kategori):RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);


        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('updated','Kategori Berhasil Diubah.');
    }

}
