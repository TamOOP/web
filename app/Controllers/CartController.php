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
            $request->validate([
                'size'=> 'required'
            ]);
            $product_size = DB::select('select * from product_size where product_id= :pid and size_id= :size',[
                'pid' => $pid,
                'size' => $request->size
            ]);
            if($product_size[0]->quantity == 0){
                return redirect('/products/'.$pid);
            }else{
                $products = DB::select('select * from cart inner join product on cart.product_id = product.product_id
                inner join product_size on product_size.size_id = cart.size_id and cart.product_id = product_size.product_id
                where mem_id= :uid',[
                    'uid' => session('user')
                ]);
                $product_cart = DB::select('select * from cart where mem_id= :uid and product_id= :pid and size_id= :size',[
                    'uid' => session('user'),
                    'pid' => $pid,
                    'size' => $request->size
                ]);
                if($product_cart){
                    if($product_cart[0]->amount + $request->amount > $product_size[0]->quantity){
                        DB::select('update cart set amount= :quantity where mem_id= :uid and product_id= :pid and size_id= :size',[
                            'uid' => session('user'),
                            'pid' => $pid,
                            'quantity' =>  $product_size[0]->quantity,
                            'size' => $request->size
                        ]);
                    }
                    else{
                        DB::select('update cart set amount= :quantity where mem_id= :uid and product_id= :pid and size_id= :size',[
                            'uid' => session('user'),
                            'pid' => $pid,
                            'quantity' => ($product_cart[0]->amount + $request->amount),
                            'size' => $request->size
                        ]);
                    }
                }
                else{
                    if($request->amount > $product_size[0]->quantity){
                        DB::select('insert into cart (mem_id,product_id,amount,size_id) values (:uid, :pid, :quantity, :size)',[
                            'uid' => session('user'),
                            'pid' => $pid,
                            'quantity' => $product_size[0]->quantity,
                            'size' => $request->size
                        ]);
                    }else{
                        DB::select('insert into cart (mem_id,product_id,amount,size_id) values (:uid, :pid, :quantity, :size)',[
                            'uid' => session('user'),
                            'pid' => $pid,
                            'quantity' => $request->amount,
                            'size' => $request->size
                        ]);
                    }
                }
                $pri_product = DB::select('select * from cart inner join product on cart.product_id = product.product_id
                    inner join product_size on product_size.size_id = cart.size_id and cart.product_id = product_size.product_id
                where mem_id= :uid and cart.product_id= :pid and cart.size_id= :size',[
                    'uid' => session('user'),
                    'pid' => $pid,
                    'size' => $request->size
                ]);

                foreach ($products as $product) {
                    $product->product_image = explode(',',$product->product_image)[0];
                }
                $pri_product[0]->product_image = explode(',',$pri_product[0]->product_image)[0];
                $sizes = DB::select('select cart.product_id, product_size.* from cart inner join product_size on cart.product_id= product_size.product_id
                where mem_id= :uid;',[
                    'uid' => session('user')
                ]);
                return view('user/cart',[
                    'products' => $products,
                    'pid' => $pid,
                    'sizes' => $sizes,
                    'pri_product' => $pri_product[0]
                ]);
            }
        }
    }
    public function loadCart()
    {
        session(['prePage' => '/cart']);
        if(session('login') != 'true'){
            return redirect('/login');
        }else{
            $products = DB::select('select * from cart inner join product on cart.product_id = product.product_id 
            inner join product_size on cart.size_id = product_size.size_id and cart.product_id= product_size.product_id
            where mem_id= :uid ',[
                'uid' => session('user')
            ]);
            $sizes = DB::select('select cart.product_id, product_size.* from cart inner join product_size on cart.product_id= product_size.product_id
            where mem_id= :uid;',[
                'uid' => session('user')
            ]);
            foreach ($products as $product) {
                $product->product_image = explode(',',$product->product_image)[0];
            }
            return view('user/cart',[
                'products' => $products,
                'sizes' => $sizes
            ]);
        }
    }

    public function updateQuantity(Request $request)
    {
        session(['prePage' => '/cart']);
        if(session('login') != 'true'){
            return response()->json(['redirect','/login']);
        }else{
            $request->validate([
                'id' => 'required'
            ]);
            $amount = $request->quantity;
            $product = DB::select('select * from cart inner join product on cart.product_id = product.product_id 
            where mem_id= :uid and cart.product_id= :pid and size_id= :size',[
                'uid' => session('user'),
                'pid' => $request->id,
                'size' => $request->size
            ]);
            if(!$amount){
                $amount = $product[0]->amount;
            }
            $product_size = DB::select('select * from product_size inner join cart on cart.product_id = product_size.product_id  and
                cart.size_id = product_size.size_id where cart.size_id= :size and cart.product_id= :pid',[
                    'size' => $request->size,
                    'pid' => $request->id
            ]);
            if ($product_size[0]->quantity < $amount) {
                 $amount = $product_size[0]->quantity;
            }else{
                if(isset($request->action)){
                    if($request->action == 'remove'){
                        if($amount > 1 &&  $amount <= $product_size[0]->quantity){
                            $amount -= 1;
                        }
                    }
                    if($request->action =='add'){
                        if( $amount < $product_size[0]->quantity){
                            $amount += 1;
                        }
                    }
                }
            }
            
            DB::select('update cart set amount= :amount where mem_id= :uid and product_id= :pid and size_id= :size',[
                'uid' => session('user'),
                'pid' => $request->id,
                'amount' => $amount,
                'size' => $request->size
            ]);

            return response()->json([
                'quantity' => $amount,
                's_price' => number_format($amount * $product[0]->product_price)
            ]);
        }
        
    }

    public function removeProduct(Request $request)
    {
        session(['prePage' => '/cart']);
        if(session('login') != 'true'){
            return response()->json(['redirect','/login']);
        }else{
            DB::select('delete from cart where mem_id= :uid and product_id= :pid and size_id= :size',[
                'uid' => session('user'),
                'pid' => $request->id,
                'size' => $request->size
            ]);
    
            return response()->json([]);
        }
        
    }

    public function updateSize(Request $request)
    {
        session(['prePage' => '/cart']);
        if(session('login') != 'true'){
            return response()->json(['redirect','/login']);
        }else{
            $product_size = DB::select('select quantity from product_size where product_id= :pid and size_id= :size',[
                'pid' => $request->pid,
                'size' => $request->size
            ]);
            if($product_size){
                if($product_size[0]->quantity > 0){
                    DB::select('update cart set size_id= :size where mem_id= :uid and product_id= :pid ',[
                        'uid' => session('user'),
                        'pid' => $request->pid,
                        'size' => $request->size
                    ]);
                    $product = DB::select('select * from cart inner join product on cart.product_id = product.product_id
                        inner join product_size on product_size.size_id = cart.size_id and cart.product_id = product_size.product_id
                    where mem_id= :uid and cart.product_id= :pid and cart.size_id= :size',[
                        'uid' => session('user'),
                        'pid' => $request->pid,
                        'size' => $request->size
                    ]);
                    return response()->json(['quantity'=>$product[0]->quantity]);
                }
                else{
                    return response()->json([]);
                }
            }
            else{
                return response()->json([]);
            }
        }
    }

    public function selectProduct(Request $request)
    {
        session(['prePage' => '/cart']);
        if(session('login') != 'true'){
            return response()->json(['redirect','/login']);
        }
        else{
            $request->validate([
                'pid' => 'required'
            ]);
            if($request->pid == 'all'){
                $s_amount = DB::select('select sum(amount) as Tongsoluong from cart where mem_id= :uid',[
                    'uid' => session('user')
                ])[0]->Tongsoluong;
                $cart = DB::select('select * from cart inner join product on cart.product_id = product.product_id 
                where mem_id= :uid  ',[
                    'uid' => session('user')
                ]);
                $s_price = 0;
                for ($i=0; $i < count($cart); $i++) { 
                    $s_price += $cart[$i]->amount * $cart[$i]->product_price;
                }
                return response()->json([
                    's_amount' => $s_amount,
                    's_price' => $s_price
                ]);
            }
            else{
                $s_amount = DB::select('select sum(amount) as Tongsoluong from cart 
                where mem_id= :uid and product_id= :pid and size_id= :size',[
                    'uid' => session('user'),
                    'pid' => $request->pid,
                    'size' => $request->size
                ])[0]->Tongsoluong;

                $cart = DB::select('select * from cart inner join product on cart.product_id = product.product_id 
                where mem_id= :uid  and cart.product_id= :pid and cart.size_id= :size',[
                    'uid' => session('user'),
                    'pid' => $request->pid,
                    'size' => $request->size
                ]);
                $s_price = $cart[0]->amount * $cart[0]->product_price;

                return response()->json([
                    's_amount' => $s_amount,
                    's_price' => $s_price
                ]);
            }
        }
    }
}
