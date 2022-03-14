@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb text-uppercase small">
    <li class="breadcrumb-item"><a href="{{ route('owner.promo') }}">Promo</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
  </ol>
</nav>
<section class="card">
    <div class="card-body">
    <form method="POST" action="{{ route('owner.promo_store') }}">
      @csrf
  <div class="mb-3 row">
  <div class="col">
    <label class="form-label">Judul Promo</label>
    <input type="text" class="form-control" name="name" required>
  </div>
  <div class="col">
    <label class="form-label">End Date</label>
    <input type="date" class="form-control" name="date">
  </div>
  <div class="col">
    <label class="form-label">Status Promo</label>
    <select name="status" id="" class="form-select" required>
      <option value="">-- Select Option --</option>
      <option value="active">Active</option>
      <option value="default">Default</option>
      <option value="deactive">Deactive</option>
    </select>
  </div>
  </div>
  <div class="mb-3 row">
  <div class="col">
    <label class="form-label">Potongan Harga</label>
    <div class="input-group">
      <span class="input-group-text" id="addon-wrapping">Rp</span>
      <input id="currency-mask" class="form-control" name="price">
    </div>
  </div>
  <div class="col">
    <label class="form-label">Potongan Persen</label>
    <select name="percent" id="" class="form-select">
      <option value="">-- Select Option --</option>
      <?php for ($i=1; $i < 11; $i++) {  ?>
      <option value="{{ 5 * $i }}%">{{ 5 * $i }}%</option>
      <?php }?>
    </select>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Insert Promo</button>
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
</script>
@endsection