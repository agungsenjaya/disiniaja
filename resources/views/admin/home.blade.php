@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-9">
<div class="mb-3">
  <img src="https://dummyimage.com/1349x300" alt="" width="100%" class="rounded">
</div>

    <div class="mb-3">
      <h5 class="sub-nav mb-3">Paket Extra</h5>

      <div class="swiper swiper-1 pb-5">
      <div class="swiper-wrapper">
        @foreach($paket as $pak)
        @if($pak->package_kat_id == 3)
        <div class="swiper-slide">
        <div class="card rounded alert-primary">
            <div class="card-body d-flex justify-content-between">
              <div>
                <h6 class="card-title text-capitalize fw-bold mb-0">{{ $pak->name }}</h6>
              </div>
              <div>
              <a href="javascript:void(0)">
            <i class="bi-plus-circle-fill"></i>
          </a>
              </div>
            </div>
            <div class="card-footer">
              Rp {{ $pak->price }}
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
      <div class="d-flex justify-content-end">
        <div>
          <div class="swiper-pagination pag-1"></div>
        </div>
      </div>
    </div>

      <h5 class="sub-nav mb-3">Frame</h5>

      <div class="swiper swiper-2 pb-5">
      <div class="swiper-wrapper">
        @foreach($frame as $fra)
        <div class="swiper-slide">
        <div class="card rounded alert-primary">
            <div class="card-body d-flex justify-content-between">
              <div>
                <h6 class="card-title text-capitalize fw-bold mb-0">Frame {{ $fra->name }}</h6>
              </div>
              <div>
              <a href="javascript:void(0)">
            <i class="bi-plus-circle-fill"></i>
          </a>
              </div>
            </div>
            <div class="card-footer">
              Rp {{ $fra->price }}
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-end">
        <div>
          <div class="swiper-pagination pag-2"></div>
        </div>
      </div>
    </div>

    <h5 class="sub-nav mb-3">Cetakan</h5>
      
    <div class="swiper swiper-3 pb-5">
      <div class="swiper-wrapper">
        @foreach($cetak as $cet)
        <div class="swiper-slide">
        <div class="card rounded alert-primary">
            <div class="card-body d-flex justify-content-between">
              <div>
                <h6 class="card-title text-capitalize fw-bold mb-0">Cetakan {{ $cet->name }}</h6>
              </div>
              <div>
              <a href="javascript:void(0)">
            <i class="bi-plus-circle-fill"></i>
          </a>
              </div>
            </div>
            <div class="card-footer">
              Rp {{ $cet->price }}
            </div>
          </div>
        </div>
        @endforeach
        
      </div>
      <div class="d-flex justify-content-end">
        <div>
          <div class="swiper-pagination pag-3"></div>
        </div>
      </div>
    </div>
    </div>


    <div class="d-flex justify-content-between mb-4">
      <div class="align-self-center">
        <h5 class="mb-0 sub-nav">Paket Utama</h5>
      </div>
      <div>
      <div class="input-group border rounded">
        <span class="input-group-text bg-transparent border-0" id="search">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search align-middle"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </span>
        <input type="text" class="form-control bg-transparent border-0" placeholder="Pencarian Paket" aria-label="Username" aria-describedby="search">
      </div>
    </div>
    </div>

    

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($paket as $pak)
        @if($pak->package_kat_id != 3)
  <div class="col">
    <div class="card h-100 rounded item" id="item-{{ $pak->id }}">
      <!-- <img src="..." class="card-img-top" alt="..."> -->
      <div class="card-body">
        <div class="text-end">
          <a href="javascript:void(0)" onClick="addPaket({{ $pak }})" class="paket-{{ $pak->id }}">
            <i class="bi-plus-circle-fill"></i>
          </a>
        </div>
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
                  <i class="bi-check-circle-fill text-secondary me-3"></i>{{ $fr->name }}
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
                  <i class="bi-check-circle-fill text-secondary me-3"></i>{{ $ct->name }}
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
      <div class="card-footer fw-bold text-primary">
        Rp {{ $pak->price }}
      </div>
    </div>
  </div>
  @endif
  @endforeach
</div>
    </div>
    <div class="col-md-3">
    <div class="">
      <div class="card rounded">
        <div class="card-header d-flex justify-content-between">
          <div class="align-self-center">
            <h5 class="mb-0 fw-bold text-primary">06</h5>
          </div>
          <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTran">Buat Transaksi</button>
          </div>
        </div>
      <div class="card-body">
        <ul class="list-group list-group-flush" id="paket">
          <li class="list-group-item sub-nav mb-3">Paket</li>
          <li class="list-group-item border-0">
            <div class="media">
              <a href="javascript:void(0)" class="me-3 text-secondary">
                <i class="bi-x-circle-fill"></i>
              </a>
              <div class="media-body">
                <h6 class="fw-bold text-primary">Family 1</h6>
                <div class="d-flex justify-content-between">
                  <div>Rp 150.000</div>
                  <div class="w-50">

                  <div class="input-group input-group-sm">
  <button class="btn btn-primary" type="button">
    <i class="bi-dash"></i>
  </button>
  <input type="number" min="1" class="form-control"  value="1">
  <button class="btn btn-primary" type="button">
    <i class="bi-plus"></i>
  </button>
</div>

                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item border-0">
            <div class="media">
              <a href="javascript:void(0)" class="me-3 text-secondary">
                <i class="bi-x-circle-fill"></i>
              </a>
              <div class="media-body">
                <h6 class="fw-bold text-primary">Family 2</h6>
                <div class="d-flex justify-content-between">
                  <div>Rp 150.000</div>
                  <div class="w-50">

                  <div class="input-group input-group-sm">
                    <button class="btn btn-primary" type="button">
                      <i class="bi-dash"></i>
                    </button>
                    <input type="number" min="1" class="form-control"  value="1">
                    <button class="btn btn-primary" type="button">
                      <i class="bi-plus"></i>
                    </button>
                  </div>

                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item border-0">
            <div class="media">
              <a href="javascript:void(0)" class="me-3 text-secondary">
                <i class="bi-x-circle-fill"></i>
              </a>
              <div class="media-body">
                <h6 class="fw-bold text-primary">Family 3</h6>
                <div class="d-flex justify-content-between">
                  <div>Rp 150.000</div>
                  <div class="w-50">

                  <div class="input-group input-group-sm">
  <button class="btn btn-primary" type="button">
    <i class="bi-dash"></i>
  </button>
  <input type="number" min="1" class="form-control"  value="1">
  <button class="btn btn-primary" type="button">
    <i class="bi-plus"></i>
  </button>
</div>

                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
        <ul class="list-group list-group-flush" id="tambahan">
          <li class="list-group-item sub-nav mb-3">Tambahan</li>
          <li class="list-group-item border-0">
            <div class="media">
              <a href="javascript:void(0)" class="me-3 text-secondary">
                <i class="bi-x-circle-fill"></i>
              </a>
              <div class="media-body">
                <h6 class="fw-bold text-primary">Frame 4r</h6>
                <div class="d-flex justify-content-between">
                  <div>Rp 25.000</div>
                  <div class="w-50">

                  <div class="input-group input-group-sm">
  <button class="btn btn-primary" type="button">
    <i class="bi-dash"></i>
  </button>
  <input type="number" min="1" class="form-control"  value="1">
  <button class="btn btn-primary" type="button">
    <i class="bi-plus"></i>
  </button>
</div>

                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item border-0">
            <div class="media">
              <a href="javascript:void(0)" class="me-3 text-secondary">
                <i class="bi-x-circle-fill"></i>
              </a>
              <div class="media-body">
                <h6 class="fw-bold text-primary">Frame 5r</h6>
                <div class="d-flex justify-content-between">
                  <div>Rp 20.000</div>
                  <div class="w-50">

                  <div class="input-group input-group-sm">
  <button class="btn btn-primary" type="button">
    <i class="bi-dash"></i>
  </button>
  <input type="number" min="1" class="form-control"  value="1">
  <button class="btn btn-primary" type="button">
    <i class="bi-plus"></i>
  </button>
</div>

                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="list-group-item border-0">
            <div class="media">
              <a href="javascript:void(0)" class="me-3 text-secondary">
                <i class="bi-x-circle-fill"></i>
              </a>
              <div class="media-body">
                <h6 class="fw-bold text-primary">Cetakan 4r</h6>
                <div class="d-flex justify-content-between">
                  <div>Rp 15.000</div>
                  <div class="w-50">

                  <div class="input-group input-group-sm">
  <button class="btn btn-primary" type="button">
    <i class="bi-dash"></i>
  </button>
  <input type="number" min="1" class="form-control"  value="1">
  <button class="btn btn-primary" type="button">
    <i class="bi-plus"></i>
  </button>
</div>

                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
    </div>
    <div class="card-footer d-flex justify-content-between">
      <div class="">
        Total Pembayaran
      </div>
      <div>
        <span class="fw-bold text-primary">
          Rp 2.500.000
        </span>
      </div>
    </div>
    </div>
    </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalTran" tabindex="-1" aria-labelledby="modalTranLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modalTranLabel">Buat Transaksi</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <p class="sub-nav mb-0">Total Pembayaran</p> -->
        <div class="text-center py-4 bg-primary rounded mb-3">
        <del class="text-white">Rp 2.500.000</del>
          <h3 class="fw-bold text-white m-0">Rp 1.500.000</h3>
          <div class="badge badge-light">Discount 10%</div>
        </div>


        <div class="mb-3">
          <label class="form-label">Discount</label>
          <select name="" id="" class="form-select">
            <option value="">-- Select Option --</option>
            @for($i = 0; $i < 10; $i++)
            <option value="{{ $i + 1 }}0%">{{ $i + 1 }}0%</option>
            @endfor
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Jumlah Pembayaran</label>
          <div class="input-group">
            <span class="input-group-text">Rp</span>
            <input type="text" class="form-control" id="currency-mask">
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Metode Pembayaran</label>
          <select name="" id="" class="form-select">
            <option value="">-- Select Option --</option>
            <option value="cash">Cash</option>
            <option value="debit">Debit</option>
          </select>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.1/swiper-bundle.css" integrity="sha512-5TGRCl3hPoqtruhO+mubTuySHOfcEBvyIfiWHoCK8wDLmf6C1U73OUoNCU6ZvyT/8vfCcha1INDIo8dabDmQjw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.3.1/swiper-bundle.min.js" integrity="sha512-naEQG74IcOLQ6K/B1PmhIcZ4i3YE2FXs2zm603E1Q3shbron+PmYLg44/q+xAymD/RvskZ2H8l1Qa7I5qELlrg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.2.2/imask.min.js"></script>
<script>
  let data = [];
  let paket = [];
  let tambahan = [];
  function addPaket(e) {
    let pak = e;
    paket.push(pak);
    $(`.paket-${e.id}`).addClass('opacity-0');
    console.log(paket);
    // var a = $(`#item-${e}`).hasClass('border-primary');
    // if (a) {
    //   $(`#item-${e}`).removeClass('border-primary');
    // }else{
    //   $(`#item-${e}`).addClass('border-primary');
    // }
  };

  var swiper1 = new Swiper(".swiper-1", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
          el: ".pag-1",
          clickable: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
        },
      });
  
      var swiper2 = new Swiper(".swiper-2", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
          el: ".pag-2",
          clickable: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
        },
      });
      
      var swiper3 = new Swiper(".swiper-3", {
        slidesPerView: 1,
        spaceBetween: 10,
        pagination: {
          el: ".pag-3",
          clickable: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 20,
          },
        },
      });

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


</script>
@endsection