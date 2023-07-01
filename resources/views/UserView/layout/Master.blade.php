<?php 
  use App\Models\User;
  $user_id = session('user_id');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="{{ asset('storage/WebImages/icon.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <title>Sep29th Shop</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div id="progress" class="waiting">
    <dt></dt>
    <dd></dd>
  </div>
  <header class="header">
    <div class="container-fluid">
      <div class="header__control">
        <div class="header__logo">
          <a href="{{ route('User.MainPage') }}"><img src="{{ asset('storage/WebImages/logo.png') }}"></a>
        </div>
        <div class="header__text">
          <h1>Sep29th Shop</h1>
        </div>
        <div class="header__helper">
          @if ($user_id)
          <?php $user = User::find($user_id) ?>
          @if ($user->avatar_type_img)
          <img src="{{ asset('storage/UserAvatar/'.$user_id.'.'.$user->avatar_type_img) }}">
          @else
          <img src="{{ asset('storage/UserAvatar/default.png') }}">
          @endif
          <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
              aria-expanded="false"></button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i>My infomation</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-cart-shopping"></i>Cart</a></li>
              <li><a class="dropdown-item" href="#"><i class="fa-solid fa-list"></i>Orders</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="{{ route('User.Login') }}"><i class="fa-solid fa-power-off"></i>Log
                  out</a></li>
            </ul>
          </div>
          @else
          <a type="button" class="btn btn-secondary" href="{{ route('User.Login') }}">Log in</a>
          <p>/</p>
          <a type="button" class="btn btn-dark" href="{{ route('User.Login', ['message' => 'regis']) }}">Register</a>
          @endif
        </div>
      </div>
    </div>
  </header>
  <div class="session">
    <div class="container-fluid">
      <div class="row">
        <nav class="flex-shrink-0 p-3 bg-white col-2">
          <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">What are you looking for ?</span>
          </a>
          <ul class="list-unstyled ps-0">
            <li class="mb-1">
              <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                Home
              </button>
              <div class="collapse" id="home-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Overview</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">My details</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">My cart</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">My order</a></li>
                </ul>
              </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
              <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                Categories
              </button>
              <div class="collapse" id="dashboard-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  @foreach ($listCategory as $item)
                    <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">{{ $item->category }}</a></li>
                  @endforeach
                </ul>
              </div>
            </li>
            <li class="border-top my-3"></li>
            <li class="mb-1">
              <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                Top products of
              </button>
              <div class="collapse" id="orders-collapse" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Sale</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Score</a></li>
                  <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Sold</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </nav>
        @yield('content')
      </div>
    </div>
  </div>
  <div class="container-fluid" style="background-color: #222222">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <a href="{{ route('User.MainPage') }}" class="mb-3 me-2 mb-md-0 text-decoration-none lh-1" style="color: white">
          <h2>Sep29th Shop</h2>
        </a>
        <span class="mb-3 mb-md-0" style="color: white">© 2023 1hc Company, Inc</span>
      </div>
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3" style="margin-right: 25px;"><a style="color: white; font-size: 30px" href="https://www.facebook.com/Sep29th" target="_blank"><i
              class="fa-brands fa-twitter"></i></a></li>
        <li class="ms-3" style="margin-right: 25px;"><a style="color: white; font-size: 30px" href="https://www.facebook.com/Sep29th" target="_blank"><i
              class="fa-brands fa-instagram"></i></a></li>
        <li class="ms-3" style="margin-right: 25px;"><a style="color: white; font-size: 30px" href="https://www.facebook.com/Sep29th" target="_blank"><i
              class="fa-brands fa-facebook"></i></a></li>
      </ul>
    </footer>
  </div>
</body>
<script>
  $(document).ready(function() {
    $({property: 0}).animate({property: 105}, {
      duration: 1000,
      step: function() {
        var _percent = Math.round(this.property);
        $('#progress').css('width', _percent+"%");
        if(_percent == 105) {
          $("#progress").addClass("done");
        }
      },
      complete: function() {
      }
    });
  });
  var header = document.querySelector('header');
  window.onscroll = function() {
    if (window.pageYOffset == 0) {
      header.style.height = "100px";
    } else {
      header.style.height = "80px";
    }
  }
</script>
<style>
  a.dropdown-item {
    font-family: 'Playfair Display', serif;
    display: flex;
    align-items: center;
  }
  a.dropdown-item:hover {
    background-color: #222222;
    color: white;
  }
  .dropdown-menu i {
    width: 30px;
    height: 30px;
    font-size: 20px;
    background-color: #cccccc;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 15px;
  }
</style>
</html>