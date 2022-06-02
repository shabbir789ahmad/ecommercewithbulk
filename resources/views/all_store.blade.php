@extends('master.master')
@section('content')


       
<div id="content" style="overflow:hidden">

  <div class=" mt-4 py-5" style="background-color:#09192C;" >
     <h2 class="text-light text-center mt-3 ml-4">All Stores</h2>

</div>
 


 <div class="row mt-3">
   @foreach($stores as $vendor)
   <div class="col-md-3 mt-4">
    <a href="{{route('visit.store',['id'=>$vendor['id']])}}" style="text-decoration:none;color: #000;">
     <div class="card shadow">
      <div class="card-body">
       <img src="{{asset('uploads/img/'.$vendor['image'])}}" width="100%" height="250rem">
       <h4 class="font-weight-bold mt-3">{{$vendor['name']}}</h4>
       <p class="mb-0">{{$vendor['products_count']}} Products<span class="float-right "> 
        {{$vendor['followers_count']}} Follower
       </span></p>
      </div>
    </div>
    </a>
  </div>
   @endforeach
 </div>

 


           
   </div>
    </div>

   

@endsection