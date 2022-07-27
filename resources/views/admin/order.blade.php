<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alpha Mobile</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')

        <div class="main-panel">
            <div class="content-wrapper">
        <div style="text-align:center ; padding-top:60px;">
            <h2>All Order</h2><br>
        <div style="color: black">
          <form action="{{url('search')}}" method="get">
            @csrf
            <input type="text" name="search" placeholder="Search For Something">
            <input type="submit" value="search" class="btn btn-outline-primary" style="height: 42px">
          </form>
        </div><br>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">P Title</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">P Status</th>
                    <th scope="col">D Status</th>
                    <th scope="col">Time</th>
                    <th scope="col">Email</th>



                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                    <tr>
                      <td>{{$data->name}}</td>
                      <td>{{$data->phone}}</td>
                      <td>{{$data->product_title}}</td>
                      <td>{{$data->quantity}}</td>
                      <td>{{$data->price}}</td>
                      <td>{{$data->payment_status}}</td>
                      <td>
                        @if($data->delivery_status=='Processing')
                        <a href="{{url('delivered',$data->id)}}" class="btn btn-primary">Processing..</a>   
                        @else
                        <p style="color:brown"> {{$data->delivery_status}} </p>

                        @endif                   
                      </td>
                      <td>{{$data->created_at}}</td>
                      <td><a href="{{url('send_email',$data->id)}}" class="btn btn-info">Send Email</a></td>

                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
            </div>
        </div>
            
      </div>
    </div>
    @include('admin.jss')
