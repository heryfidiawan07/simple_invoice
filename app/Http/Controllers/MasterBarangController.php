<?php

namespace App\Http\Controllers;

use App\MasterBarang;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function index(){
    	$master_barang = MasterBarang::all();
        return view('master_barang', compact('master_barang'));
    }

    public function store (Request $request) {
    	$request->validate([
    		'kode' => 'required|min:5|max:50',
    		'nama' => 'required|min:3|max:200',
    		'harga_satuan' => 'required|numeric|min:3',
    	]);

    	MasterBarang::create([
    		'kode' => $request->kode,
    		'nama' => $request->nama,
    		'harga_satuan' => $request->harga_satuan,
    	]);
    	return redirect()->back()->with('status', 'Barang berhasil di input.');
    }
    
    public function update (Request $request, $id) {
    	$request->validate([
    		'kode_edit' => 'required|min:5|max:50',
    		'nama_edit' => 'required|min:3|max:200',
    		'harga_satuan_edit' => 'required|numeric|min:3',
    	]);

    	MasterBarang::whereId($id)->update([
    		'kode' => $request->kode_edit,
    		'nama' => $request->nama_edit,
    		'harga_satuan' => $request->harga_satuan_edit,
    	]);
    	return redirect()->back()->with('status', 'Barang berhasil di update.');
    }
    
}
