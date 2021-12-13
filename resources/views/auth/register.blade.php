
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Sign in</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <link rel="stylesheet" href="{{ asset('assets/backend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/css/toastr.css') }}">
  <link rel="stylesheet"href="{{ asset('assets/frontend/css/fronawesome.css') }}"/>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h4>Welcome!</h4>  
              <h6 class="font-weight-light">Sign in to continue .</h6>
                <form method="POST" action="{{ route('register') }}">
                      @csrf
                  
                  <div class="form-group">
                  <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Emil">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Enter password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                  </div>
                  <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm password">
                    
                  </div>
                  <div class="mt-3">
                      <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                          {{ __('Register') }}
                      </button>
                  </div>
                    <div class="text-center mt-4 font-weight-light">
                      Already have account? <a href="{{ url('/admin') }}" class="text-primary">Login</a><br>
                       Or
                  </div>
                   <div class="text-center mt-4 font-weight-light">
                    Register With :- &nbsp;&nbsp;&nbsp;
                    <a  href="#"><i class="fab fa-facebook-square"></i> Facebook</a> &nbsp; || &nbsp;
                    <a href="#"><i class="fab fa-google"></i> Google</a>
                   </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('assets/frontend/js/fontawesome.js') }}"></script>
  <script src="{{ asset('assets/backend/vendors/base/vendor.bundle.base.js') }}"></script>
  <script src="{{asset('assets/backend/js/toastr.js')}}"></script>
  {!! Toastr::message() !!}
</body>

</html>

