  @foreach($subcategories as $category)
  <div class="col-md-2 p-2 mt-3" >
    <div class="card">
     <div class="card-body p-0 text-center">
      <figure>
        <img src="{{asset('pic/ac004375cda78507dc50f594e5cea1dd.png')}}" width="60%">
        <p>{{$category['subcategory_name']}}</p>
      </figure>
     </div>
    </div>
   </div>
   @endforeach