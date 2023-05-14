<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    public function detail($id) {
        $product = DB::select("select * from product inner join brand on brand.Brand_id = product.brand_id where product_id = :id",[
            'id' => $id
        ]);
        $sizes = DB::select('select * from product_size inner join product on product_size.product_id = product.product_id 
            where product.product_id= :id',[
                'id' => $id
        ]);
        $product[0]->product_price = number_format($product[0]->product_price);
        return view('user/product', [
            'product' => $product[0],
            'sizes' => $sizes
        ]);
    }

    public function store(Request $request){
        $length = count($request->img);
        $imgPath = [];
        for ($i=0; $i < $length; $i++) { 
            $newImg = 'img'.time().'-'.$i.'.'
            .$request->img[$i]->extension();
            $request->img[$i]->move(public_path('img/temp'),$newImg);
            $imgPath = Arr::add($imgPath, $i , '/img/temp/'.$newImg );
        }
        return response()->json(['path'=> $imgPath]);
    }
    public function delTempImg(Request $request){
        $imgPath = public_path('img/temp/').$request->nameImg;
        File::delete($imgPath);
        return response()->json(['path'=> 'delete OK']);    
    }

    public function updateImg($id){
         $filePath = public_path('img/').$id;
         $tempPath = public_path('img/temp');
         if(File::exists($tempPath)){
            File::deleteDirectory($filePath);
            File::moveDirectory($tempPath,$filePath);
         }
        
         $files = File::allFiles($filePath);
        $num = count($files);
        $list = $files[0]->getFilename();
        for ($i=1; $i < $num; $i++) { 
           $list .= ','.$files[$i]->getFilename();
        }
        DB::table('product')->where('product_id','=',$id)->update([
           'product_image' => $list
        ]);
        $product = DB::select("select * from product where product_id = :id",[
            'id' => $id
        ]);
        // dd($product[0]->product_image);
        return redirect("/products/".$id);
    }
}
