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
              <h3>Login to <strong class="primarycolor mb-0">SB Hotels</strong></h3>
              <p class="mb-4">Log in to your SB Hotels account for personalized experiences.</p>
              
              @if (session('error'))
                <div class="alert alert-danger">
                  {{ session('error') }}
                </div>
              @endif



              <form action="{{ route('login.submit') }}" method="post">
                @csrf
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" class="form-control rounded-pill" placeholder="your Username" id="username" name="username"> 
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control rounded-pill" placeholder="your Password" id="password" name="password">
                </div>

                <div class="d-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="/register" class="forgot-pass">You don't have an account? Register </a></span> 
                </div>
                @if (session('error'))
                  <div class="error-message">
                    {{ session('error') }}
                  </div>
                @endif

                <input type="submit" value="Log In" class="btn btn-block btn-primary ">
                {{-- <a href='/hotel' class="btn btn-block btn-primary">Log In</a>  --}}
                {{-- <a href='/hotel' class="btn btn-block btn-primary" style="display: flex; justify-content: center; align-items: center;">Log In</a> --}}
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
      

    <script src="{{ asset('assets/js/login/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/login/main.js') }}"></script>
    
    </body>
  </html>