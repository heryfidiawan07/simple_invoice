<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    
    public function index(){
    	$products = Product::all();
    	return view('product.index', compact('products'));
    }

    public function store(Request $request){
    	$request->validate([
    		'kode' => 'required|min:5|max:50',
    		'nama' => 'required|min:3|max:200',
    		'harga_satuan' => 'required|numeric|min:3',
    	]);
    	Product::create([
    		'kode' => $request->kode,
    		'nama' => $request->nama,
    		'harga_satuan' => $request->harga_satuan,
    	]);
    	return redirect()->back()->with('status', 'Produk berhasil di input.');
    }
 	
 	public function update(Request $request, $id){
 	   	$request->validate([
    		'kode_edit' => 'required|min:5|max:50',
    		'nama_edit' => 'required|min:3|max:200',
    		'harga_satuan_edit' => 'required|numeric|min:3',
    	]);

    	Product::whereId($id)->update([
    		'kode' => $request->kode_edit,
    		'nama' => $request->nama_edit,
    		'harga_satuan' => $request->harga_satuan_edit,
    	]);
    	return redirect()->back()->with('status', 'Produk berhasil di update.');
	}
 	      
    
}
