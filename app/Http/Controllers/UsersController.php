<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use View;
use Carbon\Carbon;


class UsersController extends Controller
{
    
  public function __construct()
    {
        $this->middleware('admin');
    }



//method to get detailed info about product
/**   
 *@ingerer id
 */
 
 public function index() {
 	    
 $users = User::allUsers();

 return view('users.index')->with('users',$users);
        
    
 }
 

//method to get detailed info about user
/**   
 *@ingerer id
 */
  public function show($id) {

  $user = User::findOrFail($id); 

  return view('users.index')->with('user',$user);

 }


//method to get edit form of user
 /**   
 *@ingerer id
 */ 
   public function edit($id) {

   $user = User::findOrFail($id); 

   return view('users.show')->with('user',$user);

  }

//method to update of user
 /**  
 *Request request 
 *@ingerer id
 */ 

  public function update(Request $request, $id) {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'is_admin' => 'required',
        ]);
         

  $data = ['name' => $request->name, 'email' => $request->email, 'password'=>Hash::make($request->password) , 'updated_at'=>Carbon::now(), 'is_admin' => $request->is_admin ];)

   User::updateUser($id,$data);


   return redirect('users');->with('success','User updated successfully');

   }  


//method to delete of user
 /**   
 *@ingerer id
 */ 

   public function destroy($id) {

   User::deleteUser($id);
   
   return redirect('users');->with('success','User deleted successfully');

    }






}

