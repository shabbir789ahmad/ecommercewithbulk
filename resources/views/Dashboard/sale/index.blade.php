@extends('Dashboard.admin')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="form-group ml-2">
        
        <a href="{{ route('sale.create') }}" id="_btnLink" class="btn btn-primary">
    <i class="fa fa-fw fa-plus-circle"></i>
    Create
</a>
    </div>
  </div>
</div>
<div class="card backgorund " >
  <div class="card-body d-flex">
    <h4>
      All  Sale
    </h4>
    
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body px-0">

        @if(count($sales) > 0)

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="backgorund">
              <tr>
               
                <th scope="col">Image</th>
                <th scope="col">Sale Name</th>
                <th scope="col">Start Time</th>
                <th scope="col">End Time</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($sales as $sale)
              <tr>
                
                <td class="col-2 align-middle"><img src="{{asset('uploads/img/'.$sale['sale_image'])}}" width="90%" height="80rem"></td>
                <td class="text-dark  align-middle">{{ ucfirst($sale->sale_name) }}</td>
                <td class="text-dark  align-middle">{{ ucfirst($sale->start_time) }}</td>
                <td class="text-dark  align-middle">{{ ucfirst($sale->end_time) }}</td>
                <td class="text-dark  align-middle">{{ ucfirst($sale->sell_status) }}</td>
              
            
                <td>
                  <a href="{{ route('sale.edit', ['sale' => $sale->id]) }}" type="submit" class="btn btn-xs btn-info">
                    Edit
                  </a>
                  <form action="{{ route('sale.destroy', ['sale' => $sale->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

        <x-resource.resource-component resource="Sale" new="sale.create"></x-resource.resource-component>

        @endif
              
      </div>
    </div>
  </div>
</div>

@endsection