<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;



class CustomerController extends Controller
{
    public function AllCustomer(){
        $data = Auth::user();
        $users = User::paginate(10);
        return view('customer.allcustomer',compact('users','data'));
    }

    public function DeleteCustomer($id){
        $item = User::find($id);
        $item->delete();
        return redirect()->back();
    }
}
