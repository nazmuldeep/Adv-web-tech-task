<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{

    public function create(){
        return view('create');
    }

    public function createSubmit(Request $request){


        $this->validate(
            $request,
            [
                'name'=>'required|min:2|max:10',
                'price'=>'required',
                'quantity'=>'required'
               
            ],
            [
                'name.required'=>'Please put your name',
                'name.min'=>'Name must be greater than 4 charcters'
            ]
        );

        $var = new Product();
        $var->name = $request->name;
        $var->price = $request->price;
        $var->quantity = $request -> quantity;
        $var->save();
        return "Product Added";

    }
    
    public function list(){
        $products = Product::all();
        return view('pages.products.productlist')->with('products',$products);

       
    }

    public function edit(Request $request){
      
        $id = $request->id;
        //$student = Student::where('id',$id)->get(); //for multiple values : return array
        $product = Product::where('id',$id)->first();
        //$student = Student::where('id','>',$id)->first();//default operator =
        return $product;

    }

    public function allProduct(){
        $products = array('Watch','Shoe','Tv','Mobile','Gagets');

        return view('allProducts')->with('products',$products);
    }

    public function ourTerms(){
        return view('ourTerms');
    }

    public function aboutUs(){
        return view('aboutUs');
    }

    public function contactUsI(){
        $contact = "017665432";
        return view('contactus')->with('contact',$contact);
    }
}
