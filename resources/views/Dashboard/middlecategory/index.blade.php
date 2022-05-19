@extends('Dashboard.admin')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="form-group ml-2">
        
        <a href="{{ route('middlecategory.create') }}" id="_btnLink" class="btn btn-primary">
    <i class="fa fa-fw fa-plus-circle"></i>
    Create
</a>
    </div>
  </div>
</div>
<div class="card backgorund " >
  <div class="card-body d-flex">
    <h4>
      All  Middel Category
    </h4>
    
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body px-0">

        @if(count($middle_categories) > 0)

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="backgorund">
              <tr>
                
                <th scope="col">Middle Category</th>
                <th scope="col">Category</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($middle_categories as $category)
              @foreach($category->categories as $middle)
              <tr>
                @if($middle['id'])
                <td class="text-dark align-middle">{{ ucfirst($middle->middlecategory_name ) }}</td>
                <td class="text-dark align-middle">{{ ucfirst($category->category ) }}</td>

                <td>
                  <a href="{{ route('middlecategory.edit', ['middlecategory' => $middle->id]) }}" type="submit" class="btn btn-xs btn-info">
                    Edit
                  </a>
                  <form action="{{ route('middlecategory.destroy', ['middlecategory' => $middle->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-xs btn-danger">
                      Delete
                    </button>
                  </form>
                </td>
                @endif
                </tr>
                @endforeach


                
              
                 
                
              
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