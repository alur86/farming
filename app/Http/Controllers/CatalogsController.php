<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Catalog;
use App\User;
use Carbon\Carbon;

use App\Http\Requests\AddCatalogRequest;
use App\Http\Requests\EditCatalogRequest;



class CatalogsController extends Controller
{
    
    public function index(){
     $catalogs = Catalog::orderBy('created_at')->paginate(5); 
     return view('catalogs.index')->with('catalogs',$catalogs);

    }


    public function show($id) {
    $catalog = Catalog::findOrFail($id);
    return view('catalogs.show')->with('catalog',$catalog);

    }


      

    public function edit($id) {
    $catalog = Catalog::findOrFail($id);
    return view('catalogs.edit')->with('catalog',$catalog);

    }

  
    public function add() {
    return view('catalogs.add');
    }


      public function added(AddCatalogRequest $request) {

       $catalog = new Catalog;
       $catalog->catalog_type=$request->get('catalog_type');
       $catalog->name=$request->get('name');
       $catalog->description=$request->get('description');
       $catalog->created_at=Carbon::now(); 
       $catalog->save();

       return redirect()->route('catalogs')->with('success','Catalog was added ok');
    


    }
 



      public function updated(EditCatalogRequest $request) {
       
       $catalog_id =intval($request->get('catalog_id'));
       $catalog = Catalog::where('id','=',$catalog_id)->first();
       $catalog->catalog_type=$request->get('catalog_type');
       $catalog->name=$request->get('name');
       $catalog->description=$request->get('description');
       $catalog->updated_at=Carbon::now(); 
       $catalog->save();
 
      return redirect()->route('catalogs')->with('success','Catalog was edited ok');
    

    }
 


}
