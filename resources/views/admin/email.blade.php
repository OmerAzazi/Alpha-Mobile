
@include('admin.header')
<body>
  <div class="container-scroller">
    @include('admin.sidebar')
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
@include('admin.nav')
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
      <input type="text" name="body4" style="color:black" value="The Order will be delivered to you within 4 days , if you want to cancel your order just call us with 2 day maximum.">
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

@include('admin.footer')     