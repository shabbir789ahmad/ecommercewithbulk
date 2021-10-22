@extends('Dashboard.admin')
@section('content')

<div class="b p-3 mt-0" style="background-color:#F0F0F0">

  <div class="c ml-3  d-flex mr-1">

    <a href="{{url('admin/get-sub-category')}}">
    <div class="card shadow border p-0 ">
    <div class="card-body text-dark">
   <i class="fab fa-slideshare text-success fa-lg"></i> Sub Category
   </div>
 </div>
</a>
    
    <div class="card shadow border ml-auto w-50 p-0 ">
    <div class="card-body text-dark">
  <h4 class="text-center font-weight-bold text-color">Update Or Delete Sub Category</h4>
   </div>
 </div>

<a href="{{url('admin/show-sub-category')}}" class="ml-auto">
   <div class="card shadow border ml-auto p-0 mr-2">
    <div class="card-body text-dark">
   <i class="fas fa-pencil-alt text-success fa-lg"></i> Update
   </div>
 </div>
</a>
<a href="{{url('admin/show-sub-category')}}">
 <div class="card shadow  p-0 mr-3 ">
    <div class="card-body text-dark">
   <i class="fas fa-trash-alt text-danger fa-lg"></i> Delete
   </div>
 </div>
</a>
</div>

  <div class="c mt-3" id="container-wrapper ">
    <!-- Row -->
  <div class="row">
   <div class="col-lg-12">
    <div class="card mb-4">
     <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
         @foreach($cat as $show)
  <li class="nav-item ml-2">
    <a class="nav-link text-light @if($loop->first) active @endif" id="pills-home-tab" data-toggle="pill" href="#pills-{{$show['id']}}" role="tab" aria-controls="pills-{{$show['id']}}" aria-selected="true">{{ucfirst($show['category'])}}</a>
  </li>
   @endforeach
 
</ul>
     </div>

<div class="tab-content" id="pills-tabContent">
  @foreach($cat as $sho)
  <div class="tab-pane fade @if($loop->first) show active @endif" id="pills-{{$sho['id']}}" role="tabpanel" aria-labelledby="pills-{{$sho['id']}}-tab">
    @if($loop->first)
  <div class="table-responsive p-3">
  <table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Image</th>
    <th>Sub Category</th>
    <th>Category</th>
    <th>Main Category</th>
    
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($data as $show)
   @if($show['category_id']==$sho['id'])
  <tr>
    <td class="a col-2" >
      <img  src="{{asset('uploads/img/' .$show['drop_image'])}}"  alt="..." width="70%">
    </td>
    <td>{{ucfirst($show['name'])}}</td>
    <td>{{ucfirst($show['smenue'])}}</td>
    <td>{{ucfirst($show['category'])}}</td>
    
    <td>
     <div class="b d-flex justify-content-center mt-3">
       <a href="{{'update-sub-category/'.$show['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'delete-sub-category/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
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
       @else

    <div class="table-responsive p-3">
  <table class="table align-items-center table-flush" id="dataTable">
   <thead class="thead-light">
   <tr>
    <th>Image</th>
    <th>Sub Category</th>
    <th>Category</th>
    <th>Main Category</th>
    
    <th class="text-center">Operation</th>
    </tr>
    </thead>
                    
   <tbody>
   @foreach($data as $show)
   @if($show['category_id']==$sho['id'])
  <tr>
    
     <td class="a col-2" >
      <img  src="{{asset('uploads/img/' .$show['drop_image'])}}"  alt="..." width="70%">
    </td>
    <td>{{ucfirst($show['name'])}}</td>
    <td>{{ucfirst($show['smenue'])}}</td>
    <td>{{ucfirst($show['category'])}}</td>
    
    <td>
     <div class="b d-flex justify-content-center mt-3">
       <a href="{{'update-sub-category/'.$show['id']}}" class="border shadow  py-2 px-3"><i class="fas fa-pen text-success"></i></a>
        <a href="{{'delete-sub-category/'.$show['id']}}" class="border ml-3 py-2 px-3" onclick="return confirm('Are you sure?')">  
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
       @endif
    </div>
 @endforeach

 
</div>



               
              </div>
            </div>
           
          </div>
          <!--Row-->

        


 </div>

 @endsection