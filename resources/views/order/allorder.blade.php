
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
          <h2 style="font-size: 10px;text-align:left">All Order</h2><br>



            <form action="{{url('Filter')}}" method="GET">
              @csrf
              <div class="row">
                <div class="col-md-3">
                  <label>Filter By Status</label>
                  <select name="status" id="" class="form-select">
                    <option value="">Select Status</option>
                    <option value="Accepted/In Progress">Accepted/In Progress</option>
                    <option value="Pending">Pending</option>
                    <option value="Deliverd">Deliverd</option>
                    <option value="Cancelled">Cancelled</option>
                  </select>
                </div>
                <div class="col-md-6" style="text-align:left;padding-top:8px">
                  <br>
                  <button style="  padding: 10px 10px 10px 10px;" type="submit" class="btn btn-primary">Filter</button>
                </div>
              </div>
            </form><br>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Tracking_No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Payment Mode</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse($order as $item)
                  <tr>
                    <th>{{$item->id}}</th>
                    <td>{{$item->tracking_no}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->payment_status}}</td>
                    <td>{{$item->created_at}}</td>
                    @if($item->delivery_status === 'Cancelled')
                    <td style="color: red">{{$item->delivery_status}}</td>
                    @elseif($item->delivery_status === 'Deliverd')
                    <td style="color: Green">{{$item->delivery_status}}</td>
                    @elseif($item->delivery_status === 'Pending Order')
                    <td style="color: orange">{{$item->delivery_status}}</td>
                    @elseif($item->delivery_status === 'Accepted/In Progress')
                    <td style="color: Tan">{{$item->delivery_status}}</td>
                    @else 
                    <td>{{$item->delivery_status}}</td>
                    @endif
                    <td>
                        <a class="btn btn-danger" href="{{url('OrderDetails',$item->id)}}">View</a>
                        <a class="btn btn-primary" href="{{url('UpdateStatus',$item->id)}}">Update Status</a>  
                    </td>
                    @empty
                    <td colspan="7">No Order Found</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
              <br>
              <span>
                {!!$order->withQueryString()->links('pagination::bootstrap-5')!!}
              </span> 
@include('admin.footer')   