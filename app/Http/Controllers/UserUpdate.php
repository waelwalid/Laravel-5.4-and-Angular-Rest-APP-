<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\User;

class UserUpdate extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = DB::table('users')->find(\Auth::user()->id);
        @$user->hobbies = json_decode(@$user->hobbies,true);
        /*echo "<pre>";
            print_r($user);
        echo "</pre>";
        */
        return view('user.userUpdate',compact('user'));
    }

    public function updateUserData(request $request){
        $user = \Auth::user();

       
        $FormData = array( // Set Inputs for validation proccess
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'string|min:6|confirmed',
            'gender' => 'required|numeric|in:0,1|max:1' ,
            'hobbies.*' => 'in:1,2,3|max:255',
            'photo' => 'image|mimes:jpeg,bmp,png|size:2000'
        );
        if($request->email == $user->email){ // check if there is new E-mail
            unset($FormData['email']);
        }
        if(!isset($request->password)){  // check password value
            unset($FormData['password']);   // remove email validation if not set
        }
        $this->validate($request, $FormData); // excute validation proccess

        $user->name = $request->name;  // update user name
        $user->email = $request->email; // update user email

        if ( ! $request->password == '')
        {
            $user->password = bcrypt($request->password);  // update user password if exist
        }

        if(isset($request->hobbies)){
            $user->hobbies = json_encode($request->hobbies) ; // convert to json
        }

        if(! $request->image == ''){
            $user->image = $request->image->store('public/user_image');
        }
        $user->gender = $request->gender ;
        $user->save();
        return redirect('profile')->with('status', 'Your account has been updated!');

    }

    public function close(request $request){
        $user = \Auth::user();
        $FormData = array( // Set Inputs for validation proccess
            'close_reason' => 'required|string'
        );

        $this->validate($request, $FormData);
        $user->closed = 1 ;
        $user->close_reason = $request->close_reason ;
        $user->save();
        \Auth::logout();
        return redirect('/')->with('close_status', 'Your account has been Closed !');
    }
}
