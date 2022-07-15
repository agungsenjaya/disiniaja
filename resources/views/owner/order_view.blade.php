@extends('layouts.owner')
@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb text-uppercase small">
    <li class="breadcrumb-item"><a href="{{ route('owner.order') }}">Order</a></li>
    <li class="breadcrumb-item active" aria-current="page">87123yyyuawd</li>
  </ol>
</nav>

<div class="card bg-primary mb-4 shadow-sm">
    <div class="card-body">
    <div class="card-group text-white">
  <div class="card border-0 bg-transparent">
    <div class="card-body">
      <h5 class="card-title sub-nav">Kode Transaksi</h5>
      <h4 class="fw-bold text-uppercase">87123yyyuawd</h4>
      <p class="card-text opacity-50">This card has supporting text below as a natural lead-in to additional content.</p>
    </div>
  </div>
  <div class="card border-0 bg-transparent border-start">
    <div class="card-body">
      <h5 class="card-title sub-nav">Paket Foto</h5>
      <h4 class="fw-bold">Family Satu</h4>
      <p class="card-text opacity-50">This card has supporting text below as a natural lead-in to additional content.</p>
    </div>
  </div>
  <div class="card border-0 bg-transparent border-start">
    <div class="card-body">
      <h5 class="card-title sub-nav">Total Pembayaran</h5>
      <h4 class="fw-bold">Rp 200,000</h4>
      <p class="card-text opacity-50">This card has supporting text below as a natural lead-in to additional content.</p>
    </div>
  </div>
  
</div>
    </div>
</div>
<div class="row mb-4">
<div class="col-md-6">
<div class="card shadow-sm h-100">
  <div class="card-body">
  <h5 class="card-title sub-nav">Detail Pelanggan</h5>
  <table class="table line-2">
        <tr>
          <th class="text-primary">Admin Post</th>
          <th class="text-primary">:</th>
          <th class="text-primary">
             Ikbal Tawakal
          </th>
        </tr>
        <tr>
          <td>Status Pembayaran</td>
          <td>:</td>
          <td>
            <span class="badge bg-primary">Lunas</span>
          </td>
        </tr>
        <tr>
          <td>Metode</td>
          <td>:</td>
          <td>
            Manual
          </td>
        </tr>
        <tr>
          <td>Tanggal Post</td>
          <td>:</td>
          <td>
            Sabtu, 20 Jan 2022
          </td>
        </tr>
        <tr>
          <td>Nama Pelanggan</td>
          <td>:</td>
          <td>-</td>
        </tr>
        <tr class="border-transparent">
          <td>Nomor Telepon</td>
          <td>:</td>
          <td>-</td>
        </tr>
      </table>
  </div>
</div>
</div>
<div class="col-md-6">
<div class="card shadow-sm h-100">
  <div class="card-body">
  <h5 class="card-title sub-nav">Detail Transaksi</h5>
  <table class="table line-2">
        <tr>
          <td>Paket Foto Satu</td>
          <td>:</td>
          <td class="text-end">Rp 130,000</td>
        </tr>
        <tr>
          <td>Frame 2x3</td>
          <td>:</td>
          <td class="text-end">Rp 100,000</td>
        </tr>
        <tr>
          <td>Merdeka45</td>
          <td>:</td>
          <td class="text-end"> - Rp 30,000</td>
        </tr>
        <tr class="border-transparent">
          <th class="text-primary">Total Pembayaran</th>
          <th class="text-primary">:</th>
          <th class="text-primary text-end">Rp 200,000</th>
        </tr>
      </table>
  </div>
</div>
</div>
</div>
<a href="#" class="btn btn-info text-white me-3"><i class="bi bi-file-break-fill me-2"></i>Histori Pembayaran</a>
<a href="#" class="btn btn-primary"><i class="bi bi-file-earmark-pdf-fill me-2"></i>Cetak Pembayaran</a>
@endsection