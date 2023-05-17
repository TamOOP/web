<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class HomeController extends Controller
{
    public function index(){
        $brandShow = 'CONVERSE';
        $brand = ['CONVERSE','VANS','ADIDAS','NIKE','BALENCIAGA'];
        $brandHome = [];
        for ($i=0; $i < 5; $i++) { 
            $query = DB::select("select * from brand inner join product on brand.Brand_id = product.brand_id where Brand_name = :name",[
                'name' => $brand[$i]
            ]);
            $brandHome = Arr::add($brandHome, $i, $query);
        }
        $products = DB::select("select * from brand inner join product on brand.Brand_id = product.brand_id where Brand_name = :name",[
            'name' => $brandShow
        ]);
        for ($i=0; $i < count($products) ; $i++) { 
            $products[$i]->product_price = number_format($products[$i]->product_price);
        }
        return view('user/homepage')->with([
            'products'=>$products,
            'brandHome' => $brandHome
        ]);
    }
}
