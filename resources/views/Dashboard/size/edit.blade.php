@extends('Dashboard.admin')
@section('content')

<div class="card  " >
  <div class="card-body  backgorund">
       Update Product Size
  </div>
</div>


 <div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-sm-1">
    </div>
    <div class="col-md-8 card col-sm-10  mt-5 p-5">
     <form action="{{route('size.update',['size'=>$size['id']])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-form.input name="size" label="Product Size Name" type="text" value="{{$size['size']}}"></x-forms.input>

        

              <x-btn.save ></x-btn.save>
      </form>
    </div>
    
    <div class="col-md-2 col-sm-1">
         
    </div>
  </div>
</div>


@endsection