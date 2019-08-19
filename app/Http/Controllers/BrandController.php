<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   public function manageBrand(){
    $brands=Brand::all();
        return view('back-end.brand.manage_brand',['brands'=>$brands]);
       //return view('back-end.brand.manage_brand');
   }

   public function Brand_unpublished($id){
    $brand = Brand::find($id);

    $brand->publication_status = 0;
    $brand->save();
    return redirect('brand/manage')->with('message', 'Brand Unpublished');
   }
   public function Brand_published($id){
    $brand = Brand::find($id);

    $brand->publication_status = 1;
    $brand->save();
    return redirect('brand/manage')->with('message', 'Brand Published');

   }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back-end.brand.add_brand');
    }

   
    public function store(Request $request)
    {
        $this->validate($request,[
            'brand_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'brand_description'=>'required',
            'publication_status'=>'required'

        ]);
        $brand=new Brand;

        $brand->brand_name=$request->brand_name;
        $brand->brand_description=$request->brand_description;
        $brand->publication_status=$request->publication_status;
        $brand->save();

        return redirect('brand/add')->with('message','Brand Information Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
     //return view('back-end.category.manage-category', ['categories' => $categories]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=Brand::find($id);
        return view('back-end.brand.edit_brand',['brand'=>$brand]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'brand_name'=>'required|regex:/^[\pL\s\-]+$/u',
            'brand_description'=>'required',
            'publication_status'=>'required'

        ]);


      $brand= Brand::find($request->id);

      $brand->brand_name=$request->brand_name;
      $brand->brand_description=$request->brand_description;
      $brand->publication_status=$request->publication_status;
      $brand->save();
      $brands=Brand::all();
      return view('back-end.brand.manage_brand',['brands'=>$brands])->with('message','Brand Inforamtion Updated');

      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('brand/manage')->with('message', 'Brand Deleted');
    }
}
