@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-4">
			
        	<div class="card">
        		<div class="card-header">Kasir</div>
        		<div class="card-body">
		        	<form method="POST" action="{{route('detail.store', ['invoice' => $invoice->id])}}">
						@csrf
		                <div class="form-group">
		                    <label for="kode">Kode Barang</label>
		                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="Kode / Nama barang" value="{{old('kode')}}" name="kode" required>
		                    @error('kode')
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
		                </div>
		                <div class="form-group">
		                    <label for="qty">Jumlah Pembelian</label>
		                    <input type="text" class="form-control @error('qty') is-invalid @enderror" id="qty" placeholder="Qty" value="{{old('qty')}}" name="qty" required>
		                    @error('qty')
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
		                </div>
		                <button type="submit" class="btn btn-primary btn-sm">
		                    <i class="fas fa-paper-plane"></i> Save
		                </button>
		            </form>
        		</div>
        	</div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Daftar Pembelian
                	@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
				
                <div class="card-body">
					<div class="table-responsive">
					    <table class="table table-hover">
					        <thead>
					            <tr>
					                <th scope="col">Kode</th>
					                <th scope="col">Nama</th>
					                <th scope="col">Qty</th>
					                <th scope="col">Total</th>
					                <th scope="col">Action</th>
					            </tr>
					        </thead>
					        <tbody>
					            @foreach ($details as $detail)
					                <tr>
					                	<td>{{$detail->product->kode}}</td>
					                    <td>{{$detail->product->nama}}</td>
					                    <td>{{$detail->qty}}</td>
					                    <td>Rp {{number_format($detail->sub_harga)}}</td>
					                    <td>
					                        @include('invoice.delete_details')
					                    </td>
					                </tr>
					            @endforeach
					            <tr>
						            <td colspan="3"><b>Total</b></td>
						            <td><b>Rp {{number_format($details->sum('sub_harga'))}}</b></td>
						            <td></td>
								</tr>
					        </tbody>
					    </table>
					</div>
                    
                </div>
                <div class="card-footer">
                	<a href="{{ route('invoice.details', ['invoice' => $invoice->no_invoice]) }}" class="btn btn-success btn-sm">Bayar</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
