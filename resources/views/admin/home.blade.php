@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md">

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($paket as $pak)
  <div class="col">
    <div class="card">
      <!-- <img src="..." class="card-img-top" alt="..."> -->
      <div class="card-body">
        <h5 class="card-title text-capitalize fw-bold">{{ $pak->name }}</h5>
        @if($pak->data)
        @php
        $dat = json_decode($pak->data);
        @endphp
        <p class="sub-nav mt-3 mb-0 fw-bold">Frame</p>
        <ul class="list-group list-group-flush">
            @foreach($dat[0]->frame as $fr)
            <li class="list-group-item ps-0">
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
        <p class="sub-nav mt-3 mb-0 fw-bold">Cetak</p>
        <ul class="list-group list-group-flush">
            @foreach($dat[0]->cetak as $ct)
            <li class="list-group-item ps-0">
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
        <p class="sub-nav m-0 fw-bold">Daftar Pesanan</p>
        <h5 class="card-title text-capitalize fw-bold"></h5>
    </div>
</div>
@endsection