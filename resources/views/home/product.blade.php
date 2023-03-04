      <!-- product section -->
      <section class="product_section layout_padding">
        <div class="container">
           <div class="heading_container heading_center">
              <h2>
                 Our <span>products</span>
              </h2>
           </div>
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
            <!--padding -->

           </div>
           <div class="btn-box">
              <a href="{{url('allproduct')}}">
              View All products
              </a>
           </div>
        </div>
     </section>
     <!-- end product section -->