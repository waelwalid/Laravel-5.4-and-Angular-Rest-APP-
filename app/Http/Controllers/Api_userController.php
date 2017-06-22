<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use App\User;
use App\Mail\EmailVerification;
use Mail;

class Api_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $users = User::get();
            return response()->json(["msg" => compact('users'), "code" => 200],200);
        }
        catch(Exception $e)
        {
            return response()->json([$e->getMessage() ,"code" => 422] , 422);
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails())
        {
            return response()->json([$validator->messages(),"code" => 400], 400 );
        }
        // Using database transactions is useful here because stuff happening is actually a transaction
        // I don't know what I said in the last line! Weird!
        DB::beginTransaction();
        try
        {
            $user = $this->create($request->all());
            //After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));

            Mail::to($user->email)->send($email);

            DB::commit();
            return response()->json(['msg' => "Your account has been created!" ,"code" => 200],200);
        }
        catch(Exception $e)
        {
            DB::rollback();
            return response()->json(['msg' => $e->getMessage() ,"code" => 422 ] , 422);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(! $user = User::find($id)){
            return response()->json(['msg' => "User is not exist !!", "code" => 404],404);
        }
        return response()->json(["msg" => compact('user') , "code" => 200],200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $FormData = [ // Set Inputs for validation proccess
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'string|min:6',
            'gender' => 'required|numeric|in:0,1|max:1'
        ];

        try
        {
            $user = User::find($id);

            if($request->email == $user->email){ // check if there is new E-mail
                unset($FormData['email']);
            }
            if(!isset($request->password)){  // check password value
                unset($FormData['password']);   // remove email validation if not set
            }

            $validator = Validator::make($request->all(),$FormData);

            if ($validator->fails())
            {
                return response()->json([$validator->messages() , "code" => 400], 400 );
            }

            $user->name = $request->name;  // update user name
            $user->email = $request->email; // update user email

            if ( ! $request->password == '')
            {
                $user->password = bcrypt($request->password);  // update user password if exist
            }
            $user->gender = $request->gender ;
            $user->save();

            return response()->json(["msg" => "Account has been updated!" , "code" => 200],200);
        }
        catch(Exception $e)
        {
            return response()->json([$e->getMessage() , "code" => 422] , 422);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {

            if(! $user = User::find($id)){
                return response()->json(["msg" => "User is not exist !!", "code" => 404],404);
            }
            $user->delete();

            return response()->json(['msg' => "Account has been Deleted!" , "code" => 200],200);
        }
        catch(Exception $e)
        {
            return response()->json([$e->getMessage() , 'code' => 422] , 422);
        }
    }


    protected function validator(array $data )
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'gender' => 'required|numeric|in:0,1|max:1'
        ]);
    }




    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => str_random(10),
            'gender' => $data['gender']
        ]);
    }
}
