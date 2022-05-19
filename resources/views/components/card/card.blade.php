<div class="card shadow " >

   <p class="discount_off">sale</p>
      <a href="{{route('product.detail',['id'=>$product['id']])}}"  style="text-decoration:none">
       @if($product->image)
       <img src="{{asset('uploads/img/'.$product->image['product_image'])}}" width="100%" class="product_image">
      @endif
       <div class="card-body p-1 ">
        <div class="product_name mb-0">
          <p class="mb-1">{{ucfirst($product['product_name'])}}</p>
          <i class="fa-regular fa-heart  heart_style like_by_customer2" data-id="{{$product['id']}}"></i>
        </div>

         <div class="product_price mb-0">
           <span><s>${{$product->stocks['discount_price']}}.00</s> | </span>
          <p class="mb-1">${{$product->stocks['price']}}.00</p>
         
        </div>
      </div>
   
     </a>
     </div>
