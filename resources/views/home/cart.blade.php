@include('home.header')
<div style="display:flex; justify-content:center; align-items:center">
    <p style="font-size: 40px"><strong>CART</strong></p>
 </div><br>

 <div style="padding-left: 100px;padding-right: 100px;" >
 <table class="table" style=" justify-content:center; align-items:center;">
   <thead>
     <tr>
       <th scope="col">Product Title</th>
       <th scope="col">Product Quantity</th>
       <th scope="col">Product Price</th>
       <th scope="col">Product Image</th>
       <th scope="col">Delete</th>
     </tr>
   </thead>
   <tbody>
       <?php $totalprice=0; ?>
       @forelse($cart as $cartp)
       <tr>
           <td>{{$cartp->product_title}}</td>
           <td>{{$cartp->quantity}}</td>
           <td>{{$cartp->price}}$</td>
           <td><img class="img_deg" width="25px" src="/product/{{$cartp->image}}"></td>
           <td>
               <a onclick="return confirm('Are you sure you want to delete this ?')" class="btn btn-danger" href="{{url('delete_item',$cartp->id)}}">Delete</a> 
           </td>
           @empty
           <td>No Item Found <br> Add Items To Your Cart <a href="{{url('allproduct')}}">Click Here</a></td>
         </tr>
       @endforelse
       @foreach($cart as $cartp)
       <?php $totalprice=$totalprice + $cartp->price ?>
       @endforeach
   </tbody>
 </table><br><br>
    @if($totalprice > 1)
    <div class ="row">
        <div class="col-md-8 my-md-auto mt-3">
            <h4 style="font-size: 15px">
                Add More Items To Your Cart <a href="{{url('allproduct')}}">Click Here</a>
            </h4>
        </div>
        <div class="col-md-4 mt-3">
            <div class="shadow-sm bg-white p-3">
                <h4>Total:
                    <span class="float-end">{{$totalprice}}$</span>
                </h4>
                <hr>
                <a href="{{url('Checkout',$totalprice)}}" class="btn btn-warning w-100">Checkout</a>
            </div>
        </div>
    @endif

</div>
</div> 
<br>
@include('home.footer')