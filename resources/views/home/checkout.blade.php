@include('home.header')
<!doctype html>
<html lang="en">
<head>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<style>
    .checkout .form-control{
    border-radius: 0px !important;
}
.checkout .form-control:focus{
    border: 1px solid #000 !important;
    box-shadow: none !important;
}
.checkout .nav-link{
    border: 1px solid #000;
    border-radius: 0px;
    margin-bottom: 8px;
}
.checkout .tab-content{
    padding-right: 10px;
}
</style>
<body>

    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Checkout</h4>
            <hr>

            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 style="color: red">
                            Item Total Amount :
                            <span class="float-end">{{$totalprice}}$</span>
                        </h4>
                        <hr>
                        <small>* Items will be delivered in 3 - 5 days.</small>
                        <br/>
                        <small>* Tax and other charges are included </small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 style="color: red">
                            Basic Information
                        </h4>
                        <hr>

                        <form action="{{url('/CashOnDelivery')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name</label>
                                    <input type="text" value="{{$information->name}}" name="fullname" class="form-control" placeholder="Enter Full Name" READONLY />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number</label>
                                    <input type="number" value="{{$information->phone}}" name="phone" class="form-control" placeholder="Enter Phone Number" READONLY />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email Address</label>
                                    <input type="email" value="{{$information->email}}" name="email" class="form-control" placeholder="Enter Email Address" READONLY />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Pin-code (Zip-code)</label>
                                    <input type="number" name="pincode" class="form-control" min="10000" max="20000" placeholder="Enter Pin-code" required />
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Choose Your Location</label>
                                    <select style="color:black" required name="address" class="form-control">
                                        <option value="">Select Location</option>
                                        <option value="ar-Rusaifa">ar-Rusaifa</option>
                                        <option value="al-Quwaisima">al-Quwaisima</option>
                                        <option value="Wadi as-Sir">Wadi as-Sir</option>
                                        <option value="Tila al-Ali">Tila al-Ali</option>
                                      </select> 
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Select Payment Mode: </label>
                                    <div class="d-md-flex align-items-start">
                                        <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <button style="color: black" class="nav-link fw-bold" id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true">Cash on Delivery</button>
                                            <button style="color: black" class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false">Online Payment</button>
                                        </div>
                                        <div class="tab-content col-md-9" id="v-pills-tabContent">
                                            <div class="tab-pane fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                                <h6 >Cash on Delivery Mode</h6>
                                                <hr/>
                                                <input type="submit" class="btn btn-primary" value="Confirm Purchase"></button>

                                            </div>
                                            <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                                <h6>Online Payment Mode</h6>
                                                <hr/>
                                                <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger"> Purchase by VISA </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@include('home.footer')