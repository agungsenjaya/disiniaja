@extends('layouts.owner')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb text-uppercase small">
    <li class="breadcrumb-item"><a href="{{ route('owner.paket') }}">Paket</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
<form method="POST" action="{{ route('owner.paket_store') }}">
  @csrf
  <input type="hidden" name="data">
<section class="card mb-3">
    <div class="card-body">
  <div class="mb-3 row">
  <div class="col">
    <label class="form-label">Judul Paket<span class="text-danger ms-1">*</span></label>
    <input type="text" class="form-control" name="name" required>
  </div>
  <div class="col">
    <label class="form-label">Kategori Paket<span class="text-danger ms-1">*</span></label>
    <select class="form-select" name="package_kat_id" id="" required>
      <option value="">-- Select Option --</option>
      @foreach($kategori as $kat)
      <option value="{{ $kat->id }}">{{ $kat->name }}</option>
      @endforeach
    </select>
  </div>
  </div>
  <div class="">
    <label class="form-label">Jumlah Orang</label>
    <input type="number" class="form-control" name="orang">
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
  <section class="card mb-3">
    <div class="card-body">
          <label class="form-label">Biaya Paket<span class="text-danger ms-1">*</span></label>
          <div class="input-group">
  <span class="input-group-text" id="biaya">Rp</span>
  <input class="form-control" id="currency-mask" name="price" required>
</div>
      </div>
    </section>
<!-- <button type="button" class="btn btn-outline-primary me-2" onClick="kalkulasi()">Kalkulasi</button> -->
<button type="submit" class="btn btn-primary">Insert Paket</button>
</form>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script>
  var currencyMask = IMask(
  document.getElementById('currency-mask'),
  {
    mask: 'num',
    blocks: {
      num: {
        mask: Number,
        thousandsSeparator: '.'
      }
    }
  });

  function delFrame(e) {
    $(`.frame-${e}`).remove();
  }
  
  function delCetak(e) {
    $(`.cetak-${e}`).remove();
  }
  
let frame = 1;
let cetak = 1;

  $('#frame_add').on('click', function(){
    let fr = frame++;
    $('#frame').append(`<div class="row mt-3 frames frame-${fr}">
        <div class="col">
          <select id="" name="frame" class="form-select" required>
            <option value="">-- Select Option --</option>
            @foreach($frame as $fra)
            <option value="{{ $fra }}">{{ $fra->name }} - Rp {{ $fra->price }}</option>
            @endforeach
          </select>
        </div>
        <div class="col">
          <input type="number" name="frame_qty" class="form-control" value="0" required>
        </div>
        <div class="col-1 text-center align-self-center">
        <a href="javascript:void(0)" class="text-danger" onClick="delFrame(${fr})">
          <i class="bi bi-dash-circle-fill"></i>
        </a>
        </div>
      </div>`);
  });

  $('#cetak_add').on('click', function(){
    let ct = cetak++;
    $('#cetak').append(`<div class="row mt-3 cetaks cetak-${ct}"">
        <div class="col">
          <select id="" name="cetak" class="form-select" required>
            <option value="">-- Select Option --</option>
            @foreach($cetak as $cet)
            <option value="{{ $cet }}">{{ $cet->name }} - Rp {{ $cet->price }}</option>
            @endforeach
          </select>
        </div>
        <div class="col">
          <input type="number" name="cetak_qty" class="form-control" value="0" required>
        </div>
        <div class="col-1 text-center align-self-center">
        <a href="javascript:void(0)" class="text-danger" onClick="delCetak(${ct})">
          <i class="bi bi-dash-circle-fill"></i>
        </a>
        </div>
      </div>`);
  });

  $('form').submit(function(event){
    var ars = [];
    var ids = $('.frames').map(function() {
    var va = JSON.parse($(this).find(`select[name="frame"]`).val());
    var vi = JSON.parse($(this).find(`input[name="frame_qty"]`).val());
    ars.push({id: va.id, name: va.name, qty: vi, price: va.price, price_m: va.price_m});
    });
    
    var arss = [];
    var ods = $('.cetaks').map(function() {
    var ve = JSON.parse($(this).find(`select[name="cetak"]`).val());
    var vo = JSON.parse($(this).find(`input[name="cetak_qty"]`).val());
    arss.push({id: ve.id, name: ve.name, qty: vo, price: ve.price, price_m: ve.price_m});
    });

    var arsss = [];
    if (ars.length > 0 && arss.length > 0) {
      arsss.push({frame:ars,cetak:arss});
      $('input[name="data"]').val(JSON.stringify(arsss));
    }else if(ars.length > 0){
      arsss.push({frame:ars});
      $('input[name="data"]').val(JSON.stringify(arsss));
    }else if(arss.length > 0){
      arsss.push({frame:arss});
      $('input[name="data"]').val(JSON.stringify(arsss));
    }else{
    }
    console.log(arsss);
    return true
  });
</script>
@endsection