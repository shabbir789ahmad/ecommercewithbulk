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
           <div class="form-group mt-3">
          <label for="" class="fw-bold mb-1 label_font_size">
                  Select State <span class="text-danger">*</span>
             </label>
        <select class="form-control border border-secondary" name="state_id">
           @foreach($states as $state)
           <option value="{{$state['id']}}">{{$state['state']}}</option>
           @endforeach
        </select>

        </div>
         @error('name') 
         <div class="small text-danger"> <i class="fa fa-times-circle"></i> {{ $message }}
         </div>
          @enderror

           <x-form.input name="city" label="City" type="text"></x-forms.input>

           <x-form.input name="shipping_costs" label=" Shipping Cost " type="text"></x-forms.input>
             
             
             

               

              <x-btn.save ></x-btn.save>
      </form>
    </div>
    
    <div class="col-md-2 col-sm-1">
         
    </div>
  </div>
</div>


@endsection