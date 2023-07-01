<?php
  use App\Models\User;
  use App\Models\Product;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/tiny-slider.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <title>Document</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <h1>Test page</h1>
      </div>
      <div class="col-3">
        @foreach ($arrayShipper as $item)
        <h2>{{ $item['info']->name }}</h2>
        <p>{{ $item['wage'] }}</p>
        @endforeach
      </div>
    </div>
  </div>
</body>

</html>