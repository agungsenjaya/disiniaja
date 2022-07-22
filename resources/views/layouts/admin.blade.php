<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
      @guest
      @else
      @if(Auth::user()->hasRole('owner'))
      Owner |
      @else
      Admin |
      @endif
      @endguest
      {{ config('app.name', 'Laravel') }}
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
    @yield('css')
</head>
<body>
  @include('layouts.modal')
  @include('layouts.alert')
    <div id="app">
        <div class="row g-0">
            @guest
            @else
            <div class="col-md-2">
            <div class="sticky-top">

            <div class="flex-shrink-0 bg-primary min-vh-100">
              <!-- <a href="/" class="d-flex justify-content-center align-items-center link-dark text-decoration-none">
                <img src="https://dummyimage.com/600x200" alt="" width="200">
              </a> -->

              <nav class="navbar navbar-light bg-primary-2" style="height:60px">
                <div class="container-fluid text-center justify-content-center d-flex">
                  <a class="navbar-brand" href="#">
                    <img src="https://dummyimage.com/600x100" alt="" width="150">
                  </a>
                </div>
              </nav>

              <p class="sub-nav m-3 text-white">Menu</p>

              <div class="list-group list-group-flush nav-admin">
                <a href="{{ route('owner') }}" class="list-group-item list-group-item-action">
                    <i class="opacity-100 bx bxs-bolt-circle me-3"></i>Dashboard
                </a>
                <a href="javascript:void(0)" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#nav-1" aria-expanded="false">
                <div class="d-flex justify-content-between">
                        <div>
                            <i class='opacity-100 bx bxs-carousel me-3'></i>Order
                        </div>
                        <div>
                            <i class='opacity-100 bi bi-chevron-down'></i>
                        </div>
                    </div>
                </a>
                <div class="collapse" id="nav-1" style="">
                  <div class="list-group list-group-flush nav-admin">
                    <a href="{{ route('owner.order') }}" class="list-group-item list-group-item-action">
                      <i class="opacity-100 bi bi-dot me-3"></i>List Order
                    </a>
                  </div>
                </div>
                <a href="javascript:void(0)" class="list-group-item list-group-item-action" data-bs-toggle="collapse" data-bs-target="#nav-2" aria-expanded="false">
                <div class="d-flex justify-content-between">
                        <div>
                            <i class='opacity-100 bx bxs-discount me-3'></i>Promo
                        </div>
                        <div>
                            <i class='opacity-100 bi bi-chevron-down'></i>
                        </div>
                    </div>
                </a>
                <div class="collapse" id="nav-2" style="">
                  <div class="list-group list-group-flush nav-admin">
                    <a href="{{ route('owner.promo') }}" class="list-group-item list-group-item-action">
                      <i class="opacity-100 bi bi-dot me-3"></i>List Promo
                    </a>
                    <a href="{{ route('owner.promo_create') }}" class="list-group-item list-group-item-action">
                      <i class="opacity-100 bi bi-dot me-3"></i>Add Promo
                    </a>
                  </div>
                </div>
              </div>
            
              
            </div>
                
            </div>
            </div>
            @endguest
            @guest
            <div class="col-md">
            @else
            <div class="col-md-10">
              @endguest
                @guest
                @else
                <nav class="navbar navbar-light bg-primary" style="height:60px">
                <div class="container-fluid mx-3">
                    <div>
                      <h5 class="mb-0 text-white fw-bold">Dashboard</h5>
                    </div>

                    <ul class="nav">
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
        </li> -->
        <li class="nav-item dropdown align-self-center">
          <a class="text-white dropdown-toggle text-capitalize" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-person-circle me-2"></i>{{ Auth::user()->name }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Setting</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#modalOut">Logout</a></li>
          </ul>
        </li>
      </ul>

                </div>
                </nav>
                @endguest
                <div class="p-4">
                  @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha512-3P8rXCuGJdNZOnUx/03c1jOTnMn3rP63nBip5gOP2qmUh5YAdVAvFZ1E+QLZZbC1rtMrQb+mah3AfYW11RUrWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('js/admin.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    @yield('js')
</body>
</html>
