
@include('admin.header')
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
@include('admin.nav')
@include('admin.body') 
@include('admin.footer')          