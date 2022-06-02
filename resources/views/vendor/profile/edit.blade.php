@extends('vendor.master')

@section('content')
<style type="text/css">
     .text_color{
          color: #565959;
          font-size: 1vw;
     }
     
</style>
<div class="row ml-4 justify-content-center">
     <div class="col-6">
          <div class="form-group mt-5 mb-3 ">
               <h1 class="fw-bold">Manage Your Profile</h1>
          </div>
          <div class="card">
      <div class="card-body">
       <h3 class="fw-bold">Business Address</h3>
       <form action="{{route('addresess.store')}}" method="POST">
          @csrf
          <x-product.input name="address" label="Address" type="text" ></x-product.input>
        
        <label class="label_font_size  mt-3">State</label>
        <select class="form-control state input_border_color py-3" name="state" id="state">
             @foreach($states as $state)
             <option value="{{$state['id']}}">{{$state['state']}}</option>
             @endforeach
        </select>

        <label class="label_font_size  mt-3">City</label>
        <select class="form-control city input_border_color py-3" name="city" >
             
        </select>

        <x-product.input name="location" label="Location" type="text" ></x-product.input>

        <x-btn.save ></x-btn.save> 
       </form> 
      </div>
     </div>

     </div>
</div>




@endsection
@section('script')
<script type="text/javascript">
     
     
</script>
@endsection



