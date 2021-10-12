@extends('master.master')
@section('content')

@if($search2)
<div class="row mr-2">
  @foreach($search2 as $pro)
  <div class="col-md-3 col-sm-4 col-12 mt-2">
  <a href="{{url('productpage/' .$pro->id)}}">
   <div class="card ">
    <img  src="{{asset('uploads/img/' .$pro->rimage)}}" class="card-img-top2 img-fluid" alt="...">
     <div class="card-body">
       <p class="card-title oproduct-name">{{$pro->name}} <br>
       <span class="text-secondary inck">Kids Double Pom Beanie
        </span><br>
      <span class="o_pice">{{$pro->discount}}<del class="text-secondary">
       <small class="text-danger">{{$pro->price}}</small></del></span> </p>
       
       </div>
    </div></a>
      </div>
      @endforeach
</div>
@else
<p class="ml-5 mt-5 font-weight-bold">Not Product Found</p>
@endif
@endsection