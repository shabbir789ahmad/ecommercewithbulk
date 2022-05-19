@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('admin/social-link')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Upload Link
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Update or Delete Social Links</h4>
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
    <th><i class="fab fa-facebook-f text-primary mr-2"></i>Facebook</th>
    <th><i class="fab fa-twitter text-danger mr-2"></i>Instagram</th>
    <th><i class="fab fa-instagram text-success mr-2"></i>Twitter</th>
    <th ><i class="fab fa-linkedin text-success mr-2"></i>Linkdin</th>
    <th ><i class="fas fa-phone mr-2"></i>Phone</th>
    <th ><i class="fas fa-envelope text-primary mr-2"></i>Email</th>
    <th ><i class="fas fa-map-marker-alt text-primary mr-2"></i>Address</th>
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($link2 as $show)
   
  <tr>
    <td class="a">{{ucfirst($show['facebook'])}}</td>
    <td class="a">{{ucfirst($show['instagram'])}}</td>
    <td class="a">{{ucfirst($show['twitter'])}}</td>
    <td class="a">{{ucfirst($show['linkdin'])}}</td>
    <td class="a">{{ucfirst($show['phone'])}}</td>
    <td class="a">{{ucfirst($show['email'])}}</td>
    <td class="a">{{ucfirst($show['address'])}}</td>
    <td>
     <div class="b d-flex justify-content-center mt-1">
       <a href="{{'update-link/'.$show['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'delete-link/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"> </i>
       </a>
        </div> 
      </td>
        </tr>
       
         @endforeach
         </tbody>
         </table>
       </div>

 {{ $link2->links() }}
  </div>
  </div>
</div>

 @endsection