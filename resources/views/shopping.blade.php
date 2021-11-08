@extends('master.master')
@section('content')

 <div class="container-fluid text-center mt-5">
   
  <a href="{{url('/')}}"> <button class="btn btn-check btn-lg text-light rounded"> Continue Shopping</button></a>
  @if ($alert = Session::get('status'))
    <div class="alert alert-warning">
        {{ $alert }}
    </div>
    @else
    <p>A Conformation Email has been Sent To You</p>
@endif
   
 
</div>
@endsection