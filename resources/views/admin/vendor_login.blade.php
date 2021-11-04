@extends('master.master')

@section('content')
<div class="container login mt-5 border p-5 shadow mb-4">
      <h2 class="text-center font-weight-bold text-danger">Vendor Login </h2>
       @if ($alert = Session::get('message'))
    <div class="alert alert-warning">
        {{ $alert }}
    </div>
@endif
    <form method="POST" action="" class="mt-4">
      @csrf
   <input id="email" type="email" class="form-control py-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
    @error('email')
        <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
          </span>
            @enderror
                           
                       
    <input id="password" type="password" class="form-control py-3 mt-4 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

     @error('password')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
             </span>
                                @enderror
                          
                        
     <input class="form-check-input mt-3  ml-3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

      <label class="form-check-label mt-3 ml-5" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                             

                <br>       
    <button type="submit" disabled="" class="btn btn-check s py-4 py-sm-3 py-md-3 rounded text-light btn-block mt-3">{{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
       <a class="btn btn-link btn-check log-bt rounded text-light py-3 mt-4 mb-2 mb-sm-5 ml-0" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
          </a>
     @endif
             <a class="btn btn-link log-bt btn-dark rounded text-light py-3 mt-2 mt-sm-4 mb-5 ml-0 ml-sm-5" href="{{ route('vendor.register') }}">
        {{ __('Create Your Account') }}
          </a>                
                    </form>
                
</div>
@endsection
