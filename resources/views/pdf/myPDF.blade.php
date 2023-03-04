<!DOCTYPE html>
<html>
<head>
    <title>AlphaMobile - Invoice</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    body {
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    text-align: center;
    color: #777;
}

body h1 {
    font-weight: 300;
    margin-bottom: 0px;
    padding-bottom: 0px;
    color: #000;
}

body h3 {
    font-weight: 300;
    margin-top: 10px;
    margin-bottom: 20px;
    font-style: italic;
    color: #555;
}

body a {
    color: #06f;
}

.invoice-box {
    max-width: 800px;
    margin: auto;
    padding: 30px;
    border: 1px solid #eee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    font-size: 16px;
    line-height: 24px;
    font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color: #555;
}

.invoice-box table {
    width: 100%;
    line-height: inherit;
    text-align: left;
    border-collapse: collapse;
}

.invoice-box table td {
    padding: 5px;
    vertical-align: top;
}

.invoice-box table tr td:nth-child(2) {
    text-align: right;
}

.invoice-box table tr.top table td {
    padding-bottom: 20px;
}

.invoice-box table tr.top table td.title {
    font-size: 45px;
    line-height: 45px;
    color: #333;
}

.invoice-box table tr.information table td {
    padding-bottom: 40px;
}

.invoice-box table tr.heading td {
    background: #eee;
    border-bottom: 1px solid #ddd;
    font-weight: bold;
}

.invoice-box table tr.details td {
    padding-bottom: 20px;
}

.invoice-box table tr.item td {
    border-bottom: 1px solid #eee;
}

.invoice-box table tr.item.last td {
    border-bottom: none;
}

.invoice-box table tr.total td:nth-child(2) {
    border-top: 2px solid #eee;
    font-weight: bold;
}

@media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td {
        width: 100%;
        display: block;
        text-align: center;
    }

    .invoice-box table tr.information table td {
        width: 100%;
        display: block;
        text-align: center;
    }
}
</style>
<body>
    <span style="float: left;font-weight:bold;font-size:20px">{{ $title }}</span>
    <span style="float: right">PDF Created at : {{ $date }}</span><br><br><br><br><br>
    <p style="text-align: center;font-size:20px">Order Detail</p>
  
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title" style="color: black">
                                Alpha Mobile
                            </td>

                            <td style="color: black">
                                @foreach ($orders as $item)
                                Invoice No: [{{$item->id}}]
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td style="color: black">
                                @foreach ($orders as $item)
                                To : {{$item->name}}<br />
                                Email ID : {{$item->email}}<br />
                                Phone : {{$item->phone}}<br />
                                Address : {{$item->address}}<br />
                                Pin Code : {{$item->pincode}}
                                @endforeach
                            </td>

                            <td style="color: black">
                                @foreach ($orders as $item)
                                Tracking ID/No : {{$item->tracking_no}}<br />
                                Date Of Invoice : {{$item->created_at}}<br />
                                Payment Mode : {{$item->payment_status	}}<br />
                                Order Status : {{$item->delivery_status	}}
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Product Item</td>

                <td>Price</td>
            </tr>
            <?php $totalprice=0; ?>
            @foreach ($orderdetail as $item)

            <tr class="item">
                <td style="color: black" >{{$item->product_title}} x [{{$item->quantity}}]</td>

                <td style="color: black">{{$item->price}}$</td>
            </tr>
            <?php $totalprice=$totalprice + $item->price ?>
            @endforeach


            <tr class="total">
                <td></td>

                <td style="color: black">Total: {{$totalprice}}$</td>
            </tr>
        </table>
    </div>
  
</body>
</html>