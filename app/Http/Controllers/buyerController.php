<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\buyer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Foundation\Auth\RegistersUsers;

class buyerController extends Controller
{


    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    public function index()
    {
        return view('auth.buyer.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(Request $request)
    {
        
        
        
$user = new User;
$user->email = $request->input('email');
$user->password = $request->input('password');



        
        // return User::create([
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password'])
        // ]);


        $user = DB::table('user')->select('id')->where('email',$request->input('email'))->get();


if($user){

    
    
    foreach($user as $user_id)
    $id = $user_id->id;





    $buyer = new buyer;
    $buyer->name = $request->input('name');
    $buyer->address = $request->input('address');
    $buyer->phone = $request->input('tpno');
    $buyer->type = $request->input('description');
    $buyer->user_id = $id;

    $buyer->save();

    // return buyer::create([
    //     'name' => $data['name'],
    //     'address' => $data['address'],
    //     'phone' => $data['tpno'],
    //     'type' => $data['type'],
    //     'description' => $data['description'],
    //     'user_id' => $id
    // ]);


    return redirect()->back()->with('success','success');
}else{
    $user->save();



    foreach($user as $user_id)
    $id = $user_id->id;





    $buyer = new buyer;
    $buyer->name = $request->input('name');
    $buyer->address = $request->input('address');
    $buyer->phone = $request->input('tpno');
    $buyer->type = $request->input('description');
    $buyer->user_id = $id;

    $buyer->save();

    // return buyer::create([
    //     'name' => $data['name'],
    //     'address' => $data['address'],
    //     'phone' => $data['tpno'],
    //     'type' => $data['type'],
    //     'description' => $data['description'],
    //     'user_id' => $id
    // ]);


    return redirect()->back()->with('success','success');
}



        
    }
}
