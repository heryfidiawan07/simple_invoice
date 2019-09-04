<?php

namespace App\Http\Controllers;

use App\MasterBarang;
use App\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }
    
    public function index () {
    	$pembelian = Penjualan::all();
    	return view('penjualan', compact('pembelian'));
    }

    public function karatsuba($num1, $num2){

		if( ($num1 < 10 ) || ( $num2 < 10 ) ){
			return $num1 * $num2;
		}
		// menghitung ukuran angka
		$m  = max( log10($num1 ), log10($num2 ));
		// $m2 = floor( $m / 2 );
		$m2 = ceil($m/2);

		// pisahkan urutan digit di tengah
		$sn1   = "".$num1;
		$high1 = (int)substr($sn1, 0, strlen($sn1) - $m2);
		$low1  = (int)substr($sn1, - $m2);

		$sn2   = "".$num2;
		$high2 = (int)substr($sn2, 0, strlen($sn2) - $m2);
		$low2  = (int)substr($sn2, -$m2);

		// panggilan dilakukan ke nomor sekitar setengah ukuran
		$z0 = $this->karatsuba( $low1 , $low2 );
		$z1 = $this->karatsuba( $low1 + $high1 , $low2 + $high2 );
		$z2 = $this->karatsuba( $high1 , $high2 );
		return ( $z2 * pow(10, 2 * $m2 )) + (( $z1 - $z2 - $z0 ) * pow(10, $m2 )) + $z0;
    }

    public function store (Request $request){
    	$request->validate([
    		'kode' => 'required|min:5|max:50',
    		'qty' => 'required|numeric|min:1',
    	]);
    	$barang = MasterBarang::where('kode', $request->kode)->first();
    	if ($barang) {
	    	$barang->penjualan()->create([
	    		'qty' => $request->qty,
	    		'harga' => $this->karatsuba($barang->harga_satuan, $request->qty),
	    	]);
    	}
    	return redirect()->back();
    }
    
    public function destroy ($id){
    	$barang = MasterBarang::find($id);
    	if ($barang) {
    		$barang->penjualan()->delete();
    	}
    	return redirect()->back();
    }
    
    
}
