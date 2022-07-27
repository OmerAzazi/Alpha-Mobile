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
        <div style="text-align:center ; padding-top:60px">
            <h2>Show Product</h2><br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Dis Price</th>
                    <th scope="col">P Quantity</th>
                    <th scope="col">Product Catagory</th>
                    <th scope="col">P Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>



                  </tr>
                </thead>
                <tbody>
                    @foreach($data as $data)
                  <tr>
                    <td>{{$data->title}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->discount_price}}</td>
                    <td>{{$data->quantity}}</td>
                    <td>{{$data->catagory}}</td>
                    <td>
                        <img src="/product/{{$data->image}}">
                    </td>    
                    <td>
                        <a class="btn btn-success" href="{{url('update_product',$data->id)}}">Edit</a> 
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete this ?')" class="btn btn-danger" href="{{url('delete_product',$data->id)}}">Delete</a> 
                    </td>
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
