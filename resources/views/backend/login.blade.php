<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Login | {{ config('app.name') }}</title>
  <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/images/logo.png">
  <meta name="robots" content="noindex, nofollow" />
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

  <main>
    <div class="container my-5">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card card-default">
            <div class="card-header" align="center"><h3 class="mb-0">{{ config('app.name') }} Login</h3></div>
            <div class="card-body">

              @if(session('message')) <div class="alert alert-danger" role="alert">{{ session('message') }}</div> @endif

              <form method="POST" action="{{ route('backend.login.post') }}">
                @csrf
                @method('POST')

                <div class="form-group row">
                  <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6 offset-md-4">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group text-center mb-0">
                  <button type="submit" class="btn btn-primary">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
