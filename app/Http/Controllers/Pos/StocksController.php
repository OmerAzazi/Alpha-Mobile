<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Supplier;
use App\Models\Stocks;



class StocksController extends Controller
{
    public function AllStock(){
        $data = Auth::user();
        $stock = Stocks::paginate(10);
        return view('stock.allstock',compact('stock','data'));
    }
    public function DeleteStock($id){
        $item = Stocks::find($id);
        $item->delete();
        return redirect()->back();
    }
    public function AddStock(){
        $data = Auth::user();
        $supplier = Supplier::all();
        return view('stock.addstock',compact('data','supplier'));
    }
    public function Add_Stock(request $request){
        $stock = new Stocks();
        $stock->supplier_name=$request->sname;
        $stock->product_name=$request->pname;
        $stock->quantity=$request->quantity;
        $stock->price=$request->price;

        $stock->save();
        return redirect()->back()->with('message','Stocks Have Been Added Successfully');
    }
}
