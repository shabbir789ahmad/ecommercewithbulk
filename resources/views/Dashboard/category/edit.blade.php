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
     <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <x-form.input name="category" label="Category Name" type="text"></x-forms.input>

          <label for="" class="fw-bold mb-1 label_font_size">
              Category Image <span class="text-danger">*</span>
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