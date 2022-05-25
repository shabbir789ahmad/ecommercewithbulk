@extends('Dashboard.admin')
@section('content')

<div class="card  " >
  <div class="card-body  backgorund">
     Update  State
  </div>
</div>


 <div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-sm-1">
    </div>
    <div class="col-md-8 card col-sm-10  mt-5 p-5">
     <form action="{{route('state.update',['state'=>$state['id']])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
           <x-form.input name="state" label="State Name" type="text" value="{{$state['state']}}"></x-forms.input>

          
             

               

              <x-btn.save ></x-btn.save>
      </form>
    </div>
    
    <div class="col-md-2 col-sm-1">
         
    </div>
  </div>
</div>


@endsection