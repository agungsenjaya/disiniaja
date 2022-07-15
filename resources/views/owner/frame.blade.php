@extends('layouts.owner')
@section('content')
@php
$no = 1;
@endphp
<section class="card">
    <div class="card-body">
    <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Frame</th>
                <th>Stock</th>
                <th>Harga Modal</th>
                <th>Harga Jual</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($frame->reverse() as $fra)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $fra->name }}</td>
                <td>
                    <span class="qts-{{ $fra->id }}">
                    @if($fra->qty == NULL || $fra->qty == 0)
                    0
                    @else
                    {{ $fra->qty }}
                    @endif
                    </span>
                </td>
                <td>Rp {{ $fra->price_m }}</td>
                <td>Rp {{ $fra->price }}</td>
                <td>
                    <div class="d-flex">
                        <a href="javascript:void(0)" onClick="getId({{ $fra->id }})" data-bs-toggle="modal" data-bs-target="#modalStock" class="btn btn-primary btn-sm flex-fill me-2"><i class="bi-plus me-2"></i>Stock</a>
                        <a href="javascript:void(0)" class="btn btn-outline-primary btn-sm flex-fill">Edit</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="modalStock" tabindex="-1" aria-labelledby="modalStockLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title opacity-0" id="modalStockLabel">Tambah Stock</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="addstock">
        @csrf
      <div class="modal-body">
			<input type="hidden" name="product_id">
			<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
			<div class="mb-3">
				<label for="" class="form-label">Tambah Quantity</label>
				<input type="number" class="form-control" name="qty">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <div class="sub">
                <button type="submit" class="btn btn-primary">Insert Stock</button>
            </div>
            <div class="load d-none">
                <button class="btn btn-primary">
                <div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>
                </button>
            </div>
		</div>
	</form>
    </div>
  </div>
</div>
@endsection
@section('js')
<script>
    const qrs = document.getElementById('modalStock');
    const mds = new bootstrap.Modal(qrs);
    function getId(e){
			$('input[name="product_id"]').val(e);
		}

        $('#addstock').submit(function(){
            $('.sub').addClass('d-none');
            $('.load').removeClass('d-none');
			var formdata = $(this).serializeArray();
			$.ajax({
			type: "POST",
			url: "http://localhost:8000/api/stock_add",
			data: formdata,
			success: function (response) {
                mds.hide();
                $('.load').addClass('d-none');
                $('.sub').removeClass('d-none');
                $('input[name="qty"]').val(0);
                
                $a = $(`.qts-${response.data.product_id}`).text();
                $b =  parseInt($a) + parseInt(response.data.qty);
                $(`.qts-${response.data.product_id}`).text($b);
			}
		});
		return false;
		})
</script>
@endsection