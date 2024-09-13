<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <!-- <link rel="stylesheet" href="fonts/icomoon/style.css"> -->
    <link rel="stylesheet" href="{{asset('assets/css/login/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="{{asset('assets/css/login/bootstrap.min.css')}}">


    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="{{asset('assets/css/login/style.css')}}">

    <title>SB Hotels</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/login.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Register to <strong class="primarycolor mb-0">SB Hotels</strong></h3>
            <p class="mb-4">Register to your SB Hotels account for personalized experiences.</p>
            
            <form method="POST" action="{{ route('register.submit') }}">
                @csrf <!-- Thêm CSRF token vào đây -->
            
                <div class="form-group first">
                    <label for="username">Username</label>
                    <input type="text" class="form-control rounded-pill" required placeholder="Your username" id="username" name="username">
                </div>
                <div class="form-group last mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control rounded-pill" required placeholder="Your Password" id="password" name="password">
                </div>
                <div class="form-group last mb-3">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="form-control rounded-pill" required placeholder="Your confirm_password" id="confirm_password" name="password_confirmation">
                </div>
                <div class="d-flex mb-5 align-items-center">
                    <span class="ml-auto">
                        <a href="/login" class="forgot-pass">You have account? Let log in</a>
                    </span> 
                </div>
            
                <input type="submit" class="btn btn-block btn-primary ">
            </form>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
                </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
  </body>
</html>