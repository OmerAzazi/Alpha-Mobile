<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use Session;
use Stripe;
use Illuminate\Support\Str;
use Mail;
use App\Mail\PlaceOrderMailable;






class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cartN=cart::where('user_id','=',$id)->get()->count(); 
            $product=Product::paginate(3);
            return view('home.home',compact('product','cartN')); 
        }
        else{
            $product = product::paginate(3);
            return view('home.home',compact('product'));
        }
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype; // to get the usertype from database
        if($usertype=='Admin')
        {
            $data = Auth::user();
            return view('admin.home',compact('data'));
        }
        else{
            $id=Auth::user()->id;
            $cartN=cart::where('user_id','=',$id)->get()->count(); 
            $product = product::paginate(3);
            return view('home.home',compact('product','cartN'));
        }
    }
    public function allproduct()
    {
        if(Auth::id()){
            $id=Auth::user()->id;
            $cartN=cart::where('user_id','=',$id)->get()->count();
            $product=Product::paginate(6);
            return view('home.allproduct',compact('product','cartN'));
        }
        else{
            $product=Product::paginate(6);
            return view('home.allproduct',compact('product'));
        }
    }
    public function product_details($id)
    {
        if(Auth::id()){
            $idd=Auth::user()->id;
            $cartN=cart::where('user_id','=',$idd)->get()->count();
            $product=product::find($id);
            return view('home.productdetails',compact('product','cartN'));
        }
        else{
            $product=product::find($id);
            return view('home.productdetails',compact('product'));
        }
    }
    public function add_cart(Request $request,$id)
    {
        if(Auth::id()) //this one not important bz we alerady have condition on the add cart button
        {
            $user=Auth::user();
            $userid=$user->id;
            $product=product::find($id);
            $product_exist_id=cart::where('Product_id','=',$id)->where('user_id','=',$userid)->get('id')->first();
            if($product_exist_id!=null)
            {
                $cart=cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity=$quantity+$request->quantity;
                if($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price*$cart->quantity;
                }
                else{
                    $cart->price=$product->price*$cart->quantity;
                }
                $cart->save();
                return redirect()->back();

            }
            else{
            $cart = new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->product_title=$product->title;
            $cart->quantity=$request->quantity;
            if($product->discount_price!=null)
            {
                $cart->price=$product->discount_price*$request->quantity;
            }
            else{
                $cart->price=$product->price*$request->quantity;
            }
            $cart->image=$product->image;
            $cart->Product_id=$product->id;

            $cart->save();
            return redirect()->back();
            }

        }
        else{
            return redirect('login');
        }
    }
    public function show_cart()
    {
        if(Auth::id()){
            $id=Auth::user()->id;
            $cart=cart::where('user_id','=',$id)->get();
            $cartN=cart::where('user_id','=',$id)->get()->count();
            $user=Auth::user();

            return view('home.cart',compact('cart','user','cartN'));
        }
        else{
            return reirect('login');
        }
    }
    public function delete_item($id)
    {
        $data=cart::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function product_search(Request $request)
    {
        $id=Auth::user()->id;
        $cartN=cart::where('user_id','=',$id)->get()->count();
        $search_text=$request->search;
        $product=product::where('title','LIKE',"%$search_text%")->paginate(6);
        return view('home.allproduct',compact('product','cartN'));
    }
    public function Checkout($totalprice){
        $information = Auth::user();
        $id=Auth::user()->id;
        $cartN=cart::where('user_id','=',$id)->get()->count();
        return view('home.checkout',compact('totalprice','information','cartN'));
    }
    public function CashOnDelivery(request $request){

        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();

        $order = order::create([
            'user_id'=> $user->id,
            'tracking_no'=> 'Alpha-'.Str::random(10),
            'name'=> $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'pincode' => $request->pincode,
            'address' => $request->address,
            'payment_status' => 'COD',
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
    public function Order(){
        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
        $cartN=cart::where('user_id','=',$id)->get()->count(); 
        $orders = Order::where('user_id','=',$id)->get();
        return view('home.order',compact('cart','cartN','orders'));
    }
    public function OrderDetail($id){
        $idd=Auth::user()->id;
        $cart=cart::where('user_id','=',$idd)->get();
        $cartN=cart::where('user_id','=',$idd)->get()->count(); 
        $profile=Auth::user();
        $orders = Order::where('id','=',$id)->get();
        $orderdetail = OrderItems::where('order_id','=',$id)->get();

        return view('home.orderdetail',compact('cart','cartN','profile','orders','orderdetail'));
    }
}
