@extends('Dashboard.admin')
@section('content')

<div class="card  " >
  <div class="card-body  backgorund">
     Create  Shipping Cost
  </div>
</div>


 <div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-sm-1">
    </div>
    <div class="col-md-8 card col-sm-10  mt-5 p-5">
     <form action="{{route('shipping.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
           <x-form.input name="city" label="City" type="text"></x-forms.input>

           <x-form.input name="shipping_cost" label=" Shipping Cost " type="text"></x-forms.input>
             
             
             

               

              <x-btn.save ></x-btn.save>
      </form>
    </div>
    
    <div class="col-md-2 col-sm-1">
         
    </div>
  </div>
</div>


@endsection