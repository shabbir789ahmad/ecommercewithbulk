@extends('master.master')
@section('content')
<div class="container-fluid mt-5 d-flex justify-content-center">
  <div class="card" style="width:95%">
    <div class="card-body table_header">
  <div class="row" >
    <div class="col-md-7">
      <h4>Cart Preview</h4>
    </div>
    <div class="col-md-2">
      <h4>{{count(session('cart'))}} Items</h4>
    </div>
    <div class="col-md-3 text-center">
      <h4> Summary</h4>
    </div>
  </div>
</div>

</div>
</div>

<div class="container-fluid  d-flex justify-content-center">

  
  <div class="row" style="width:95%">
    <div class="col-md-9 p-0">
      <div class="card">
        <div class="card-body p-0">
          <table class="table table-striped table-bordered">
            <thead class="table_header">
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Quantity</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @if(session('cart'))
              @foreach(session('cart') as $id => $item)
               @php  $sum[]=$item['sub_total'] @endphp
               @php $sum2 = array_sum($sum) @endphp
              <tr>
                <td class="col-1"><img src="{{asset('uploads/img/'.$item['image'])}}" width="100%" height="45rem" class="rounded"></td>
                <td class="align-middle">{{ucfirst($item['name'])}}</td>
                <td class="align-middle " id="price">{{$item['price']}}</td>
                <td class="cart_quantity update_cart align-middle">
                  <button class="minus">-</button>
                  <input type="text" name="quantity" id="quantity"  value="{{$item['quantity']}}" data-id="{{$item['id']}}">
                  <button class="plus">+</button>
                </td>
                <td class="align-middle sub_total">{{$item['sub_total']}}</td>
                <td class="align-middle remove_from_cart" data-id="{{$item['id']}}"><i class="fa-solid fa-trash-can text-light bg-danger p-2"></i></td>
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>

        </div>
      </div>
    </div>

    <div class="col-md-3 pr-0">
      <div class="card">
        <div class="card-body">
          <h4>Order Summary</h4>
           <hr>
           <p>Item {{count(session('cart'))}} <span class="float-right ">Rs.<span class="sub_total">{{$sum2}}</span>.00</span></p>
           <p>Shipping</p>
           <select class="form-control">
             <option>Lahore Rs.2</option>
           </select>

           <p>Coupon Code</p>
           <input type="text" name="coupon" class="form-control">
           <button class="btn btn-md mt-3">APPLY</button>
           <hr>
           <p>Final Total <span class="float-right">Rs.<span class="final_total">{{$sum2}}</span>.00</span></p>
           
           <button class="btn btn-md btn-block mt-3">CheckOut Now</button>
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
       a--
       $(this).siblings('input').val(a)
         
      let id=$(this).siblings('input').data('id')
      
      updateCart(a,id);

    });

    function updateCart(quentity,id)
    {
      $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: id, 
                quantity: quentity,
            },
            success: function (response) {
               
               let price=$('#price').text();
               let sub_total=parseInt(price)*parseInt(quentity);
               $('.sub_total').text(sub_total)
               $('.final_total').text(sub_total)
            }
        });
    }

  

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