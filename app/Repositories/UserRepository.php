<?php namespace App\Repositories;


use App\User;


/**
Repository for User Model
*/


class UserRepository extends Repository {



//method to get user info
 /**   
 *@string email
 */
    public function finByEmail($email){
        return User::where('email', $email)
            ->get();
    }


//method to udate user
 /**   
 *@User $user
 *@array $attributes
 */

    public function update(User $user, array $attributes) {
        User::where('id', $user->id)
            ->update($attributes);
        return User::find($user->id);
    }

  
//method to get all users


  public function allUsers() {
        return User::all();
  }

?>