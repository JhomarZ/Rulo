<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\UserFavorites;
class ProfileController extends Controller
{
    //
    public function userPage($id){
        $user=User::find($id);

        return view("profile.user")
        ->with("user",$user);
    }

    public function favoritesPage($id){
        $favorites=UserFavorites::where("user_id","=",$id)
        ->with("product")->get();
        //->paginate(4);

       // return $favorites;
        return view("profile.favorites")
        ->with("favorites",$favorites);
    }

    protected function validatorUserUpdate(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['string', 'max:255'],
            'document_nro' => ['string', 'max:14']
        ]);
    }

    protected function updateUser(Request $request,$id)
    {
        $this->validatorUserUpdate($request->all())->validate();
        $user=User::find($id);
        $user->name=$request['name'];
        $user->last_name=$request['last_name'];
        $user->document_nro=$request['document_nro'];
        $user->document_type=$request['document_type'];
        $user->gender=$request['gender'];
        $user->nationality=$request['nationality'];
        $user->phone=$request['phone'];
        $user->cellphone=$request['cellphone'];
        $user->save();
        return view("profile.user")
        ->with("user",$user);
        /*
        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'document_nro' => $data['document_nro'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return view("profile.user"); */
    }

}
