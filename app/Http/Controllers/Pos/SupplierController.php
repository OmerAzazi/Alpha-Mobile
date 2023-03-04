<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Supplier;
use Illuminate\Support\Carbon;




class SupplierController extends Controller
{
    public function AllSupplier(){
        $data = Auth::user();
        $suppliers = Supplier::paginate(10);
        return view('supplier.allsupplier',compact('suppliers','data'));
    }
    public function DeleteSupplier($id){
        $item = Supplier::find($id);
        $item->delete();
        return redirect()->back();
    }
    public function AddSupplier(){
        $data = Auth::user();
        return view('supplier.addsupplier',compact('data'));
    }
    public function Add_Supplier(request $request){
        $suppliers = new Supplier();
        $suppliers->name=$request->name;
        $suppliers->mobile_no=$request->mobile;
        $suppliers->email=$request->email;
        $suppliers->address=$request->address;
        $suppliers->created_by=Auth::user()->id;
        $suppliers->updated_at=Carbon::now();

        $suppliers->save();
        return redirect()->back()->with('message','Supplier Have Been Added Successfully');
    }
}
