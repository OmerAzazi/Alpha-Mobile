
@include('admin.header')
<body>
  <div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
@include('admin.nav')
<div class="main-panel">
    <div class="content-wrapper">
        <div style="text-align:center ; padding-top:10px">
            <h2 style="font-size: 10px;text-align:left">All Customers</h2><br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Customer Image</th>
                    <th scope="col">U/Type</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                    @forelse($users as $key => $item)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->name}}</td>
                    <td>
                      @if ($item->profile_photo_path === null) 
                      -
                      @else 
                        <img class="img-xs rounded-circle" src="/storage/{{$data->profile_photo_path}}" alt="">
                      @endif
                    </td>
                    <td>{{$item->usertype}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->address}}</td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete this ?')" class="btn btn-danger" href="{{url('DeleteCustomer',$item->id)}}">Delete</a> 
                    </td>
                    @empty
                    <td colspan="6">No Data Found</td>
                  </tr>
                  @endforelse 
                </tbody>
              </table>
              <br>
              <span>
                {!!$users->withQueryString()->links('pagination::bootstrap-5')!!}
              </span> 
@include('admin.footer')   