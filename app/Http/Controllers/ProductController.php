<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all();
        return view('products.products',[
            'products' => $products
        ]);

    }

    public function store(Request $request){
        $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'quanity' => 'required'

        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->quanity = $request->quanity;
        $product->alert_stock = $request->alert_stock;
        $product->save();

        return back()->with('message','Product Save Successfully');
    }

    public function  update(Request $request){
        $product = Product::find($request->id);

        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->quanity = $request->quanity;
        $product->alert_stock = $request->alert_stock;
        $product->save();

        return back()->with('message','Product Save Successfully');
    }

    public function destroy($id){
        $product = Product::find($id);
        $product->delete();
        return back()->with('message','Product deleted successfully');
    }
}
