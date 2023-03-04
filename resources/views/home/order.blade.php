@include('home.header')
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             My <span>Order</span>
          </h2>
       </div>
       <table class="table">
         <thead>
           <tr>
             <th scope="col">#</th>
             <th scope="col">Order ID</th>
             <th scope="col">Tracking No</th>
             <th scope="col">Username</th>
             <th scope="col">Payment Mode</th>
             <th scope="col">Ordered Date</th>
             <th scope="col">Delivery Status</th>
             <th scope="col">Action</th>

           </tr>
         </thead>
         <tbody>
             @forelse($orders as $key => $item)
           <tr>
            @if($item->delivery_status === 'Pending Order' OR $item->delivery_status === 'Accepted/In Progress' )
             <td>{{$key+1}}</td>
             <td>{{$item->id}}</td>
             <td>{{$item->tracking_no}}</td>
             <td>{{$item->name}}</td>
             <td>{{$item->payment_status}}</td>
             <td>{{$item->created_at}}</td>
             <td>{{$item->delivery_status}}</td>
             <td>
                 <a class="btn btn-danger" href="{{url('OrderDetail',$item->id)}}">View</a> 
              </td>
            @endif  
             @empty
             <td colspan="8">No Order Found</td>
           </tr>
           @endforelse 
         </tbody>
       </table>      
    </div>
 </section>
@include('home.footer')