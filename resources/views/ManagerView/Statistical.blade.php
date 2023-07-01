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
        <h1>Product page</h1>
      </div>
      <div class="col-2">
        @foreach ($dataPurchase as $item)
          <p>{{ $item->quantity }}</p>
        @endforeach
      </div>
      <div class="col-2">
        @foreach ($dataSale as $item)
          <p>{{ $item->created_at }}</p>
        @endforeach
      </div>
      <div class="col-2">
        @foreach ($dataChart as $item)
          <p>{{ $item['month'] }}</p>
        @endforeach
      </div>
    </div>
  </div>
</body>

</html>