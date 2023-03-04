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

class OrderController extends Controller
{
    public function AllOrder(){
        $order = Order::orderby('created_at','DESC')->paginate(10);
        $data = Auth::user();
        return view('order.allorder',compact('order','data'));
    }
    public function OrderDetails($id){
        $data = Auth::user();
        $profile=Auth::user();
        $orders = Order::where('id','=',$id)->get();
        $orderdetail = OrderItems::where('order_id','=',$id)->get();

        return view('order.orderdetail',compact('data','profile','orders','orderdetail'));
    }
    public function Filter(request $request){
        $data = Auth::user();
        $statusfilter = $request->status;
        $order=Order::where('delivery_status','LIKE',"%$statusfilter%")->orderby('created_at','DESC')->paginate(10);
        return view('order.allorder',compact('order','data'));
    }
    public function UpdateStatus($id){
        $order = Order::find($id);
        $data = Auth::user();
        return view('order.updateorder',compact('order','data'));

    }
    public function Update_Status(request $request,$id){
        $data = Auth::user();

        $order = Order::find($id);
        $order->delivery_status=$request->status;
        $order->save();
        return redirect()->back()->with('message','Order Have Been Updated Successfully');

    }
}
