@extends('Dashboard.admin')
@section('content')

<div class="card  " >
  <div class="card-body  backgorund">
     Create  Sale
  </div>
</div>


 <div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-sm-1">
    </div>
    <div class="col-md-8 card col-sm-10  mt-5 p-5">
     <form action="{{route('sale.update',['sale'=>$sale['id']])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input  type="hidden" name="sell_status" value="{{$sale['sell_status']}}" />
        <x-form.input name="sale_name" label="Sale Name" type="text" value="{{$sale['sale_name']}}"></x-forms.input>
        
        <x-form.input name="start_time" label="Sale Start Date Time" type="datetime-local" ></x-forms.input>
       
        <x-form.input name="end_time" label="Sale End Date Time" type="datetime-local"></x-forms.input>
       
       <label class="text-dark">Sale Image</label>
        <x-form.inputimg name="image"></x-forms.inputimg>
        

              <x-btn.save ></x-btn.save>
      </form>
    </div>
    
    <div class="col-md-2 col-sm-1">
         
    </div>
  </div>
</div>


@endsection