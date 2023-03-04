
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
        <div style="text-align:left ; padding-top:10px">
        <h2 style="font-size: 10px">Edit Order</h2><br>
        <form action="{{url('/Update_Status',$order->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Order Status :</label>
                <div class="col-sm-10">
                    <select style="color:white" required name="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="Accepted/In Progress">Accepted/In Progress</option>
                        <option value="Pending">Pending</option>
                        <option value="Deliverd">Deliverd</option>
                        <option value="Cancelled">Cancelled</option>
                      </select><br>
                </div>
              </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update Status">
        </form>
    </div>
@include('admin.footer')   