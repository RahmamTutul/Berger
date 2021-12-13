
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin Login</title>
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
              <h6 class="font-weight-light">Login to continue .</h6>
              <form method="POST" action="{{ route('login') }}">
                   @csrf
                <div class="form-group">
                  <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg @error('email') is-invalid @enderror"  required autocomplete="email" autofocus placeholder="Enter email">
                   @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                 <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="mt-3">
                 <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">{{ __('Login') }}</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Dont have an account? <a href="{{ url('admin/register') }}" class="text-primary">Create</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                Login With :- &nbsp;&nbsp;&nbsp;
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
