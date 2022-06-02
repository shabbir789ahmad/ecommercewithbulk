@extends('master.master')
@section('content')


       
<div id="content" style="overflow:hidden">

  <div class=" bg-dark mt-4 py-5" >
     <h4 class="text-light text-center mt-3 ml-4">All Stores</h4>

</div>
 


 <div class="row ml-1">
   @foreach($stores as $vendor)
   <div class="col-md-4">
     <div class="card">
      <div class="card-body">
       <img src="{{asset('uploads/img/'.$vendor['image'])}}" width="100%">
      </div>
    </div>
  </div>
   @endforeach
 </div>

 


           
   </div>
    </div>

   

@endsection