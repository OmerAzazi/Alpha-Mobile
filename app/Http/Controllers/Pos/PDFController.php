<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Support\Carbon;
use App\Models\User;
use PDF;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $data = Auth::user();
        $profile=Auth::user();
        $orders = Order::where('id','=',$id)->get();
        $orderdetail = OrderItems::where('order_id','=',$id)->get();
  
        $invoice = [
            'title' => 'AlphaMobile Invoice',
            'date' => date('m/d/Y'),
        ]; 
            
        $pdf = PDF::loadView('pdf.myPDF', $invoice ,compact('data','profile','orders','orderdetail'));
     
        return $pdf->download('AlphaMobile.pdf');
    }
}
