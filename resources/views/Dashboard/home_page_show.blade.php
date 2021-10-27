@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('admin/social-link')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Upload Heading
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Update or Delete Front Page Categories</h4>
   </div>
 </div>

<a href="{{url('admin/show-link')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin/show-link')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>
         <div class="c mt-3" id="container-wrapper ">
       

<div class="row">
 <div class="col-lg-12">
  <div class="card mb-4">
            

   
<div class="table-responsive p-3">
<table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Category </th>
    <th>Category </th>
    <th>Category </th>
    <th>Search Tag </th>
    <th >Heading 4</th>
    <th >Search Tag </th>
    <th >Heading 5</th>
    <th >Search Tag </th>
    
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($main as $show)
  
   
  <tr>
    <td class="a">{{ucfirst($show['c1'])}}</td>
    <td class="a">{{ucfirst($show['c2'])}}</td>
    <td class="a">{{ucfirst($show['c3'])}}</td>
     @foreach($drop as $d)
    @if($show['tag3_id']==$d['id'])
    <td class="a">{{ucfirst($d['category'])}}</td>
    @endif
     @endforeach
    <td class="a">{{ucfirst($show['c4'])}}</td>
     @foreach($drop as $d)
    @if($show['tag4_id']==$d['id'])
    <td class="a">{{ucfirst($d['category'])}}</td>
    @endif
     @endforeach
   
    <td class="a">{{ucfirst($show['c5'])}}</td>
    @foreach($drop as $d)
    @if($show['tag5_id']==$d['id'])
    <td class="a">{{ucfirst($d['category'])}}</td>
    @endif
     @endforeach
   
    <td>
     <div class="b d-flex justify-content-center mt-1">
       <a href="{{'update-front/'.$show['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'delete-front/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"> </i>
       </a>
        </div> 
      </td>
        </tr>
       
        
         @endforeach
         </tbody>
         </table>
       </div>

 {{ $main->links() }}
  </div>
  </div>
</div>

 @endsection