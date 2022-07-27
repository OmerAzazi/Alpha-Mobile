<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $id=Auth::user()->id;
            $cartN=cart::where('user_id','=',$id)->get()->count(); 
            $data=Product::paginate(3);
            return view('home.userpage',compact('data','cartN')); 
        }
        else{
            $data=Product::paginate(3);
            return view('home.userpage',compact('data'));
        }
    }
    public function redirect()
    {
        $usertype = Auth::user()->usertype;

        if($usertype=='1')
        {
            $total_product=product::all()->count();//to get how many data 
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $total_processing=order::where('delivery_status','=','Processing')->get()->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_processing'));
        }
        else
        {
            $id=Auth::user()->id;
            $cartN=cart::where('user_id','=',$id)->get()->count();
            $data=Product::paginate(3);
            return view('home.userpage',compact('data','cartN'));
        }
    }
    public function product_details($id){
    if(Auth::id()){
        $idd=Auth::user()->id;
        $cartN=cart::where('user_id','=',$idd)->get()->count();
        $product=product::find($id);
        return view('home.product_details',compact('product','cartN'));
    }
    else{
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }
}

    
    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
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

            return view('home.showcart',compact('cart','user','cartN'));
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
    public function cash_order()
    {
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();

        //now to insert multiple data in data-base
        
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;
            $order->payment_status='COD';
            $order->delivery_status='Processing';
            $order->save();

            //now to delete item afer pay

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();


        }
        return redirect()->back()->with('message', 'Payment successful! We will sent you detail order email within a short period');



    }
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
                "description" => "Thanks for payment." 
        ]);
        $user=Auth::user();
        $userid=$user->id;
        $data=cart::where('user_id','=',$userid)->get();

        //now to insert multiple data in data-base
        
        foreach($data as $data)
        {
            $order=new order;
            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->Product_id;
            $order->payment_status='Paid';
            $order->delivery_status='Processing';
            $order->save();

            //now to delete item afer pay

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();


        }
      
        Session::flash('success', 'Payment successful! We will sent you detail order email within a short period');
        $id=Auth::user()->id;
        $cartN=cart::where('user_id','=',$id)->get()->count();
              
        return view('home.stripe',compact('totalprice','cartN'));
    }
    public function profile()
    {
        return view('profile.show');
    }
    public function allproduct(){
    if(Auth::id()){
        $id=Auth::user()->id;
        $cartN=cart::where('user_id','=',$id)->get()->count();
        $data=Product::paginate(9);
        return view('home.allproduct',compact('data','cartN'));
    }
    else{
        $data=Product::paginate(9);
        return view('home.allproduct',compact('data'));
    }
}

    public function product_search(Request $request)
    {
        $id=Auth::user()->id;
        $cartN=cart::where('user_id','=',$id)->get()->count();
        $search_text=$request->search;
        $data=product::where('title','LIKE',"%$search_text%")->paginate(10);
        return view('home.allproduct',compact('data','cartN'));
    }


}
