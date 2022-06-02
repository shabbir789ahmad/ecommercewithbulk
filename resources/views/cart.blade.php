@extends('master.master')
@section('content')


<div class="container-fluid mt-5 mb-5  d-flex justify-content-center">

  
  <div class="row " style="width:95%;">
   <div class="col-md-8   ">
    <div class=" py-2 text-light" style="background-color: #09192C;">
      <h4 class=" ml-3 mt-1">Orders Details</h4>
      
    </div>
    <?php $sum2=''; ?>
 
    @forelse(session('cart') as $id => $item)
     @php  $sum[]=$item['sub_total'] @endphp
      @php $sum2 = array_sum($sum) @endphp
    <div class="row   border-bottom" style="height: 10rem; background: #fff;">
      <div class="col-md-2  ">
        <img src="{{asset('uploads/img/'.$item['image'])}}" width="100%" height="150rem" class="rounded mt-1">
      </div>
      <div class="col-md-7">
       <h5 class="mt-3">{{ucfirst($item['name'])}}</h5>
        <p><span class="text-danger">Color:</span> <span>{{$item['color']}}</span> <span class="text-danger">Size: </span><span>{{$item['size']}}</span></p>
      </div>
      <div class="col-md-3 ">
       <h5 class="mt-5 font-weight-bold text-center"><span class="text-danger">Rs.</span > <span id="price">{{$item['price']}}</span></h5>
          <div class="d-flex">
            <button class="minus">-</button>
              <input type="text" name="quantity" id="quantity"  value="{{$item['quantity']}}" data-id="{{$item['id']}}">
            <button class="plus">+</button>
          </div>
       
        <p class="remove_from_cart text-center mt-3" data-id="{{$item['id']}}"><i class="fa-solid fa-trash-can text-light bg-danger p-2"></i></p>

      </div>
     </div>
     @empty
     <a href="{{url('/')}}" class="btn btn-info btn-lg mt-5 border-0 ">Continue Shopping</a>
     @endforelse
    
    
      </div> 
  

    <div class="col-md-4 pr-0">
      <div class="card">
        <h4 class="card-header text-light" style="background-color:#09192C">Order Summary</h4>
        <div class="card-body">
          
           <hr>
           <p>Item {{count(session('cart'))}} <span class="float-right ">Rs.<span class="sub_total">{{$sum2}}</span>.00</span></p>
           <p>Shipping  <span class="float-right ">Rs.<span class="ship"></span></span></p>
           <select class="form-control" id="shipping_cost">
            @foreach($shippings as $shipping)
             <option value="{{$shipping['shipping_costs']}}">{{$shipping['city']}} Rs. {{$shipping['shipping_costs']}}</option>
             @endforeach
           </select>

           <p class="mb-0 mt-3">Coupon Code</p>
           <input type="text" name="coupon" class="form-control">
           <button class="btn btn-md mt-3">APPLY</button>
           <hr>
           <p>Final Total <span class="float-right">Rs.<span class="final_total">{{$sum2}}</span>.00</span></p>
           
           <a href="{{route('checkout')}}" class="btn btn-md btn-block mt-3">PROCEED TO CHECKOUT</a>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection
@section('script')
<script type="text/javascript">
  
   $("#quantity").change(function (e) {
        e.preventDefault();
       
        let quentity=$(this).val()
        if(quentity<1)
        {
          quentity=1
        }
        let id=$(this).data('id')
      
         updateCart(quentity,id)
    });

   $(".plus").click(function (e) {
        e.preventDefault();
     
       let data=$(this).siblings('input').val();
       let a=parseInt(data);
       a++;
         alert(a)
       $(this).siblings('input').val(a)
       let id=$(this).siblings('input').data('id')

         updateCart(a,id);
    });

   $(".minus").click(function (e) {
        e.preventDefault();
       
       let data=$(this).siblings('input').val();
       let a=parseInt(data);
       a--;
       if(a<1)
       {
        a=1;
       }
       $(this).siblings('input').val(a)
         
      let id=$(this).siblings('input').data('id')
      
      updateCart(a,id);

    });

    function updateCart(quentity,id)
    {   let shipping=$('#shipping_cost').val();
      $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: id, 
                quantity: quentity,
                shipping: shipping,
            },
            success: function (response) {
               cart();
               calulatePrice(quentity);
               }
        });
    }



 function calulatePrice(quentity)
 {  
    let price=$('#price').text();
    let shipping=$('#shipping_cost').val();
    let sub_total=parseInt(price)*parseInt(quentity);

    sub_total=sub_total + parseInt(shipping);
    $('.sub_total').text(sub_total)
    $('.final_total').text(sub_total)
  };
  $(function(){
    let shipping=$('#shipping_cost').val();
    $('.ship').text(shipping)
  })

  $('#shipping_cost').change(function()
  {
    
    let quentity=$('#quantity').val();
    calulatePrice(quentity)
     let shipping=$('#shipping_cost').val();
     $('.ship').text(shipping)
  });

  $(".remove_from_cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "delete",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: $(this).data("id")
                },
                success: function (response) {
                     window.location.reload();
                    cart();
                }
            });
        }
    });


</script>
@endsection