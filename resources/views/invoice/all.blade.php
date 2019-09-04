@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-7">

			<div class="card">
				<div class="card-header">
					Data Penjualan
					<div class="float-right">
						<form class="form-inline" action="{{ route('invoice.search') }}" method="POST">
							@csrf
							<div class="form-group mr-1">
								<input type="date" class="form-control form-control-sm" id="date" name="date" required>
							</div>
							<button type="submit" class="btn btn-primary btn-sm">Search</button>
						</form>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
					    <table class="table table-hover">
					        <thead>
					            <tr>
					                <th scope="col">No Invoice</th>
					                <th scope="col">Harga Total</th>
					                <th scope="col">Tanggal</th>
					            </tr>
					        </thead>
					        <tbody>
					            @foreach ($invoices as $invoice)
					                <tr>
					                	<td>{{$invoice->no_invoice}}</td>
					                    <td>Rp {{number_format($invoice->total_harga)}}</td>
					                    <td>{{ date('d M, Y', strtotime($invoice->created_at))}}</td>
					                </tr>
					            @endforeach
					        </tbody>
					    </table>
					</div>
				</div>
			</div>
			
		</div>

    </div>
</div>
@endsection