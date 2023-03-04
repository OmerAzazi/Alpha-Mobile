
@include('admin.header')
<body>
  <div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
@include('admin.nav')
<div class="main-panel">
    <div class="content-wrapper">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
              </button>
             {{session()->get('message')}}
        </div>
        @endif
        <div style="text-align:center ; padding-top:10px">
          <h2 style="font-size: 10px;text-align:left">Update Product</h2><br>
        <form action="{{url('/UpdateProduct',$products->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Product Name :</label>
                <div class="col-sm-10">
                  <input value="{{$products->title}}" type="text" name="title" style="color: white" placeholder="Write Product Name" class="form-control" required><br>
               </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Supplier Name :</label>
                <div class="col-sm-10">
                    <select style="color:white" required name="supplier" class="form-control">
                        <option style="color:white" value="">--Please choose an option--</option>
                        @foreach($suppliers as $item)
                        <option style="color:white" value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select><br>
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Product Desc :</label>
                <div class="col-sm-10">
                  <input value="{{$products->description}}" name="description" style="color: white" class="form-control" required></textarea><br>
                </div>
              </div>
              <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Product Price :</label>
                  <div class="col-sm-10">
                      <input value="{{$products->price}}" type="number" style="color: white" name="price" placeholder="Write Product Price" required class="form-control"><br>
                  </div>
                </div> <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Discount Price :</label>
                  <div class="col-sm-10">
                      <input value="{{$products->discount_price}}" type="number" style="color: white" name="dis_price" placeholder="Write Discount Price" class="form-control"><br>
                  </div>
                </div> <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label">Product Quantity :</label>
                  <div class="col-sm-10">
                      <input value="{{$products->quantity}}" type="number" style="color: white" min="0" name="quantity" class="form-control" placeholder="Write Product Quantity"><br>
                  </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Current Image :</label>
                <div class="col-sm-10">
                    <img height="100" width="100" src="/product/{{$products->image}}">
                    <br>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">New Pr Image :</label>
                <div class="col-sm-10">
                    <input type="file" name="image"><br>
                </div>
              </div> 
            <input type="submit" name="submit" class="btn btn-primary" value="Update Product">
        </form>
    </div>
@include('admin.footer')   