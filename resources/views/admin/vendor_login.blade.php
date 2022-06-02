@extends('admin.master')

@section('content')



<div class="grid">
 <div class="container">
      
  @if(session()->has('message'))
    <div class="alert alert-danger">
       <strong>Error!</strong>{{session()->get('message')}}
    </div>
   @endif
  <?php $route=route('vendor.login'); ?>
<x-form.logincomponent :route="$route" />

<a href="{{route('vendor.register')}}" class="text-dark text-center font-weight-bold float-right">Or,Signup</a>

        
     
    </div>
 </div>


@endsection
