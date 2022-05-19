@extends('Dashboard.admin')
@section('content')

<div class="card  " >
  <div class="card-body  backgorund">
     Create  Middle Category
  </div>
</div>


 <div class="container-fluid">
  <div class="row">
    <div class="col-md-2 col-sm-1">
    </div>
    <div class="col-md-8 card col-sm-10  mt-5 p-5">
     <form action="{{route('middlecategory.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        

          <label for="" class="fw-bold mb-1 label_font_size">
              Select Category <span class="text-danger">*</span>
            </label>
             <select class="form-control " name="category_id">

               @foreach($categories as $category)
               <option value="{{$category['id']}}">{{$category['category']}}</option>
               @endforeach
             </select>
             
             <x-form.input name="middlecategory_name" label="middle Category Name" type="text"></x-forms.input>

              <x-btn.save ></x-btn.save>
      </form>
    </div>
    
    <div class="col-md-2 col-sm-1">
         
    </div>
  </div>
</div>


@endsection