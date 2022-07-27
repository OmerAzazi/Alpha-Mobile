<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alpha Mobile Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
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
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 style="text-align: center; font-size: 20px">Send Email to {{$order->email}}</h1><br>
            <form action="{{url('send_user_email',$order->id)}}" method="POST">  
              @csrf  
            <div style="text-align: left">
            <label>Email Greeting : </label>
            <input type="text" name="greeting" style="color:black" value="Hello From Alpha Mobile">
            </div><br>
            <div style="text-align: left">
                <label>Email FirstLine : </label>
                <input type="text" name="firstline" style="color:black" value="Thank you for your purchase!"> 
            </div><br>
            <div style="text-align: left">
                <label>Email Body :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>
                <input type="text" name="body" style="color:black" value="I just want to personally thank you for choosing our local business, we really appreciate it and we hope you'll be satisfied with your order.
                Your order details :">
            </div><br>
            <div style="text-align: left">
              <label>Email Order :&nbsp&nbsp&nbsp&nbsp&nbsp </label>
              <input type="text" name="body2" style="color:black">
          </div><br>
          <div style="text-align: left">
            <label>Email Total :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>
            <input type="text" name="body3" style="color:black" value="Your Total : $">
        </div><br>
        <div style="text-align: left">
          <label>Email Last :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </label>
          <input type="text" name="body4" style="color:black" value="The Order will be delivered to you within 4 days , is you want to cancel your order just call us with 2 day maximum.">
      </div><br>
            <div style="text-align: left">
                <label>Email Button :&nbsp&nbsp&nbsp </label>
                <input type="text" name="button" style="color:black" value="Purchase More?">
            </div><br>
            <div style="text-align: left">
                <label>Email URL : &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
                <input type="text" name="url" style="color:black" value="http://127.0.0.1:8000/"> 
            </div><br>
            <div style="text-align: left">
                <label>Email LastLine : </label>
                <input type="text" name="lastline" style="color:black" value="Sincerely , Alpha Mobile +984 438 58322">
            </div><br>
            <div style="text-align: left">
                <input type="submit" value="Send Email" class="btn btn-primary">
            </div><br>
            </form>
            </div>
        </div>

        <!-- partial -->
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>