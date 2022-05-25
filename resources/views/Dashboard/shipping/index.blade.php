@extends('Dashboard.admin')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="form-group ml-2">
        
        <a href="{{ route('shipping.create') }}" id="_btnLink" class="btn btn-primary">
    <i class="fa fa-fw fa-plus-circle"></i>
    Create
</a>
    </div>
  </div>
</div>
<div class="card backgorund " >
  <div class="card-body d-flex">
    <h4 class="font-weight-bold">
      All  Shipping Cost
    </h4>
    
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body px-0">

        @if(count($shippings) > 0)

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="backgorund">
              <tr>
                
                <th scope="col">State</th>
                <th scope="col">City</th>
                <th scope="col">Shipping Cost</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($shippings as $shipping)
               @foreach($shipping->cities as $city)
              <tr>
                
               <td class="text-dark align-middle">{{ ucfirst($shipping->state) }}</td>
             
               <td class="text-dark align-middle">{{ ucfirst($city['city']) }}</td>

                <td class="text-dark align-middle">{{ $city->shipping_costs }}</td>
             
                 
                <td>
                  <a href="{{ route('shipping.edit', ['shipping' => $city->id]) }}" type="submit" class="btn btn-xs btn-info">
                    Edit
                  </a>
                  <form action="{{ route('shipping.destroy', ['shipping' => $city->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-xs btn-danger">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>

                
              
                 
                
               @endforeach
              @endforeach
            </tbody>
          </table>
        </div>

        @else

        <x-resource.resource-component resource=" Shipping Cost" new="shipping.create"></x-resource.resource-component>

        @endif
              
      </div>
    </div>
  </div>
</div>

@endsection