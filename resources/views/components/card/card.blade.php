<div class="card shadow " >

   <p class="discount_off">sale</p>
      <a href="{{route('product.detail',['id'=>$product['id']])}}"  style="text-decoration:none">
       
       <img src="{{asset('uploads/img/'.$product->image['product_image'])}}" width="100%" class="product_image">
       </a>
         <div class="card-body p-1 pb-2">
        <div class="product_name mb-0">
          <p class="mb-1">{{ucfirst($product['product_name'])}}</p>
         
          <i class="fa-regular fa-heart  heart_style like_by_customer" data-id="{{$product['id']}}"></i>
         
      
         <?php unset($value);?>
        </div>

         <div class="product_price mb-0">
           <span><s>${{$product['price']}}.00</s> | </span>
          <p class="mb-1">${{$product['discount_price']}}.00</p>
         </div>
         <div class="star_rating float-right">
          @for($i=0; $i<5; $i++)
            @if($i<$product['rating'])
               <span class="fa fa-star checked"></span>
            @else
              <span class="fa fa-star text-dark"></span>
            @endif
            @endfor
          </div>
         
         
      </div>
   
     
     </div>
