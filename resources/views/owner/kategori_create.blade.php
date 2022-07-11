@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb text-uppercase small">
    <li class="breadcrumb-item"><a href="{{ route('owner.kategori') }}">Kategori</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
<form method="POST" action="{{ route('owner.kategori_store') }}">
      @csrf
<section class="card">
    <div class="card-body">
    <div class="mb-3">
    <label class="form-label">Judul Kategori<span class="text-danger ms-1">*</span></label>
    <input type="text" class="form-control" name="name" required>
  </div>
  <button type="submit" class="btn btn-primary">Insert Kategori</button>
    </div>
</section>
</form>
@endsection