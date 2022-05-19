@extends('admin.master')

@section('content')



<div class="grid">
 <div class="container">
      
  @if(session()->has('message'))
    <div class="alert alert-danger">
       <strong>Error!</strong>{{session()->get('message')}}
    </div>
   @endif
<?php $route=route('admin.login'); ?>
<x-form.logincomponent :route="$route" />

        
     
    </div>
 </div>


@endsection
