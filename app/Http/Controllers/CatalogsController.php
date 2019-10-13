<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Catalog;
use App\User;
use Carbon\Carbon;
/**
Validation requests to the add and edit forms
*/
use App\Http\Requests\AddCatalogRequest;
use App\Http\Requests\EditCatalogRequest;



class CatalogsController extends Controller
{
    

    //get list of catalog
    public function index(){
     $catalogs = Catalog::orderBy('created_at')->active(true)->paginate(5); 
     return view('catalogs.index')->with('catalogs',$catalogs);

    }

 //method to get the show form of catalog
 /**   
 *@ingerer id
 */ 
    public function show($id) {
    $catalog = Catalog::findOrFail($id);
    return view('catalogs.show')->with('catalog',$catalog);

    }


    
//method to get add form of product 
 /**   
 *@ingerer id
 */
    public function edit($id) {
    $catalog = Catalog::findOrFail($id);
    return view('catalogs.edit')->with('catalog',$catalog);

    }

  
  //method to get add form of product  
    public function add() {
    return view('catalogs.add');
    
    }


 //method to add of the catalog
  /**
 *@string catalog_type
 *@string name
 *@ingerer active
 *@string description
 *
*/ 
    public function added(AddCatalogRequest $request) {

     $catalog = new Catalog;
     $catalog->catalog_type=$request->get('catalog_type');
     $catalog->name=$request->get('name');
     $catalog->active=$request->get('active');
     $catalog->description=$request->get('description');
     $catalog->created_at=Carbon::now(); 
     $catalog->save();

     return redirect()->route('catalogs')->with('success','Catalog was added ok');
    
    }
 

 //method to update of the catalog
  /**
 *@string catalog_type
 *@string name
 *@ingerer active
 *@string description
 *
*/ 
      public function updated(EditCatalogRequest $request) {
       
       $catalog_id =intval($request->get('catalog_id'));
       $catalog = Catalog::where('id','=',$catalog_id)->first();
       $catalog->catalog_type=$request->get('catalog_type');
       $catalog->name=$request->get('name');
       $catalog->active=$request->get('active');
       $catalog->description=$request->get('description');
       $catalog->updated_at=Carbon::now(); 
       $catalog->save();
 
      return redirect()->route('catalogs')->with('success','Catalog was edited ok');
    

    }
 


}
