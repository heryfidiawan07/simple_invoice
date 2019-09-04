<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['no_invoice', 'total_harga',];

    public function details(){
    	return $this->hasMany(InvoiceDetail::class);
    }
    
}
