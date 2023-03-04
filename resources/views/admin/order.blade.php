
@include('admin.header')
<body>
  <div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
@include('admin.nav')
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
            @foreach($order as $data)
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

@include('admin.footer')     