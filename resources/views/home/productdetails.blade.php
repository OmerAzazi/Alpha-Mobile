@include('home.header')
<div style="display:flex; justify-content:center; align-items:center">
    <p style="font-size: 40px"><strong>Product Details</strong></p>
 </div><br>

    <div class="row">
       <div class="col-sm-6" style="display:flex; justify-content:center; align-items:center">
          <img src="product/{{$product->image}}" alt="" width="300">
       </div>
       <div class="col-sm-6" style="text-align: left">
          <p style="margin-top: 50px;margin-right: 100px;">
          {{$product->description}}<br><br>
          <p style="text-decoration: line-through;">
          Original Price : {{$product->price}} $ <br>
          </p>
          @if($product->discount_price!=null)
          Current Price : {{$product->discount_price}} $
          @endif
          <br><br>
          <span style="border: red 1px solid; padding: 1em;">Product Avalibity Left : {{$product->quantity}} Stocks </span>
          <br><br>
          @if (Route::has('login'))
           @auth
           <form action="{{url('add_cart',$product->id)}}" method="POST">
             @csrf
             @if($product->quantity >= '1') 
             Quantity :  <input type="number" name="quantity" value="1" min="1" max="{{$product->quantity}}" style="width: 100px" >
             <input type="submit" value="Add To Cart">
             @else
             @endif       
           </form>
           @else
           *You need to login to add item to cart.
          @endauth
          @endif 
          </p>
       </div>
    </div>
    <br>
@include('home.footer')