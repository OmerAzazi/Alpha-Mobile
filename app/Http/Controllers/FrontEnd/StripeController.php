<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\product;
use Session;
use Stripe;
use Illuminate\Support\Str;
use Mail;
use App\Mail\PlaceOrderMailable;


class StripeController extends Controller
{
    public function stripe($totalprice)
    {
        $id=Auth::user()->id;
        $cartN=cart::where('user_id','=',$id)->get()->count();
        return view('home.stripe',compact('totalprice','cartN'));
    }
    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Purchase." 
        ]);
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();

        $order = order::create([
            'user_id'=> $user->id,
            'tracking_no'=> 'Alpha-'.Str::random(10),
            'name'=> $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'pincode' => $request->pincode,
            'address' => $request->address,
            'payment_status' => 'VISA',
            'delivery_status' => 'Pending Order',
        ]);

        $carts = cart::where('user_id', auth()->user()->id)->get();
        foreach ($carts as $cartitem) {
            $orderitems = OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $cartitem->Product_id,
                'product_title' => $cartitem->product_title,
                'quantity' => $cartitem->quantity,
                'price' => $cartitem->price,
            ]);
        $cartitem=product::where('id',$cartitem->Product_id)->decrement('quantity',$cartitem->quantity);
        }

        //now to delete item after order Confirm
        cart::where('user_id', auth()->user()->id)->delete();

        try{
            //Mail Sent Successfully 
            $orderinfo = Order::findOrFail($order->id);
            Mail::to("$orderinfo->email")->send(new PlaceOrderMailable($orderinfo));

        }catch(\Exception $e){
            //Something Went Wrong
        }


        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        $cartN=cart::where('user_id','=',$id)->get()->count(); 
        return view('home.thankyou',compact('cart','cartN'));
    }
}
