
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
          <h2 style="font-size: 10px;text-align:left">All Stock</h2><br>
        <form action="{{url('/Add_Stock')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Supplier Name :</label>
                <div class="col-sm-10">
                    <select style="color:white" required name="sname" class="form-control" required>
                        <option style="color:white" value="">--Please choose an option--</option>
                        @foreach($supplier as $item)
                        <option style="color:white" value="{{$item->name}}">{{$item->name}}</option>
                        @endforeach
                    </select> <br>
                </div>
            </div>
            <div class="row mb-3">
              <label for="" class="col-sm-2 col-form-label">Product Name :</label>
              <div class="col-sm-10">
                <input type="text" name="pname" style="color: white" placeholder="Write Product Name" class="form-control" required><br>
             </div>
            </div>
            <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Product Quantity :</label>
            <div class="col-sm-10">
              <input type="number" name="quantity" style="color: white" placeholder="Write Product Quantity" class="form-control" required><br>
           </div>
          </div>
          <div class="row mb-3">
          <label for="" class="col-sm-2 col-form-label">Product Price(EA) :</label>
          <div class="col-sm-10">
            <input type="number" name="price" style="color: white" placeholder="Write Product Price" class="form-control" required><br>
         </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Add Stock">
        </form>
    </div>
@include('admin.footer')   