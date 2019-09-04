<!-- Button trigger modal -->
<button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#editProduct_{{$product->id}}">
    Edit
</button>
<!-- Modal -->
<div class="modal fade" id="editProduct_{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editProduct_{{$product->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProduct_{{$product->id}}">Edit {{$product->nama}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <form method="POST" action="{{route('product.update', ['product' => $product->id])}}">
					@csrf
	                <div class="form-group">
	                    <label for="kode">Kode</label>
	                    <input type="text" class="form-control @error('kode') is-invalid @enderror" id="kode" value="{{$product->kode}}" name="kode_edit" required>
	                    @error('kode')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
	                <div class="form-group">
	                    <label for="nama">Nama Barang</label>
	                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{$product->nama}}" name="nama_edit" required>
	                    @error('nama')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
	                <div class="form-group">
	                    <label for="harga_satuan">Harga Satuan</label>
	                    <input type="text" class="form-control @error('harga_satuan') is-invalid @enderror" id="harga_satuan" value="{{$product->harga_satuan}}" name="harga_satuan_edit" required>
	                    @error('harga_satuan')
	                        <span class="invalid-feedback" role="alert">
	                            <strong>{{ $message }}</strong>
	                        </span>
	                    @enderror
	                </div>
	                <button type="submit" class="btn btn-primary btn-sm">
	                    <i class="fas fa-paper-plane"></i> Update
	                </button>
	            </form>

            </div>
        </div>
    </div>
</div>