<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function index(){

        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('products.list',[
            'products' => $products
        ]);

        

    }

    public function create(){

        return view('products.create');
        
    }

    public function store(Request $request){
        $rules = [
            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
            'stu_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->route('products.create')->withInput()->withErrors($validator);
        }
    
        $product = new Product();
         
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->description = $request->description;
    
        if ($request->hasFile('stu_img')) {
            $imagePath = $request->file('stu_img')->store( 'public');
            $product->image = $imagePath;
        } 
    
        $product->save();
    
        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }
    
    public function edit(){
        
    }

    public function update(){
        
    }

    public function destory(){
        
    }
}
