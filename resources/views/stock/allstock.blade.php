
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
        <h2 style="font-size: 10px;text-align:left">All Stock</h2><br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Stock Invoice ID</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Invoice Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($stock as $item)
                  <tr>
                    <th>{{$item->id}}</th>
                    <td>{{$item->supplier_name}}</td>
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete this ?')" class="btn btn-danger" href="{{url('DeleteStock',$item->id)}}">Delete</a> 
                    </td>
                    @empty
                    <td colspan="7">No Stocks Found</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              <br>
              <span>
                {!!$stock->withQueryString()->links('pagination::bootstrap-5')!!}
              </span> 
@include('admin.footer')   