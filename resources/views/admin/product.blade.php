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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                     {{session()->get('message')}}
                </div>
                @endif
                <div style="text-align:center ; padding-top:40px">
                <h2>Add Product</h2><br>
                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Product Name :</label>
                        <div class="col-sm-10">
                          <input type="text" name="title" style="color: black" placeholder="Write Product Name" class="form-control" required><br>
                       </div>
                      </div>
                      <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Product Desc :</label>
                        <div class="col-sm-10">
                          <textarea name="description" style="color: black" class="form-control" required></textarea>
                        </div>
                      </div>
                      <div class="row mb-3">
                          <label for="" class="col-sm-2 col-form-label">Product Price :</label>
                          <div class="col-sm-10">
                              <input type="number" style="color: black" name="price" placeholder="Write Product Price" required class="form-control"><br>
                          </div>
                        </div> <div class="row mb-3">
                          <label for="" class="col-sm-2 col-form-label">Discount Price :</label>
                          <div class="col-sm-10">
                              <input type="number" style="color: black" name="dis_price" placeholder="Write Discount Price" class="form-control"><br>
                          </div>
                        </div> <div class="row mb-3">
                          <label for="" class="col-sm-2 col-form-label">Product Quantity :</label>
                          <div class="col-sm-10">
                              <input type="number" style="color: black" min="0" name="quantity" class="form-control" placeholder="Write Product Quantity"><br>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="" class="col-sm-2 col-form-label">Product Catagory :</label>
                          <div class="col-sm-10">
                              <select required name="catagory" class="form-control">
                                  @foreach($data as $data)
                                  <option value="{{$data->catagory_name}}">{{$data->catagory_name}}</option>
                                  @endforeach
                              </select><br>
                          </div>
                        </div>
                    </div>
                     <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Product Image :</label>
                        <div class="col-sm-10">
                            <input type="file" name="image" required><br>
                        </div>
                      </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Add Product">
                </form>
                </div>
            </div>
        </div>

            
      </div>
    </div>
    @include('admin.jss')