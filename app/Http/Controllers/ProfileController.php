<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use App\User;
use App\UserFavorite;



class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userPage($id){
        $user=User::find($id);
        $user["image"]="";
        $user["image"]=$this->getImageUrl($user);

        return view("profile.user")
        ->with("user",$user);
    }

    public function favoritesPage($id){
        $favorites=UserFavorite::where("user_id","=",$id)
        ->with("product")
        ->with("product.files")
        ->get();
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
            'gender'=> 'required|string|in:M,F',//['required', 'in:F,M'],
            'document_number' => ['nullable','string', 'max:14']
        ]);
    }

    protected function updateUser(Request $request,$id)
    {


        $extensionImage=""; $imageB64="";


        $this->validatorUserUpdate($request->all())->validate();
        $user=User::find($id);
        $user->name=$request['name'];
        $user->last_name=$request['last_name'];
        $user->document_number=$request['document_number'];
        $user->document_type=$request['document_type'];
        $user->gender=$request['gender'];
        $user->nationality=$request['nationality'];
        $user->phone_movil=$request['phone_movil'];
        $user->phone_fix=$request['phone_fix'];
        $user->save();

        if($request->image!="" && $request->image!=null){
            $imageB64=$request->image;
            $extensionImage=Str::substr($imageB64, 11,3);
            $imageB64=Str::after($imageB64, ',');
            $imageName = $id. '.'.$extensionImage;
          //  File::delete($filename);
            Storage::disk('public')->put("users/".$imageName, base64_decode($imageB64));
        }
        $user["image"]=$this->getImageUrl($user);
        return view("profile.user")
        ->with("user",$user);
    }

    protected function getImageUrl(User $user)
    {
        if(Storage::disk('public')->exists("users/".$user->id.".png")){
            return url("storage/"."users/".$user->id.".png")."?v=".Carbon::now()->format('YmdHs');;
        }
        if(Storage::disk('public')->exists("users/".$user->id.".jpg")) {
            return url("storage/"."users/".$user->id.".jpg")."?v=".Carbon::now()->format('YmdHs');;
        }
        return "";
    }


}
