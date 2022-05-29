<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;
use App\Models\Admin;
class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('backend.auth.login');
        }
        $credentials = $request->only(['email', 'password']);
        if (Auth::guard('admin')->attempt($credentials)) {
            $account = DB::table('admins')
            ->select('id','name')
            ->where('email',$request['email'])
            ->first(); 
            $request->session()->push('acc',$account); 
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withInput();
        }
    }
}

