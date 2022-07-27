<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Notification;
use App\Notifications\SendEmailNotification;




class AdminController extends Controller
{
    public function view_catagory()
    {
        return view('admin.catagory');
    }
    public function add_catagory(Request $request)
    {
        $data=new catagory;
        $data->catagory_name=$request->catagory;
        $data->save();

        return redirect()->back()->with('message', 'Catagory has been added successfully');
    }
    public function show_catagory()
    {
        $data=catagory::all();
        return view('admin.show',compact('data'));
    }
    public function delete_catagory($id)
    {
        $data=catagory::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function view_product()
    {
        $data=catagory::all();
        return view('admin.product',compact('data'));
    }
    public function add_product(Request $request)
    {
        $product=new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->dis_price;
        $product->catagory=$request->catagory;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product has been added successfully');

    }
    public function show_product()
    {
        $data=product::all();
        return view('admin.showp',compact('data'));
    }
    public function delete_product($id)
    {
        $data=product::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function update_product($id)
    {
        $data=catagory::all();
        $product=product::find($id);
        return view('admin.update',compact('data','product'));   
    }
    public function edit_product(Request $request,$id)
    {
        $product=product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount_price=$request->dis_price;
        $product->catagory=$request->catagory;

        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product has been Edit successfully'); 
    }
    public function order()
    {
        $data=order::all();
        return view('admin.order',compact('data'));
    }
    public function delivered($id)
    {
        //this one to updte just one use it in quantity :D
        $order=order::find($id);
        $order->delivery_status="Delivered";
        $order->save();
        return redirect()->back();
    }
    public function searchdata(Request $request)
    {
        $searchText=$request->search;
        $data=order::where('name','LIKE',"%$searchText%")->orwhere('phone','LIKE',"%$searchText%")->get();
        return view('admin.order',compact('data'));
    }
    public function dashbored()
    {
            $total_product=product::all()->count();//to get how many data 
            $total_order=order::all()->count();
            $total_user=user::all()->count();
            $total_processing=order::where('delivery_status','=','Processing')->get()->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_processing'));
    }
    public function send_email($id)
    {
        $order=order::find($id);
            return view('admin.email_info',compact('order'));
    }
    public function send_user_email(Request $request, $id)
    {
        $order=order::find($id);
        $details = [
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'body2'=>$request->body2,
            'body3'=>$request->body3,
            'body4'=>$request->body4,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,
        ];
        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back();
    }
}
