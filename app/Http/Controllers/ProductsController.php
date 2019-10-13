<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Catalog;
use App\User;
use Carbon\Carbon;
/**
Validation requests to the add and edit forms
*/
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;

class ProductsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

  


//method to get the products listing
    public function index(){
     
     $catalogs = Catalog::all();   
     $products = Product::orderBy('created_at')->paginate(5);

     return view('products.index')->with('products',$products)->with('catalogs',$catalogs);

    }

//method to get detailed info about product
/**   
 *@ingerer id
 */     
    public function show($id) {

    $product = Product::findOrFail($id);
    $catalogs = Catalog::all();

    return view('products.show')->with('product', $product)->with('catalogs',$catalogs);

    }


      
//method to get edit form of product
 /**   
 *@ingerer id
 */ 
    public function edit($id) {

    $product = Product::findOrFail($id);
    $catalogs = Catalog::all();  

    return view('products.edit')->with('product', $product)->with('catalogs',$catalogs);

    }



//method to get add form of product  
    public function add() {
 
    $catalogs = Catalog::all();  

    return view('products.add')->with('catalogs',$catalogs);

    }


//method to add the product
/**
 *@ingerer category_id
 *@string name
 *@string description
 *@integer quantity
 *
*/
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
 


 //method to update of the product
  /**
 *@ingerer product_id
 *@ingerer category_id
 *@string name
 *@string description
 *@integer quantity
 *
*/  

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
