@extends('Dashboard.admin')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="form-group ml-2">
        
        <a href="{{ route('logo.create') }}" id="_btnLink" class="btn btn-primary">
    <i class="fa fa-fw fa-plus-circle"></i>
    Create
</a>
    </div>
  </div>
</div>
<div class="card backgorund " >
  <div class="card-body d-flex">
    <h4>
      All  Logos
    </h4>
    
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body px-0">

        @if(count($logos) > 0)

        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="backgorund">
              <tr>
                <th scope="col">Logo</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach($logos as $logo)
              <tr>
                
                <td class="text-dark col-2 p-1">
                  <img src="{{asset('uploads/img/'.$logo->logo)}}" class="rounded" width="100%" height="70rem"></td>
              
              
                 <td class="col-8"></td>
                <td class="col-2">
                  <a href="{{ route('logo.edit', ['logo' => $logo->id]) }}" type="submit" class="btn btn-xs btn-info">
                    Edit
                  </a>
                  <form action="{{ route('logo.destroy', ['logo' => $logo->id]) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
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

        <x-resource.resource-component resource="Logo" new="logo.create"></x-resource.resource-component>

        @endif
              
      </div>
    </div>
  </div>
</div>

@endsection