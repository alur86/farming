<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Catalog;
use App\User;
use Carbon\Carbon;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  



    public function index(){
     
     $catalogs = Catalog::all();   
     $products = Product::orderBy('created_at')->paginate(5);
     return view('products.index')->with('products',$products)->with('catalogs',$catalogs);

    }


    public function show($id) {

    $product = Product::findOrFail($id);
    $catalogs = Catalog::all();  
    return view('products.show')->with('product', $product)->with('catalogs',$catalogs);

    }


      

    public function edit($id) {

    $product = Product::findOrFail($id);
    $catalogs = Catalog::all();  
    return view('products.edit')->with('product', $product)->with('catalogs',$catalogs);

    }

  
    public function add() {

 
    $catalogs = Catalog::all();  
    return view('products.add')->with('catalogs',$catalogs);

    }


      public function added(AddProductRequest $request) {

       $product = new Product;
       $product->category_id = intval($request->get('category_id'));
       $product->name=$request->get('name');
       $product->description=$request->get('description');
       $product->quantity=intval($request->get('quantity'));
       $product->created_at=Carbon::now(); 
       $product->save();
       
       return redirect()->route('products')->with('success','Product was added ok');
    


    }
 



      public function updated(EditProductRequest $request) {
       
       $product_id =intval($request->get('product_id'));
       $product = Product::where('id','=',$product_id)->first();
       $product->category_id = intval($request->get('category_id'));
       $product->name=$request->get('name');
       $product->description=$request->get('description');
       $product->quantity=intval($request->get('quantity'));
       $product->updated_at=Carbon::now(); 
       $product->save();

       
      return redirect()->route('products')->with('success','Product was edited ok');
    


    }
 
     





}
