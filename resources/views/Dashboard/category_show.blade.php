@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('admin/get-cat')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Category
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Update or Delete Menu</h4>
   </div>
 </div>

<a href="{{url('admin/show-category')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin/show-category')}}">
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
   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
 <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active text-light" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Men</a>
  </li>
  <li class="nav-item ml-2">
    <a class="nav-link text-light" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Women</a>
  </li>
  <li class="nav-item ml-2">
    <a class="nav-link text-light" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Kids</a>
  </li>
</ul>
     </div>

      <div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    
  <div class="table-responsive p-3">
  <table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Category</th>
    <th>Main Category</th>
    <th>Sub Category</th>
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($showcat as $show)
   @if($show['menue_id']==1)
  <tr>
    <td>{{ucfirst($show['smenue'])}}</td>
    <td>{{ucfirst($show['category'])}}</td>
    <td>{{ucfirst($show['name'])}}</td>
    <td>
     <div class="b d-flex justify-content-center mt-3">
       <a href="{{'get-category/'.$show['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'delete-category/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"> </i>
       </a>
        </div> 
      </td>
        </tr>
         @endif
         @endforeach
         </tbody>
         </table>
       </div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    
   <div class="table-responsive p-3">
  <table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Category</th>
    <th>Main Category</th>
    <th>Sub Category</th>
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($showcat as $show)
   @if($show['menue_id']==2)
  <tr>
     <td>{{ucfirst($show['smenue'])}}</td>
    <td>{{ucfirst($show['category'])}}</td>
    <td>{{ucfirst($show['name'])}}</td>
    <td>
     <div class="b d-flex justify-content-center mt-3">
       <a href="{{'get-category/'.$show['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'delete-category/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"> </i>
       </a>
        </div> 
      </td>
        </tr>
         @endif
         @endforeach
         </tbody>
         </table>
       </div>

  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    
     <div class="table-responsive p-3">
  <table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Category</th>
    <th>Main Category</th>
    <th>Sub Category</th>
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($showcat as $show)
   @if($show['menue_id']==3)
  <tr>
    <td>{{ucfirst($show['smenue'])}}</td>
    <td>{{ucfirst($show['category'])}}</td>
    <td>{{ucfirst($show['name'])}}</td>
    <td>
     <div class="b d-flex justify-content-center mt-3">
       <a href="{{'get-category/'.$show['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'delete-category/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
         <i class="fas fa-trash-alt text-danger"> </i>
       </a>
        </div> 
      </td>
        </tr>
         @endif
         @endforeach
         </tbody>
         </table>
       </div>

  </div>
</div>



               
              </div>
            </div>
           
          </div>
          <!--Row-->

        


 </div>

 @endsection