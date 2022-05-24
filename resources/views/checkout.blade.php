@extends('master.master')
@section('content')


<div class="container-fluid  mb-5  d-flex justify-content-center bg-light" >

  
  <div class="row mt-2" style="width:95%">

   <div class="col-md-8   ">
    <div class="row py-3 text-light" style="background-color: #09192C;">
      <div class="col-md-2">
        Image
      </div>
      <div class="col-md-6">
        Detail
      </div>
      <div class="col-md-2 text-center">
        Price
      </div>
      <div class="col-md-2 text-center">
         Operation
      </div>
    </div>
    <?php $sum2=''; ?>
 
    @forelse(session('cart') as $id => $item)
     @php  $sum[]=$item['sub_total'] @endphp
      @php $sum2 = array_sum($sum) @endphp
    <div class="row   border-bottom" style="height: 10rem; background: #fff;">
      <div class="col-md-2  ">
        <img src="{{asset('uploads/img/'.$item['image'])}}" width="100%" height="150rem" class="rounded mt-1">
      </div>
      <div class="col-md-6">
       <h5 class="mt-3">{{ucfirst($item['name'])}}</h5>
        <p><span class="text-danger">Color:</span> <span>Red</span> <span class="text-danger">Size: </span><span>12</span></p>
      </div>
      <div class="col-md-3 ">
       <h5 class="mt-5 font-weight-bold text-center"><span class="text-danger">Rs.</span > <span id="price">{{$item['price']}}</span></h5>
       </div>   
       <div class="col-md-1">
        <p class="remove_from_cart text-center mt-3" data-id="{{$item['id']}}"><i class="fa-solid fa-trash-can text-light bg-danger p-2"></i></p>

      </div>
     </div>
     @empty
     <a href="{{url('/')}}" class="btn btn-info btn-lg mt-5 border-0 ">Continue Shopping</a>
     @endforelse
    
    
      </div> 
  

    <div class="col-md-4 pr-0">
      <div class="card">
        <h4 class="card-header text-light"  style="background-color: #09192C;">Shipping And Billing</h4>
        <div class="card-body">
          
          <p class="mb-0"><i class="fa-solid fa-location-dot text-info"></i>  {{ucfirst(Auth::user()->name)}}  <span class="float-right text-info get_states" data-toggle="modal" data-target="#exampleModal">Edit</span></span></p>
          <p class="discount">{{$address['state']}},{{$address['city']}},{{$address['address']}}</p>
          
          <p class="discount"><i class="fa-solid fa-address-book text-info"></i> Bill To The Same Address  <span class="float-right text-info">Edit</span></span></p>

          <p class="discount"><i class="fa-solid fa-phone text-info"></i><span id="phone_number">{{Auth::user()->phone}}</span> <span class="float-right text-info show_input_number">Edit</span></span></p>
           
           <div class="update_phone_number" style="display:none;">
           <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" id="user_phone">
           <button class="btn btn-md phone_update" data-id="{{Auth::id()}}">Save</button>
           </div>

          <p class="discount"><i class="fa-solid fa-envelope text-info"></i><span id="email"> {{Auth::user()->email}}</span> <span class="float-right text-info show_user_email">Edit</span></span></p>
          
          <div class="update_email" style="display:none;">
           <input type="text" name="email" value="{{Auth::user()->email}}" class="form-control" id="user_email">
           <button class="btn btn-md email_user_update" data-id="{{Auth::id()}}">Save</button>
           </div>
          
           <p>Order Summary </p>

           <p class="discount">SubTotal <span class="float-right ">Rs.<span class="ship font-weight-bold text-dark">434</span></span></p>
           <p class="discount">Shipping Fee <span class="float-right ">Rs.<span class="ship text-dark font-weight-bold">434</span></span></p>
           

           <p class="mb-0 mt-3 d-flex">Coupon Code</p>
           <div class="d-flex">
           <input type="text" name="coupon" class="form-control">
           <button class="btn btn-md ">APPLY</button>
           </div> 
           <hr>
           <p>Final Total <span class="float-right">Rs.<span class="final_total">{{$sum2}}</span>.00</span></p>
           
           <a href="{{route('checkout')}}" class="btn btn-md btn-block mt-3">Proceed To Pay</a>
        </div>
      </div>
    </div>
  </div>
</div>


<x-addresscomponent />



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
       a++
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
                }
            });
        }
    });


</script>
@endsection