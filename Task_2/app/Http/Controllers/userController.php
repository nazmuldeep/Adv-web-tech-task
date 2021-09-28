<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function login(){
        return view('/pages/user/login');
    }

    public function registration(){
        return view('/pages/user/registration');
    }

    public function register(Request $request){

        $this->validate(
            $request,
            [
                'name'=>'required|min:2|max:10',
                'email'=>'required|email',
                'password'=>'required|min:4|max:10'
               
            ],
            [
                'name.required'=>'Please put your name'
               
            ]
        );

        $var = new User();
        $var->name = $request->name;
        $var->email = $request->email;
        $var->password = $request -> password;
        $var->save();
        return "User Added";

    }


    public function checkUser(Request $request){

        $user = array(
            array('name'=>'ahanab','password'=>'1234567'),
            array('name'=>'Tanvir','password'=>'11223344')
        );

        $this->validate(
            $request,
            [
                'name'=>'required|min:2|max:10',
                'password'=>'required|min:4|max:10'
               
            ],
            [
                'name.required'=>'Please put your name'
               
            ]
        );

       
        foreach($user as $u){
            if(strcmp($request->name,$u['name']) && strcmp($request->password,$u['password'])){
                return "Login Successfull.";
            }
        }

        return "Invalid User";

    }
}
