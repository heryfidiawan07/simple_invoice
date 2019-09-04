@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                	Daftar Barang
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
					                <th scope="col">Harga</th>
					                <th scope="col">Action</th>
					            </tr>
					        </thead>
					        <tbody>
					            @foreach ($products as $product)
					                <tr>
					                    <td>{{$product->kode}}</td>
					                    <td>{{$product->nama}}</td>
					                    <td>Rp {{number_format($product->harga_satuan)}}</td>
					                    <td>
					                        @include('product.edit_product')
					                    </td>
					                </tr>
					            @endforeach
					        </tbody>
					    </table>
					</div>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
			
        	<div class="card">
        		<div class="card-header">
        			Input Master Barang
        		</div>
        		<div class="card-body">
		        	<form method="POST" action="{{route('product.store')}}">
						@csrf
		                <div class="form-group">
		                    <label for="kode">Kode</label>
		                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" placeholder="Kode barang" value="{{old('kode')}}" name="kode" required>
		                    @error('kode')
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
		                </div>
		                <div class="form-group">
		                    <label for="nama">Nama Barang</label>
		                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Enter nama" value="{{old('nama')}}" name="nama" required>
		                    @error('nama')
		                        <span class="invalid-feedback" role="alert">
		                            <strong>{{ $message }}</strong>
		                        </span>
		                    @enderror
		                </div>
		                <div class="form-group">
		                    <label for="harga_satuan">Harga Satuan</label>
		                    <input type="text" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan" placeholder="1000" value="{{old('harga_satuan')}}" name="harga_satuan" required>
		                    @error('harga_satuan')
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

    </div>
</div>
@endsection
