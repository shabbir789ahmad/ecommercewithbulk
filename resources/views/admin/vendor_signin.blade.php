@extends('admin.master')

@section('content')


<div class="grid">
 <div class="container">
      
  @if(session()->has('message'))
    <div class="alert alert-danger">
       <strong>Error!</strong>{{session()->get('message')}}
    </div>
   @endif

<form method="POST" action="{{route('vendor.register2')}}" enctype="multipart/form-data">
      @csrf
        <div class="title">Register</div>
         
         <div class="input-box underline">
          <input  id="name" type="name" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocu placeholder="Enter Your Name" >
          <div class="underline"></div>
          @error('name')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>

        <div class="input-box underline">
          <input  id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocu placeholder="Enter Your Email" >
          <div class="underline"></div>
          @error('email')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>

         

        <div class="input-box">
          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
          <div class="underline"></div>
        </div>

         @error('password')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
         @enderror

        <div class="input-box underline">
          <input  id="phone" type="number" class="@error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocu placeholder="Enter Your Phone" >
          <div class="underline"></div>
          @error('phone')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>

        <div class="input-box underline">
          <input  id="image" type="file" class="@error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocu  >
          <div class="underline"></div>
          @error('image')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
        </div>

        <div class="input-box button">
          <input type="submit" name="" value="Continue">
        </div>
      </form>



        
     
    </div>
 </div>

@endsection
