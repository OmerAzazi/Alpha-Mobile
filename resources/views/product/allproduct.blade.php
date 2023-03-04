
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
          <h2 style="font-size: 10px;text-align:left">All Product</h2><br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Dis-Price</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>




                  </tr>
                </thead>
                <tbody>
                    @forelse($products as $key => $item)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->supplier_name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->discount_price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td><img src="/product/{{$item->image}}"></td>

                    <td>
                        <a class="btn btn-success" href="{{url('Update_Product',$item->id)}}">Edit</a> &nbsp&nbsp
                        <a onclick="return confirm('Are you sure you want to delete this ?')" class="btn btn-danger" href="{{url('DeleteProduct',$item->id)}}">Delete</a> 
                    </td>
                    @empty
                    <td colspan="9">No Data Found</td>
                  </tr>
                  @endforelse 
                </tbody>
              </table>
              <br>
              <span>
                {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}
              </span> 
@include('admin.footer')   