
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
          <h2 style="font-size: 10px;text-align:left">Add Supplier</h2><br>
        <form action="{{url('/Add_Supplier')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Supplier Name :</label>
                <div class="col-sm-10">
                  <input type="text" name="name" style="color: white" placeholder="Write Supplier Name" class="form-control" required><br>
               </div>
            </div>
            <div class="row mb-3">
              <label for="" class="col-sm-2 col-form-label">Supplier Mobile :</label>
              <div class="col-sm-10">
                <input type="text" name="mobile" style="color: white" placeholder="Write Supplier Mobile" class="form-control" required><br>
             </div>
            </div>
            <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Supplier Email :</label>
            <div class="col-sm-10">
              <input type="email" name="email" style="color: white" placeholder="Write Supplier Email" class="form-control" required><br>
           </div>
          </div>
          <div class="row mb-3">
          <label for="" class="col-sm-2 col-form-label">Supplier Address :</label>
          <div class="col-sm-10">
            <input type="text" name="address" style="color: white" placeholder="Write Supplier Address" class="form-control" required><br>
         </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Add Supplier">
        </form>
    </div>
@include('admin.footer')   