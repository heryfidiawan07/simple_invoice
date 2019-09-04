<?php

namespace App\Http\Controllers;

use DB;
use App\Product;
use App\Invoice;
use App\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function store(){
    	$invoice = Invoice::create([
    		'no_invoice' => 'HERY-'.str_random(5),
    	]);
    	return redirect()->route('invoice.update', ['invoice' => $invoice->no_invoice]);
    }
    
    public function update($no_inv){
    	$invoice = Invoice::where('no_invoice', $no_inv)->first();
    	if ($invoice) {
	    	$details = $invoice->details()->get();
	    	return view('invoice.create-invoice-detail', compact('invoice','details'));
    	}
    	return redirect()->back();
    }

    public function detail(Request $request, $inv_id){
    	$request->validate([
    		'kode' => 'required|min:5|max:50',
    		'qty' => 'required|numeric|min:1',
    	]);
    	$invoice = Invoice::find($inv_id);
    	if ($invoice) {
    		$product = Product::where('kode', $request->kode)->first();
    		if ($product) {
		    	$invoice->details()->create([
		    		'product_id' => $product->id,
		    		'qty' => $request->qty,
		    		'sub_harga' => $this->karatsuba($product->harga_satuan, $request->qty),
		    	]);
    		}
    	}
    	return redirect()->back();
    }

    public function destroy($id){
    	$detail = InvoiceDetail::find($id);
    	if ($detail) {
    		$detail->delete();
    	}
    	return redirect()->back();
    }
    
    public function bayar($no_inv){
    	$invoice = Invoice::where('no_invoice',$no_inv)->first();
    	if ($invoice) {
    		$invoice->update([
    			'total_harga' => $invoice->details()->sum('sub_harga'),
    		]);
    	}
    	return view('invoice.show', compact('invoice'));
    }
    
    public function all(){
    	$invoices = Invoice::all();
    	return view('invoice.all', compact('invoices'));
    }

    public function search(Request $request){
		$invoices = DB::table('invoices')
		            ->whereDate('created_at', $request->date)
		            ->get();
    	return view('invoice.all', compact('invoices'));
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
    
}
