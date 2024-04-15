<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
    //
    public function index()
    {
        return view('customer.tabel', [
            "title" => "Customer",
            "data" => Customer::all()
        ]);
    }
    public function create():View
    {
        return view('Customer.tambah')->with(["title" => "Tambah data customer"]);
    }
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "phone"=>"required",
            "address"=>"nullable"
        ]);

        Customer::create($request->all());
        return redirect()->route('pelanggan.index')->with('succes','data Customer berhasil di tambahkan');
    }
    public function edit(Customer $pelanggan):View
    {
        return view('Customer.edit',compact('pelanggan'))->with(["title" => "ubah data customer"
    ]);
    }
    public function update(Request $request,Customer $pelanggan):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "phone"=>"required",
            "address"=>"nullable"
        ]);

        $pelanggan->update($request->all());
        return redirect()->route('pelanggan.index')->with('updated','data pelanggan berhasil di ubah');
    }
    public function show(Customer $pelanggan):View
    {
        return view('Customer.tampil',compact('pelanggan'))
        ->with(["title" => "data customer"]);
    }
}
