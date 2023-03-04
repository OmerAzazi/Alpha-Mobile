<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Carbon;

class ProductController extends Controller
{
    public function AddProduct(){
        $suppliers = Supplier::All();
        $data = Auth::user();
        return view('product.addproduct',compact('suppliers','data'));
    }
    public function Add_Product(request $request){
        $products = new Product();
        $products->title=$request->title;
        $products->supplier_name=$request->supplier;
        $products->description=$request->description;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension(); //its standers 
        $request->image->move('product',$imagename); //product is the name of the file that the image will save in it 
        $products->image=$imagename; //take the picture from the folder and save it in the database

        $products->quantity=$request->quantity;
        $products->price=$request->price;
        $products->discount_price=$request->dis_price;

        $products->save();
        return redirect()->back()->with('message','Product Have Been Added Successfully');
    }
    public function AllProduct(){
        $products = Product::paginate(10);
        $data = Auth::user();
        return view('product.allproduct',compact('products','data'));
    }
    public function DeleteProduct($id){
        $products = Product::find($id);
        $products->delete();
        return redirect()->back();
    }
    public function Update_Product($id){
        $products = Product::find($id);
        $suppliers = Supplier::all();
        $data = Auth::user();
        return view('product.updateproduct',compact('products','suppliers','data'));
    }
    public function UpdateProduct(request $request ,$id){
        $products = Product::find($id);
        $products->title=$request->title;
        $products->supplier_name=$request->supplier;
        $products->description=$request->description;

        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension(); //its standers 
        $request->image->move('product',$imagename); //product is the name of the file that the image will save in it 
        $products->image=$imagename; //take the picture from the folder and save it in the database
        }

        $products->quantity=$request->quantity;
        $products->price=$request->price;
        $products->discount_price=$request->dis_price;

        $products->save();
        return redirect()->back()->with('message','Product Have Been Updated Successfully');
    }

}
