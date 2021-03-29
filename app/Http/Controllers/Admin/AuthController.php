<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout', 'changePassword']]);
    }

    public function showLoginForm()
    {
        return view('back.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $this->validate($request, [
          'username' => 'required',
          'password' => 'required'
        ]);
        // dd($credentials);
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect(route('admin.dashboard'));
        } else {
            return redirect(route('admin.dashboard'));
            // return back()->with('login', 'failed')->with('username', $request->username);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

    public function changePassword(Request $request){
      $validator = Validator::make($request->except(['_token']), [
        'oldPassword' => 'required',
        'password' => 'required|confirmed'
      ]);
      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput()->with('passwordChange', 'fail');
      }
      $password_data = $validator->getData();

      $db_password = Admin::where('id', 1)->first()->password;
      $password = Hash::make($password_data['password']);
      if (Hash::check($password_data['oldPassword'], $db_password)) {
          Admin::where('id', 1)->update(array('password' => $password));
          return redirect()->back()->with('passwordChange', 'success');
      } else {
          return redirect()->back()->with('passwordChange', 'fail');
      }
    }

}
