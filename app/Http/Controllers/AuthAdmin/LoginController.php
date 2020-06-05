<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
//        $this->middleware('guest')->except('logout');
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
        // bat loi dang nhap
        $this->validate($request,$this->rule(),$this->messages());
        // kiem tra dang nhap
        if(Auth::guard('admins')->attempt(['username' => $request->username,'password' => $request->password],$request->remember))
        {
            // dang nhap thanh cong
            return redirect()->intended(route('About'));
        }
        // dang nhap that bai
        return redirect()->back()->withInput($request->only('email','remember','password'));
    }

    /**
     * dieu kien dang nhap
     */
    public function rule()
    {
        return [
            'username'     =>  'required|max:255',
            'password'  =>  'required',
        ];
    }
    /**
     * custome message errors
     */
    public function messages()
    {
        return [
            'username.required'        =>  'Nhập username đi tk admin ngu lồn',
            'password.required'     =>  'Nhập password đi tk admin ngu lồn',
        ];
    }
}
