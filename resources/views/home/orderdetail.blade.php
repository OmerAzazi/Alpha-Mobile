@include('home.header')
<style>
    body{margin-top:20px;
background-color: #f7f7ff;
}
#invoice {
    padding: 0px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #0d6efd
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #0d6efd
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,
.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #0d6efd;
    font-size: 1.2em
}

.invoice table .qty,
.invoice table .total,
.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #0d6efd
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #0d6efd;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0px solid rgba(0, 0, 0, 0);
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}

.invoice table tfoot tr:last-child td {
    color: #0d6efd;
    font-size: 1.4em;
    border-top: 1px solid #0d6efd
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px !important;
        overflow: hidden !important
    }
    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }
    .invoice>div:last-child {
        page-break-before: always
    }
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #0d6efd;
    background: #e7f2ff;
    padding: 10px;
}
</style>
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Order <span>Detail</span>
          </h2>
       </div>
       <div class="container">
        <div class="card">
            <div class="card-body">
                <div id="invoice">
                    <div class="toolbar hidden-print">
                        <div class="text-end">
                        </div>
                        <hr>
                    </div>
                    <div class="invoice overflow-auto">
                        <div style="min-width: 600px">
                            <header>
                                <div class="row">
                                    <div class="col">
                                        <a href="javascript:;">
                                                        <img src="assets/images/logo-icon.png" width="80" alt="">
                                                    </a>
                                    </div>
                                    <div class="col company-details">
                                        <h2 class="name" style="color:#8B0000">
                                        Alpha Mobile
                                        </a>
                                        </h2>
                                        <div>Al Jubayhah, Jo</div>
                                        <div>(123) 987 654 3210</div>
                                        <div>alphamobile290@gmail.com</div>
                                    </div>
                                </div>
                            </header>
                            <main>
                                <div class="row contacts">
                                    <div class="col invoice-to">
                                        <div class="text-gray-light">INVOICE TO:</div>
                                        <h2 class="to">{{$profile->name}}</h2>
                                        <div class="email">Email Id : {{$profile->email}}</a></div>
                                        <div class="email">Phone : {{$profile->phone}}</a></div>
                                        @foreach($orders as $item) 
                                        <div class="address">Address : {{$item->address}}</div>
                                        <div class="email">Pin Code : {{$item->pincode}}</a></div>
                                        @endforeach   
 
                                    </div>
                                    <div class="col invoice-details">
                                        @foreach($orders as $item)
                                        <h1 class="invoice-id" style="color:#8B0000">INVOICE [{{$item->id}}]</h1>
                                        <div class="date">Tracking Id/No : {{$item->tracking_no}}</div>
                                        <div class="date">Date of Invoice : {{$item->created_at}}</div>
                                        <div class="date">Payment Mode : {{$item->payment_status}}</div>
                                        <div class="date">Order Status : {{$item->delivery_status}}</div>

                                        @endforeach   
                                    </div>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Item Id</th>
                                            <th class="text-left" >Product Name</th>
                                            <th style="text-align: center">Image</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $totalprice=0; ?>
                                        @foreach($orderdetail as $item)
                                        <tr>
                                            <td class="no" style="background-color: #8B0000">{{$item->id}}</td>
                                            <td class="text-left">
                                                <h3 style="color: #8B0000">
                                                    {{$item->product_title}}

                                                </h3>
                                            </td>

                                            <td class="unit" style="text-align: center">-</td>
                                            <td class="qty">{{$item->quantity}}</td>
                                            <td class="total" style="background-color: #8B0000">{{$item->price}}$</td>
                                        </tr>
                                        <?php $totalprice=$totalprice + $item->price ?>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">SUBTOTAL</td>
                                            <td>{{$totalprice}}$</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2">Devlivery Charge</td>
                                            <td>Free</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td colspan="2" style="color:#8B0000">GRAND TOTAL</td>
                                            <td style="color:#8B0000">{{$totalprice}}$</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </main>
                            <footer>Invoice detail of your order.</footer>
                        </div>
                        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
 </section>
@include('home.footer')