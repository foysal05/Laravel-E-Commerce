<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use DB;

use Illuminate\Http\Request;

class NewShopController extends Controller
{
   public function base(){
       return view('front-end.master');
   }
   public function index(){
   //Category List Get from AppServiceProvider
    $newproducts = Product::where('publication_status',1)
                                        ->orderBy('id','DESC')
                                        ->take(8)
                                        ->get();
              return view('front-end.home.home',[
                 'newProducts'=>$newproducts
           ]);
   }
   public function productCategory($id){
    //    $categoryProducts=Product::where ('category_id', $id)
    //                                     ->where('publication_status',1)
    //                                     ->get();

        $categoryProducts=DB::table('products')
                                ->where ('category_id', $id)
                                ->join('categories','products.category_id','=','categories.id')
                                ->join('brands','products.brand_id','=','brands.id')
                                ->select('products.*','categories.category_name','brands.brand_name')
                                ->get();

         // return $categoryProducts;
           return view('front-end.category.category_content',[
               'categoryProducts'=>$categoryProducts
           ]);
   }
}
