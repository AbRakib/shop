<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    /**
     * Return to login page
     */
    public function index() {
        return view('welcome');
    }

    /**
     * Check Login
     */
    public function checkLogin(Request $request) {
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required|min:6',
        ]);
        // check login & access/reject
        if (Auth::attempt($validateData)) {
            if(Auth::user()->is_admin == 1){
                toastr()
                ->closeOnHover(true)
                ->closeDuration(10)
                ->addSuccess('Your password has been changed.');
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                toastr()
                ->escapeHtml(false)
                ->addError('<strong>We’re sorry</strong>, You can\'t access!.');
                return redirect()->back();
            }
        } else {
            toastr()
            ->escapeHtml(false)
            ->addError('<strong>We’re sorry</strong>, Email & Password is Wrong.');
            return redirect()->back();
        }
    }

    /**
     * Dashboard view
     */
    public function dashboard() {
        return view('dashboard');
    }

    /**
     * logout admin/user
     */
    public function logout() {
        $user = User::findOrFail(Auth::user()->id);
        if($user){
            Auth::logout();
            toastr()
            ->closeOnHover(true)
            ->closeDuration(10)
            ->addSuccess('Your password has been reset and a new one has been sent to your email.');
            return redirect()->route('login');
        } else {
            toastr()
            ->closeOnHover(true)
            ->closeDuration(10)
            ->addError('Something went wrong!');
            return redirect()->back();
        }
        
    }
}
