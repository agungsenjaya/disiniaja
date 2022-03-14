@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb text-uppercase small">
    <li class="breadcrumb-item"><a href="{{ route('owner.frame') }}">Frame</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
<section class="card">
    <div class="card-body">
    <form method="POST" action="{{ route('owner.frame_store') }}">
      @csrf
  <div class="mb-3 row">
  <div class="col">
    <label class="form-label">Judul Frame</label>
    <select name="name" id="" class="form-select" required>
      <option value="">-- Select Option --</option>
      <option value="4r">4r</option>
<option value="5r">5r</option>
<option value="8r">8r</option>
<option value="8rp">8rp</option>
<option value="12r">12r</option>
<option value="12rp">12rp</option>
<option value="16r">16r</option>
<option value="16rp">16rp</option>
<option value="20r">20r</option>
<option value="20rp">20rp</option>
<option value="24r">24r</option>
<option value="24rp">24rp</option>
    </select>
  </div>
  <div class="col">
    <label class="form-label">Stock Frame</label>
    <input type="number" class="form-control" name="qty" required>
  </div>
  </div>
  <div class="mb-3 row">
  <div class="col">
    <label class="form-label">Harga Modal</label>
    <div class="input-group">
      <span class="input-group-text" id="addon-wrapping">Rp</span>
      <input id="currency-mask" class="form-control" name="price_m">
    </div>
  </div>
  <div class="col">
    <label class="form-label">Harga Penjualan</label>
    <div class="input-group">
      <span class="input-group-text" id="addon-wrapping">Rp</span>
      <input id="currency-maskk" class="form-control" name="price">
    </div>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Insert Frame</button>
</form>
    </div>
</section>
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
        thousandsSeparator: ','
      }
    }
  });
  var currencyMaskk = IMask(
  document.getElementById('currency-maskk'),
  {
    mask: 'num',
    blocks: {
      num: {
        mask: Number,
        thousandsSeparator: ','
      }
    }
  });
</script>
@endsection