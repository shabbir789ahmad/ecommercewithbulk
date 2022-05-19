@extends('Dashboard.admin')
@section('content')

<div class="card  " >
  <div class="card-body  backgorund">
     Create  Category
  </div>
</div>


 <div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-sm-1">
    </div>
    <div class="col-md-8 card col-sm-10  mt-5 p-5">
     <form action="{{route('slider.update',['slider'=>$slider['id']])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
          <x-form.input name="slider_detail" label="Slider Detail" type="text" value="{{$slider['slider_detail']}}"></x-forms.input>
          <label for="" class="fw-bold mb-1 label_font_size">
              Logo Image <span class="text-danger">*</span>
            </label>
            <x-form.inputimg name="image"></x-forms.inputimg>

              <x-btn.save ></x-btn.save>
      </form>
    </div>
    
    <div class="col-md-2 col-sm-1">
         
    </div>
  </div>
</div>


@endsection