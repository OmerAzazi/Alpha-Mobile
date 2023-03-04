<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\product;
use App\Models\Order;
use Notification;
use App\Notifications\SendEmailNotification;





class AdminController extends Controller
{

    public function delivered($id)
    {
        //this one to updte just one use it in quantity :D
        $order=order::find($id);
        $order->delivery_status="Delivered";
        $order->save();
        return redirect()->back();
    }
    public function send_email($id)
    {
        $data = Auth::user();
        $order=order::find($id);
            return view('admin.email',compact('data','order'));
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
    public function dashboard(){
        $data = Auth::user();
        return view('admin.home',compact('data'));
    }
}

