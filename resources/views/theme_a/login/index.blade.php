<!doctype html>
<html lang="en" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>

<title>OhMysell</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" />

<!-- Core css -->
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/theme1.css')}}"/>

</head>
<body class="font-montserrat">

<div class="auth">
    <div class="auth_left">
        <div class="card">
            <div class="text-center mb-2">
                <a class="header-brand" href="index.html"><i class="fa fa-soccer-ball-o brand-logo"></i></a>
            </div>
            <div class="card-body">
                <div class="card-title">{{ __('auth.loginText') }}</div>
              
 
                <form action="{{route('admin.login')}}" method="post">
                    {{-- 
                        <div class="form-group">
                            <select class="custom-select">
                                <option>Project Manager</option>
                                <option>Team Leader</option>
                                <option>Employee</option>
                            </select>
                        </div>
                    --}}
                    <div class="form-group">
                        <label class="form-label">{{ __('auth.loginEmail') }}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="{{ __('auth.loginEmailPlaceHolder') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">{{ __('auth.loginPassword') }}
                            @if (Route::has('password.request'))
                             <a href="{{ route('password.request') }}" class="float-right small">{{ __('auth.loginForgetPassword') }}</a>
                            @endif
                        </label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="{{ __('auth.loginPasswordPlaceHolder') }}">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                        @csrf
                        <input type="checkbox" name="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }} />
                        <span class="custom-control-label">{{ __('auth.loginRemember') }}</span>
                        </label>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-block" title="{{ __('auth.loginSubmit') }}">{{ __('auth.loginSubmit') }}</button>
                    </div>
                </form>

            </div>
            <div class="text-center text-muted">
                Don't have account yet? <a href="/register">Sign up</a>
            </div>
        </div>        
    </div>
    <div class="auth_right full_img"></div>
</div>

    <script src="{{asset('assets/bundles/lib.vendor.bundle.js')}}"></script>
    <script src="{{asset('assets/js/core.js')}}"></script>
</body>
</html>