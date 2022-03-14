@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb text-uppercase small">
    <li class="breadcrumb-item"><a href="{{ route('owner.paket') }}">Paket</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
<form method="POST" action="{{ route('owner.paket_store') }}">
      @csrf
<section class="card mb-3">
    <div class="card-body">
  <div class="mb-3 row">
  <div class="col">
    <label class="form-label">Judul Paket<span class="text-danger ms-1">*</span></label>
    <input type="text" class="form-control" name="name" required>
  </div>
  <div class="col">
    <label class="form-label">Kategori Paket<span class="text-danger ms-1">*</span></label>
    <select class="form-select" name="order_kat_id" id="" required>
      <option value="">-- Select Option --</option>
      @foreach($kategori as $kat)
      <option value="{{ $kat->id }}">{{ $kat->name }}</option>
      @endforeach
    </select>
  </div>
  </div>
</div>
</section>
<section class="card mb-3">
    <div class="card-body">
    <div class="row">
    <div class="col-md-6">
      <div class="d-flex">
        <a href="javascript:void(0)" id="frame_add">
          <i class="bi bi-plus-circle-fill me-1"></i>
          <span>Tambah Frame</span>
        </a>
      </div>
      <div id="frame">
      </div>
    </div>
    <div class="col-md-6">
      <div class="d-flex">
        <a href="javascript:void(0)" id="cetak_add">
          <i class="bi bi-plus-circle-fill me-1"></i>
          <span>Tambah Cetakan</span>
        </a>
      </div>
      <div id="cetak">
      </div>
    </div>
    </div>
    </div>
</section>
<button type="submit" class="btn btn-primary">Insert Paket</button>
</form>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script>
  // var currencyMask = IMask(
  // document.getElementById('currency-mask'),
  // {
  //   mask: 'num',
  //   blocks: {
  //     num: {
  //       mask: Number,
  //       thousandsSeparator: ','
  //     }
  //   }
  // });

  $('#frame_add').on('click', function(){
    $('#frame').append(`<div class="row mt-3">
        <div class="col">
          <select name="" id="" class="form-select">
            <option value="">-- Select Option --</option>
            @foreach($frame as $fra)
            <option value="{{ $fra->id }}">{{ $fra->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col">
          <input type="number" class="form-control" value="0">
        </div>
        <div class="col-1 text-center align-self-center">
        <a href="javascript:void(0)" class="text-danger">
          <i class="bi bi-dash-circle-fill"></i>
        </a>
        </div>
      </div>`);
  });

  $('#cetak_add').on('click', function(){
    $('#cetak').append(`<div class="row mt-3">
        <div class="col">
          <select name="" id="" class="form-select">
            <option value="">-- Select Option --</option>
            @foreach($cetak as $cet)
            <option value="{{ $cet->id }}">{{ $cet->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col">
          <input type="number" class="form-control" value="0">
        </div>
        <div class="col-1 text-center align-self-center">
        <a href="javascript:void(0)" class="text-danger">
          <i class="bi bi-dash-circle-fill"></i>
        </a>
        </div>
      </div>`);
  });
</script>
@endsection