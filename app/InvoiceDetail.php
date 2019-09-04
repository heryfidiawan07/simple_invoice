<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = ['product_id','qty','sub_harga',];

    protected $table = 'invoice_details';

    public function invoice(){
    	return $this->belongsTo(Invoice::class);
    }
    
    public function product(){
    	return $this->belongsTo(Product::class);
    }
    
}
