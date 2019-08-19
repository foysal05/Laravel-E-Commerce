<?php

namespace App\Http\Controllers;

use Image;
use App\Brand;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB;

class ProductController extends Controller
{
    public function index(){

        $categories     = Category::where('publication_status',1)->get();
        $brands           = Brand::where('publication_status',1)->get();
       
        return  view('back-end.product.add-product',[
            'categories'=>$categories,
            'brands'=>$brands
        ]);
    }
    public function manageProduct(){
        $products=DB::table('products')
                                        ->join('categories','products.category_id','=','categories.id')
                                        ->join('brands','products.brand_id','=','brands.id')
                                        ->select('products.*','categories.category_name','brands.brand_name')
                                        ->get();

        return view('back-end.product.manage-product',['products'=>$products]);

    }

    public function saveProduct(Request $request){

        $this->validate($request,[
            'category_id'=>'required',
            'brand_id'=>'required',
            //'product_price'=>'required|numeric|between:0,99.99',
            'product_price'=>'required',
            'product_quantity'=>'required|integer',
            'product_name'=>'required',
            //'product_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'short_description'=>'required',
            'long_description'=>'required',
            'product_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publication_status'=>'required'

        ]);

        $product_image= $request->file('product_image');
        $imageName=$product_image->getClientOriginalName();
        $imageExtension = $product_image->getClientOriginalExtension();
        $imageName=str_slug($request->product_name). '.' .$imageExtension ;
        $directory='product-images/';
        $imageUrl=$directory.$imageName;
        Image::make($product_image)->save( $imageUrl);
       // return $imageName;
     
        $product=new Product;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->product_price=$request->product_price;
        $product->product_quantity=$request->product_quantity;
        $product->product_name=$request->product_name;
        $product->short_description=$request->short_description;
        $product->long_description=$request->long_description;
        $product->product_image=$imageUrl;
        $product->publication_status=$request->publication_status;
        $product->save();
       
        return redirect('product/add')->with('message', 'Product Information Added Successfully');
     
    }
    public function editProduct($id){
        $product         = Product::find($id);
        $categories     = Category::where('publication_status',1)->get();
        $brands           = Brand::where('publication_status',1)->get();
       
        //return $product;
        return  view('back-end.product.edit_product',[
            'categories'=>$categories,
            'brands'=>$brands,
            'product'=>$product
        ]);
    }
    public function updateProduct(Request $request) {

        $this->validate($request,[
            'category_id'=>'required',
            'brand_id'=>'required',
            //'product_price'=>'required|numeric|between:0,99.99',
            'product_price'=>'required',
            'product_quantity'=>'required|integer',
            'product_name'=>'required',
            //'product_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'short_description'=>'required',
            'long_description'=>'required',
            'product_image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publication_status'=>'required'

        ]);
        if ($request->file('product_image')) {
                $product_image= $request->file('product_image');
                $imageName=$product_image->getClientOriginalName();
                $imageExtension = $product_image->getClientOriginalExtension();
                $imageName=str_slug($request->product_name). '.' .$imageExtension ;
                $directory='product-images/';
                $imageUrl=$directory.$imageName;
                Image::make($product_image)->save( $imageUrl);
            // return $imageName;

            $product=Product::find($request->id);
            
            //return $request->id;
            $product->category_id=$request->category_id;
            $product->brand_id=$request->brand_id;
            $product->product_price=$request->product_price;
            $product->product_quantity=$request->product_quantity;
            $product->product_name=$request->product_name;
            $product->short_description=$request->short_description;
            $product->long_description=$request->long_description;
            $product->product_image=$imageUrl;
            $product->publication_status=$request->publication_status;
            $product->save();
           
            return redirect('product/manage')->with('message', 'Product Information Updated Successfully');

            
        } else {
            $product=Product::find($request->id);
            
            //return $request->id;
            $product->category_id=$request->category_id;
            $product->brand_id=$request->brand_id;
            $product->product_price=$request->product_price;
            $product->product_quantity=$request->product_quantity;
            $product->product_name=$request->product_name;
            $product->short_description=$request->short_description;
            $product->long_description=$request->long_description;
           //$product->product_image=$imageUrl;
            $product->publication_status=$request->publication_status;
            $product->save();
           
            return redirect('product/manage')->with('message', 'Product Information Updated Successfully');
        }
        
        
    }
    public function deleteProduct($id){
        $product=Product::find($id);
        $product->delete();
        return redirect('product/manage')->with('message', 'Product Information Deleted');
    }

    public function singleProduct($id){

        $product=Product::find($id);
        //return $product;

        return view('front-end.product.single',['product'=>$product]);

    }
}
