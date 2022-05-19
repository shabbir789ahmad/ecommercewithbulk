@extends('Dashboard.admin')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="form-group ml-2">
        
        <a href="{{ route('brand.create') }}" id="_btnLink" class="btn btn-primary">
    <i class="fa fa-fw fa-plus-circle"></i>
    Create
</a>
    </div>
  </div>
</div>
<div class="card backgorund " >
  <div class="card-body d-flex">
    <h4>
      All  Brand
    </h4>
    
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body px-0">

        @if(count($brands) > 0)

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="backgorund">
              <tr>
               
                <th scope="col">Brand</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($brands as $brand)
              <tr>
                
                <td class="text-dark  align-middle">{{ ucfirst($brand->bname) }}</td>
              
                 <td class="col-8"></td>
                <td>
                  <a href="{{ route('brand.edit', ['brand' => $brand->id]) }}" type="submit" class="btn btn-xs btn-info">
                    Edit
                  </a>
                  <form action="{{ route('brand.destroy', ['brand' => $brand->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

        <x-resource.resource-component resource="Brand" new="brand.create"></x-resource.resource-component>

        @endif
              
      </div>
    </div>
  </div>
</div>

@endsection