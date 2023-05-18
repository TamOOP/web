<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email:filter',
            'pswd' => 'required'
        ]);
        $user = DB::select('select * from member where username = :uname and password= :pswd',[
            'uname' => $request->email,
            'pswd' => $request->pswd
        ]);
        if(!$user){
            return response()->json([
                'error' => 'Sai mật khẩu hoặc email'
            ]);
        }
        else{
            session(['user' => $user[0]->mem_id]);
            if(session('prePage')){
                $dir = session('prePage');
            }
            else{
                $dir = '/';
            }
            session(['login' =>'true']);
            return response()->json(['dir' => $dir]);
        }
    }
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:filter',
            'pswd' => 'required'
        ]);
        $user = DB::select('select * from member where username= :uname',[
            'uname' => $request->email
        ]);
        if($user){
            return response()->json(['error' => 'Email đã tồn tại']);
        }
        else{
            DB::table("member")->insert([
                'username' => $request->email,
                'password' => $request->pswd,
                'name' => $request->name,
                'address' => 0,
                'phone' => 0
            ]);
    
            $user = DB::select('select * from member where username = :uname',[
                'uname' => $request->email
            ]);
            session(['user' => $user[0]->mem_id]);
    
            session(['login' =>'true']);
            $dir = session('prePage');
            return response()->json([
                'dir' => $dir
            ]);
        }
    }
    public function logout()
    {
        session(['login' => 'false']);
        $dir = session('prePage');
        return redirect($dir);
    }
}
