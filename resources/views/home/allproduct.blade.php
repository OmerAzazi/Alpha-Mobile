@include('home.header')
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div style="color: black; padding-left:320px;padding-right:300px">
         <form action="{{url('product_search')}}" method="GET">
           @csrf
           <input type="text" name="search" placeholder="Search For Something">
           <input type="submit" value="search" class="btn btn-outline-primary" style="height: 42px">
         </form>
       </div><br>
       <div class="row">
        @foreach($product as $datap)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('product_details',$datap->id)}}" class="option1">
                      Product Details
                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="product/{{$datap->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{$datap->title}}
                   </h5>
                  <!-- <h6 style="text-decoration: line-through;">
                    {{$datap->price}}$
                </h6> -->
                    <h6 style="color: red">
                   @if($datap->discount_price!=null)
                    {{$datap->discount_price}}$
                </h6>
                @endif
                </div>
             </div>
          </div>
          @endforeach
       </div>
          <span style="padding-top: 20px; padding-left: 430px;">
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>      
    </div>
 </section>
@include('home.footer')