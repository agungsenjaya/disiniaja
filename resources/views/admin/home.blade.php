@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md">

    <div class="mb-3">
      <div class="input-group">
        <span class="input-group-text" id="search">@</span>
        <input type="text" class="form-control" placeholder="Pencarian paket.." aria-label="Username" aria-describedby="search">
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($paket as $pak)
  <div class="col">
    <div class="card h-100 rounded item" id="item-{{ $pak->id }}" onClick="addItem({{ $pak->id }})" data-item="{{ $pak }}">
      <!-- <img src="..." class="card-img-top" alt="..."> -->
      <div class="card-body">
        <h6 class="card-title text-capitalize fw-bold mb-0">{{ $pak->name }}</h6>
        @if($pak->data)
        @php
        $dat = json_decode($pak->data);
        @endphp
        <p class="mb-0">Max {{ $pak->orang }} Orang</p>
        <p class="sub-nav mt-3 mb-0">Frame</p>
        <ul class="list-group list-group-flush">
            @foreach($dat[0]->frame as $fr)
            <li class="list-group-item ps-0 text-secondary">
              <div class="d-flex justify-content-between">
                <div>
                  <i class="bi-check-circle-fill text-success me-2"></i>{{ $fr->name }}
                </div>
                <div>
                  <i class="bi-x me-1"></i>{{ $fr->qty }}
                </div>
              </div>
              </li>
            @endforeach
        </ul>
        <p class="sub-nav mt-3 mb-0">Cetak</p>
        <ul class="list-group list-group-flush">
            @foreach($dat[0]->cetak as $ct)
            <li class="list-group-item ps-0 text-secondary">
              <div class="d-flex justify-content-between">
                <div>
                  <i class="bi-check-circle-fill text-success me-2"></i>{{ $ct->name }}
                </div>
                <div>
                  <i class="bi-x me-1"></i>{{ $ct->qty }}
                </div>
              </div>
              </li>
            @endforeach
        </ul>
        @endif
      </div>
      <div class="card-footer fw-bold">
        Rp {{ $pak->price }}
      </div>
    </div>
  </div>
  @endforeach
</div>
    </div>
    <div class="col-md-3">
        <p class="sub-nav fw-bold">Daftar Pesanan</p>
        <!-- <h5 class="card-title text-uppercase fw-bold">02 Item</h5> -->
        <ul class="list-group list-group-flush">
  <li class="list-group-item ps-0">
    <div class="media">
      <i class="bi-x me-3"></i>
      <div class="media-body">
        <h5>Family 1</h5>
      </div>
    </div>
  </li>
</ul>

    </div>
</div>
@endsection
@section('js')
<script>
  function addItem(e) {
    var a = $(`#item-${e}`).hasClass('border-primary');
    if (a) {
      $(`#item-${e}`).removeClass('border-primary');
    }else{
      $(`#item-${e}`).addClass('border-primary');
    }
  };
</script>
@endsection