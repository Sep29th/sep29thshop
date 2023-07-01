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
  @vite(['resources/js/userLogin.js'])
  <title>Login</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  <div id="progress" class="waiting">
    <dt></dt>
    <dd></dd>
  </div>
  <header class="header">
    <div class="container-fluid">
      <div class="header__logo">
        <a href="{{ route('User.MainPage') }}"><img src="{{ asset('storage/WebImages/logo.png') }}"></a>
      </div>
    </div>
  </header>
  <div class="session">
    <div class="container">
      <div class="session__card">
        <div class="row">
          <div class="col-4" id="left">
            <div class="session__form1 animate__animated animate__fadeInUp">
              <h1>Register</h1>
              <form id="regisForm" class="needs-validation" novalidate>
                <div class="row">
                  <div class="col-6">
                    <label for="validationName" class="form-label">Last name*</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-user"></i></span>
                      <input type="text" class="form-control" id="validationName" aria-describedby="inputGroupPrepend"
                        name="name" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please choose a name.
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="validationPhone" class="form-label">Phone number*</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i
                          class="fa-solid fa-mobile-button"></i></span>
                      <input type="number" class="form-control" id="validationPhone" name="phone_number"
                        aria-describedby="inputGroupPrepend" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please choose a phone number.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="validationDate" class="form-label">Date of birth*</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i
                          class="fa-solid fa-calendar-days"></i></span>
                      <input type="date" class="form-control" id="validationDate" aria-describedby="inputGroupPrepend" name="date_of_birth"
                        required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please choose a date.
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="validationAddress" class="form-label">Address*</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i
                          class="fa-solid fa-location-dot"></i></span>
                      <textarea class="form-control" id="validationAddress" aria-describedby="inputGroupPrepend" name="address"
                        required></textarea>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        Please choose a address.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label for="validationPass" class="form-label">Password*</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-key"></i></span>
                      <input type="password" class="form-control" id="validationPass" name="password"
                        aria-describedby="inputGroupPrepend" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        The password has to longer than 1 character.
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <label for="validationRepass" class="form-label">Repeat password*</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend"><i class="fa-solid fa-lock"></i></span>
                      <input type="password" name="repass" class="form-control" id="validationRepass"
                        aria-describedby="inputGroupPrepend" required>
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                      <div class="invalid-feedback">
                        The password are not the same.
                      </div>
                    </div>
                  </div>
                </div>
                <div id="message1"></div>
                <div class="d-grid gap-2">
                  <button class="btn btn-dark" type="submit">Register</button>
                  <h2>Already have an account ?</h2>
                  <div class="btn btn-secondary" id="login">Login</div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-8">
            <div class="session__slide">
              <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('storage/WebImages/slide1.png') }}" class="d-block w-100">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('storage/WebImages/slide2.png') }}" class="d-block w-100">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('storage/WebImages/slide3.png') }}" class="d-block w-100">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-4" id="right">
            <div class="session__form animate__animated animate__fadeInUp">
              <h1>Login</h1>
              <form id="loginForm">
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                  <div class="form-floating">
                    <input name="phone_number" type="number" class="form-control" id="floatingInputGroup1"
                      placeholder="Phone number">
                    <label for="floatingInputGroup1">Phone number</label>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                  <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingInputGroup1"
                      placeholder="********">
                    <label for="floatingInputGroup1">********</label>
                  </div>
                </div>
                <div class="form-check form-switch">
                  <input name="remember" class="form-check-input" type="checkbox" role="switch"
                    id="flexSwitchCheckChecked" checked>
                  <label class="form-check-label" for="flexSwitchCheckChecked">Remember me</label>
                </div>
                <div id="message2"></div>
                <div class="d-grid gap-2">
                  <button class="btn btn-dark" type="submit">Log In</button>
                  <h2>Or</h2>
                  <div class="btn btn-secondary" id="register">Register</div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
@if (isset($_GET['message']))
  <script defer>
    document.getElementById('right').style.display = 'none';
    document.getElementById('left').style.display = 'block';
  </script>
@endif
</html>
