<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    public function payment(Request $request,$pid)
    {
        session(['prePage' => '/cart/'.$pid]);
        $dir = session('prePage');
        if (session('login') != 'true') {
            return redirect('/login');
        }
        else{
            $products = DB::select('select * from cart inner join product on cart.product_id = product.product_id
             where mem_id= :uid and not cart.product_id= :pid',[
                'uid' => session('user'),
                'pid' => $pid
            ]);
            $product_cart = DB::select('select * from cart where mem_id= :uid and product_id= :pid',[
                'uid' => session('user'),
                'pid' => $pid
            ]);
            if($product_cart){
                DB::select('update cart set amount= :quantity where mem_id= :uid and product_id= :pid',[
                    'uid' => session('user'),
                    'pid' => $pid,
                    'quantity' => ($product_cart[0]->amount +1)
                ]);
            }else{
                DB::select('insert into cart (mem_id,product_id,amount) values (:uid, :pid, :quantity)',[
                    'uid' => session('user'),
                    'pid' => $pid,
                    'quantity' => $request->amount
                ]);
            }
            $pri_product = DB::select('select * from cart inner join product on cart.product_id = product.product_id
             where mem_id= :uid and cart.product_id= :pid',[
                'uid' => session('user'),
                'pid' => $pid
            ]);
            $products = Arr::prepend($products,$pri_product[0]);
            foreach ($products as $product) {
                $product->product_image = explode(',',$product->product_image)[0];
            }
            return view('user/cart',[
                'products' => $products,
                'pid' => $pid
            ]);
        }
    }
    public function loadCart()
    {
        session(['prePage' => '/cart']);
        if(session('login') != 'true'){
            return redirect('/login');
        }else{
            $products = DB::select('select * from cart inner join product on cart.product_id = product.product_id where mem_id= :uid',[
                'uid' => session('user')
            ]);
            foreach ($products as $product) {
                $product->product_image = explode(',',$product->product_image)[0];
            }
            return view('user/cart',['products' => $products]);
        }
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $amount = $request->quantity;
        $product = DB::select('select * from cart inner join product on cart.product_id = product.product_id 
        where mem_id= :uid and cart.product_id= :pid',[
            'uid' => session('user'),
            'pid' => $request->id
        ]);
        if(!$amount){
            $amount = $product[0]->amount;
        }
        if(isset($request->action)){
            if($request->action == 'remove'){
                if($amount > 1){
                    $amount -= 1;
                }
            }
            if($request->action =='add'){
                $amount += 1;
            }
        }
        
        DB::select('update cart set amount= :amount where mem_id= :uid and product_id= :pid',[
            'uid' => session('user'),
            'pid' => $request->id,
            'amount' => $amount
        ]);
        return response()->json([
            'quantity' => $amount,
            's_price' => number_format($amount * $product[0]->product_price)
        ]);
    }

    public function removeProduct(Request $request)
    {
        DB::select('delete from cart where mem_id= :uid and product_id= :pid',[
            'uid' => session('user'),
            'pid' => $request->id
        ]);

        return response()->json([]);
    }
}
