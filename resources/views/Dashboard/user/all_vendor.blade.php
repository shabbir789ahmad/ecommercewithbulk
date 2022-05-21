@extends('Dashboard.admin')

@section('content')

<div class="card backgorund " >
  <div class="card-body d-flex">
    <h4>
      All Non Approved  Vendor
    </h4>
    
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body px-0">

        @if(count($vendors) > 0)

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="backgorund">
              <tr>
               
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($vendors as $vendor)
              <tr>
                
                <td class="col-1 align-middle"><img src="{{asset('uploads/img/'.$vendor['image'])}}" width="100%"></td>
                <td class="text-dark  align-middle">{{ ucfirst($vendor->name) }}</td>
                <td class="text-dark  align-middle">{{ ucfirst($vendor->email) }}</td>
                <td class="text-dark  align-middle">{{ ucfirst($vendor->phone) }}</td>
              
                <td class="align-middle " ><input type="checkbox" data-id="{{ $vendor['id'] }}" name="vendor_status" class="js-switchv" 
                {{ $vendor->vendor_status == 1 ? 'checked' : '' }} ></td>
    
                <td class="align-middle">
                  <a href="{{route('delete.vendor',['id'=>$vendor['id']])}}" type="submit" class="btn btn-xs btn-info">
                    Detail
                  </a>
                  <form action="" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

        <x-resource.resource-component resource="Vendor" new="all.vendor"></x-resource.resource-component>

        @endif
              
      </div>
    </div>
  </div>
</div>

@endsection