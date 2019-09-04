<!-- Button trigger modal -->
<button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#delete_detail_{{$detail->id}}">
    Hapus
</button>
<!-- Modal -->
<div class="modal fade" id="delete_detail_{{$detail->id}}" tabindex="-1" role="dialog" aria-labelledby="delete_detail_{{$detail->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delete_detail_{{$detail->id}}">Hapus {{$detail->product->nama}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				
				<a href="{{ route('detail.destroy', ['detail' => $detail->id]) }}" class="btn btn-danger btn-sm">Hapus !</a>
				<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>