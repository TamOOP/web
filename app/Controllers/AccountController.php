<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function loadPage()
    {
        session(['prePage'=>'/account']);
        if(session('login') != 'true'){
            return redirect('/login');
        }else{
            $uid = session('user');
            $user = DB::select('select * from member where mem_id= :uid',[
                'uid' => $uid,
            ]);
            if($user[0]->phone == 0){
                $user[0]->phone = null;
            }
            return view('/account',[
                'user' => $user[0]
            ]);
        }
    }

    public function changePass(Request $request)
    {
        session(['prePage' => '/account']);
        if(session('login') != 'true'){
            return response()->json(['redirect','/login']);
        }
        else{
            $request->validate([
                'old_pass' => 'required',
                'new_pass' => 'required',
                'confirm_pass' => 'required'
            ]);
            $uid = session('user');
            $user = DB::select('select * from member where mem_id= :uid',[
                'uid' => $uid,
            ]);
            if($user[0]->password != $request->old_pass ){
                return response()->json([
                    'success' => 'fail',
                    'error' => 'pass'
                ]);
            }
            if($request->new_pass != $request->confirm_pass){
                return response()->json([
                    'success' => 'fail',
                    'error' => 'confirm'
                ]);
            }
    
            DB::select('update member set password= :pass where mem_id= :uid',[
                'uid' => $uid,
                'pass' => $request->new_pass
            ]);
            return response()->json(['success' => 'true']);
        }
        
    }


    public function changeProfile(Request $request)
    {
        session(['prePage' => '/account']);
        if(session('login') != 'true'){
            return response()->json(['redirect','/login']);
        }
        else{
            $request->validate([
                'name' => 'required',
                'phone' => 'required|digits:10|max:10|min:10'
            ]);
            $query = DB::select('update member set name= :name, phone= :phone where mem_id= :uid',[
                'name' => $request->name,
                'phone' => $request->phone,
                'uid' => session('user')
            ]);
    
            return response()->json(['name'=>$request->name]);
        }
        
    }
}
