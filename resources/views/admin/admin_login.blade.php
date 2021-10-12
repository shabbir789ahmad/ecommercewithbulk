@extends('admin.master')

@section('content')
<div class="container w-100  mt-5 border p-5 shadow mb-4">
      <h2 class="text-center font-weight-bold">Login Here</h2>
      @if ($alert = Session::get('message'))
    <div class="alert alert-warning">
        {{ $alert }}
    </div>
@endif
    <form method="POST" action="{{ route('admin.login') }}" class="mt-4">
      @csrf
   <input id="email" type="email" class="form-control py-3 @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    @error('email')
        <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
          </span>
            @enderror
                           
                       
    <input id="password" type="password" class="form-control py-3 mt-4 @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">

     @error('password')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
             </span>
                                @enderror
                          
                        
     <input class="form-check-input border border-dark mt-3  ml-3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

      <label class="form-check-label mt-3 ml-5" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                             

                <br>       
    <button type="submit" disabled="" class="btn  btn-color s  py-3 rounded text-light btn-block mt-3">{{ __('Login') }} 
    </button>

    @if (Route::has('password.request'))
       <a class="btn btn-link btn-success rounded py-3  text-light mt-4 mb-5" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
          </a>
     @endif
                            
                    </form>
                
</div>
@endsection
