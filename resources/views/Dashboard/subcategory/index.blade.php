@extends('Dashboard.admin')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="form-group ml-2">
        
        <a href="{{ route('sub.create') }}" id="_btnLink" class="btn btn-primary">
    <i class="fa fa-fw fa-plus-circle"></i>
    Create
</a>
    </div>
  </div>
</div>
<div class="card backgorund " >
  <div class="card-body d-flex">
    <h4>
      All  Sub Category
    </h4>
    
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body px-0">

        @if(count($subcategories) > 0)

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="backgorund">
              <tr>
                
                <th scope="col">Image</th>
                <th scope="col">SubCategory</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($subcategories as $category)
             
              <tr>
                
                <td class="text-dark col-1 p-1"><img src="{{asset('uploads/img/'.$category->subcategory_image)}}" class="rounded" width="100%" height="70rem"></td>
               
                <td class="text-dark align-middle">{{ ucfirst($category->subcategory_name) }}</td>
              
                 
                <td>
                  <a href="{{ route('sub.edit', ['sub' => $category->id]) }}" type="submit" class="btn btn-xs btn-info">
                    Edit
                  </a>
                  <form action="{{ route('sub.destroy', ['sub' => $category->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-xs btn-danger">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>

                
              
                 
                
              
              @endforeach
            </tbody>
          </table>
        </div>

        @else

        <x-resource.resource-component resource="middle category" new="middlecategory.create"></x-resource.resource-component>

        @endif
              
      </div>
    </div>
  </div>
</div>

@endsection