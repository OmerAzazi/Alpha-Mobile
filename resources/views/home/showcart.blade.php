@include('home.css')
   <style>

    h1,h2,h3,h4,h5,h6{
        margin: 0;
        padding: 0;
    }
    p{
        margin: 0;
        padding: 0;
    }
    .container{
        width: 80%;
        margin-right: auto;
        margin-left: auto;
    }
    .brand-section{
       background-color: #0d1033;
       padding: 10px 40px;
    }
    .logo{
        width: 50%;
    }

    .row{
        display: flex;
        flex-wrap: wrap;
    }
    .col-6{
        width: 50%;
        flex: 0 0 auto;
    }
    .text-white{
        color: #fff;
    }
    .company-details{
        float: right;
        text-align: right;
    }
    .body-section{
        padding: 16px;
        border: 1px solid gray;
    }
    .heading{
        font-size: 20px;
        margin-bottom: 08px;
    }
    .sub-heading{
        color: #262626;
        margin-bottom: 05px;
    }
    .table-bordered{
        box-shadow: 0px 0px 5px 0.5px gray;
    }
    .table-bordered td, .table-bordered th {
        border: 1px solid #dee2e6;
    }
    .text-right{
        text-align: end;
    }
    .w-20{
        width: 20%;
    }
    .float-right{
        float: right;
    }
</style>
   <body>
      <div>
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      <div style="display:flex; justify-content:center; align-items:center">
         <p style="font-size: 40px"><strong>CART</strong></p>
      </div><br>
      <div style="padding-left:250px;padding-right:250px">
      @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                     {{session()->get('message')}}
                </div>
      @endif
      </div>
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
            @foreach($cart as $cartp)
            <tr>
                <td>{{$cartp->product_title}}</td>
                <td>{{$cartp->quantity}}</td>
                <td>{{$cartp->price}}</td>
                <td><img class="img_deg" width="25px" src="/product/{{$cartp->image}}"></td>
                <td>
                    <a onclick="return confirm('Are you sure you want to delete this ?')" class="btn btn-danger" href="{{url('delete_item',$cartp->id)}}">Delete</a> 
                </td>
              </tr>
              <?php $totalprice=$totalprice + $cartp->price ?>
            @endforeach
        </tbody>
      </table><br><br>
      <div>
        <div class="container">
            <div class="brand-section">
                <div class="row">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                        <div class="company-details">
                            <p class="text-white">Alpha Mobile</p>
                            <p class="text-white">MARKA, Amman</p>
                            <p class="text-white">+91 987 654 3210</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="body-section">
                <div class="row">
                    <div class="col-6">
                        <h2 class="heading">Invoice</h2>
                        <p class="sub-heading">Date and Time: <span id='date-time'></span>.</p>
                        <p class="sub-heading">Email Address: {{$user->email}} </p>
                    </div>
                    <div class="col-6">
                        <p class="sub-heading">Full Name:&nbsp{{$user->name}}</p>
                        <p class="sub-heading">Address:&nbsp{{$user->address}}</p>
                        <p class="sub-heading">Phone Number:&nbsp{{$user->phone}}</p>
                    </div>
                </div>
            </div>
    
            <div class="body-section">
                <h3 class="heading">Ordered Items</h3>
                <br>
                <table class="table-bordered" style="background-color: #fff; width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border: 1px solid #111;background-color: #f2f2f2;">
                            <th style="padding-top: 08px;padding-bottom: 08px;vertical-align: middle !important;text-align: center;">Product</th>
                            <th style="padding-top: 08px;padding-bottom: 08px;vertical-align: middle !important;text-align: center;" class="w-20">Quantity</th>
                            <th style="padding-top: 08px;padding-bottom: 08px;vertical-align: middle !important;text-align: center;" class="w-20">Total Price</th>
                            <th style="padding-top: 08px;padding-bottom: 08px;vertical-align: middle !important;text-align: center;" class="w-20">.....</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $cartp)
                        <tr>
                            <td style="vertical-align: middle !important;text-align: center;">{{$cartp->product_title}}</td>
                            <td style="vertical-align: middle !important;text-align: center;">{{$cartp->quantity}}</td>
                            <td style="vertical-align: middle !important;text-align: center;">{{$cartp->price}}</td>
                        </tr>
                        @endforeach
                        <tr>
                            <td style="vertical-align: middle !important;text-align: center;" colspan="3" class="text-right">Grand Total</td>
                            <td style="vertical-align: middle !important;text-align: center;">{{$totalprice}} $
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                @if($totalprice > 1)
                    Payment Mode : <a onclick="return confirm('Are you sure you want to purchase ?')" href="{{url('cash_order')}}" class="btn btn-danger"> Cash On Delivery </a> OR <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger"> Card </a>
                @endif

            </div>
    
            <div class="body-section">
                <p>&copy; Copyright 2021 - Alpha Mobile. All rights reserved. 
                </p>
            </div>      
        </div>      
    
      </div>
      </div>
      </div>
         <br>
         


         @include('home.footer')