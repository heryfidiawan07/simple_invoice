@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-4">
        	<div class="card">
        		<div class="card-header">Pembayaran</div>
        		<div class="card-body">
        			<div class="table-responsive">
					    <table class="table table-hover">
					        <thead>
					            <tr>
					                <th scope="col">No Invoice</th>
					                <th scope="col">Total Harga</th>
					            </tr>
					        </thead>
					        <tbody>
				                <tr>
				                	<td>{{$invoice->no_invoice}}</td>
				                    <td>Rp {{number_format($invoice->total_harga)}}</td>
				                </tr>
					        </tbody>
					    </table>
					</div>
        		</div>
        	</div>
		</div>
		
		<div class="col-md-8">
			<div class="card">
        		<div class="card-header">Invoice Details - {{$invoice->no_invoice}}</div>
        		<div class="card-body">
        			<div class="table-responsive">
					    <table class="table table-hover">
					        <thead>
					            <tr>
					                <th scope="col">Nama</th>
					                <th scope="col">Harga Satuan</th>
					                <th scope="col">Qty</th>
					                <th scope="col">Sub Total</th>
					            </tr>
					        </thead>
					        <tbody>
				                @foreach ($invoice->details as $detail)
				                	<tr>
				                		<td>{{$detail->product->nama}}</td>
				                		<td>Rp {{number_format($detail->product->harga_satuan)}}</td>
				                		<td>{{$detail->qty}}</td>
				                		<td>Rp {{number_format($detail->sub_harga)}}</td>
				                	</tr>
				                @endforeach
					        </tbody>
					    </table>
					</div>
        		</div>
        		<div class="card-footer">
        			Total Harga : <b>Rp {{number_format($invoice->total_harga)}}</b>
        		</div>
        	</div>
		</div>

    </div>
</div>
@endsection
