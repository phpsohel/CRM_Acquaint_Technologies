<?php

  

namespace App\Http\Controllers;

  

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Auth;
  

class LoginController extends Controller

{

  

    use AuthenticatesUsers;

    

    protected $redirectTo = '/eshop';

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        // $this->middleware('guest')->except('logout');

    }

  

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function login(Request $request)

    {   

        $input = $request->all();

        $this->validate($request, [

            'name' => 'required',

            'password' => 'required',

        ]);

  

        $fieldType = filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if(auth()->attempt(array($fieldType => $input['name'], 'password' => $input['password'])) && Auth::user()->role_id == 5)

        {
            return redirect('/eshop/profile');

        }elseif(auth()->attempt(array($fieldType => $input['name'], 'password' => $input['password'])) && Auth::user()->role_id != 5){
            
               return redirect('/');
        }
        else{

            return redirect()->route('eshop-login')

                ->with('alert','User Name or Password is Wrong.');

        }

          

    }

}