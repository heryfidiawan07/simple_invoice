<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {	
    	return view('home');
    }

  	// public function karatsuba($num1, $num2){

		// if( ($num1 < 10 ) || ( $num2 < 10 ) ){
		// 	return $num1 * $num2;
		// }
		// // menghitung ukuran angka
		// $m  = max( log10($num1 ), log10($num2 ));
		// // $m2 = floor( $m / 2 );
		// $m2 = ceil($m/2);

		// // pisahkan urutan digit di tengah
		// $sn1   = "".$num1;
		// $high1 = (int)substr($sn1, 0, strlen($sn1) - $m2);
		// $low1  = (int)substr($sn1, - $m2);

		// $sn2   = "".$num2;
		// $high2 = (int)substr($sn2, 0, strlen($sn2) - $m2);
		// $low2  = (int)substr($sn2, -$m2);

		// // panggilan dilakukan ke nomor sekitar setengah ukuran
		// $z0 = $this->karatsuba( $low1 , $low2 );
		// $z1 = $this->karatsuba( $low1 + $high1 , $low2 + $high2 );
		// $z2 = $this->karatsuba( $high1 , $high2 );
		// return ( $z2 * pow(10, 2 * $m2 )) + (( $z1 - $z2 - $z0 ) * pow(10, $m2 )) + $z0;
  	// }

    // public function harga(){
    // 	$harga = $this->karatsuba(5,5);
    // 	return $harga;
    // }
    
    
}
