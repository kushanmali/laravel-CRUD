<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{
    public function index(){

        return view('products.list');

    }

    public function create(){

        return view('products.create');
        
    }

    public function store(Request $request){
        $rules = [

            'name' => 'required|min:5',
            'sku' => 'required|min:3',
            'price' => 'required|numeric',
            

        ];
        if($request->image!=""){
            $rules['image'] ='required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        }

     $validator =Validator::make($request->all(),$rules);

     if($validator->fails()){
         return redirect()->route('products.create')->withInput()->withErrors($validator);
     }

     $product =  new Product ();
     
     $product ->name = $request->name;
     $product ->sku = $request->sku;
     $product ->price = $request->price;
     $product ->description = $request->description;
     $product ->save();

     if($request->image!=""){

        $image = $request->image;
     $ext = $image->getClientOriginalExtension();
     $imageName = time().'.'.$ext;

     $image->move(public_path('images'),$imageName);
     


     $product ->image = $imageName;
     $product ->save();

     }    

     

    return redirect()->route('products.index')->with('success', 'product added successfully');
     
    
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destory(){
        
    }
}
