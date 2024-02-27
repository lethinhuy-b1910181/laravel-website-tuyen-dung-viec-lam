<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;
use Auth;
use Hash;
class LoginController extends Controller
{
    public function index(){
        if(Auth::guard('candidate')->check()){
            return redirect()->route('candidate_home');
        }
        if(Auth::guard('company')->check()){
            return redirect()->route('company_edit_profile');
        }
        $other_page_item  = PageOtherItem::where('id',1)->first();
        return view('front.login', compact('other_page_item'));
    }
    public function company_login_submit(Request $request){
      
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('company')->attempt($credential)) {
            return redirect()->route('company_edit_profile');
        }else {
            return redirect()->route('login')->with('error','Information is not correct!');
        }
    }
    public function company_logout(){
        Auth::guard('company')->logout();
        return redirect()->route('login');
    }
    public function candidate_login_submit(Request $request){
      
        $request->validate([
            // 'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'

        ]);

        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::guard('candidate')->attempt($credential)) {
            return redirect()->back();
        }else {
            return redirect()->back()->with('error','Information is not correct!');
        }
    }
    public function candidate_logout(){
        Auth::guard('candidate')->logout();
        return redirect()->route('home');
    }
}
