<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return view('back-end.category.add-category');
    }
    public function saveCategory(Request $request)
    {
      $this->validate($request,[
        'category_name'=>'required|regex:/^[\pL\s\-]+$/u',
        'category_description'=>'required',
        'publication_status'=>'required'

    ]);

        Category::create($request->all());
        return redirect('/category/add')->with('message', 'Category Information Saved Successfully');

        //==================One======================
        //  return $request ->all();
        // $category= new Category();
        // $category->category_name            =$request->category_name;
        // $category->category_description   =$request->category_description;
        // $category->publication_status       =$request->publication_status;
        // $category->save();

        //===========Three (Using DB class [Query Builder])=================
        // DB::table('categories')->insert([
        //     'category_name'         =>$request->category_name,
        //     'category_description'=>$request->category_description,
        //     'publication_status'    =>$request->publication_status
        // ]);

    }

    public function manageCategory()
    {
        $categories = Category::all();
        //  return $categories;
        return view('back-end.category.manage-category', ['categories' => $categories]);
    }



    public function Category_unpublished($id)
    {
        $category = Category::find($id);

        $category->publication_status = 0;
        $category->save();
        return redirect('category/manage')->with('message', 'Category Unpublished');
    }



    public function Category_published($id)
    {
        $category = Category::find($id);

        $category->publication_status = 1;
        $category->save();
        return redirect('category/manage')->with('message', 'Category Published');
    }



    public function Category_edit($id)
    {
        $category = Category::find($id);
        return view('back-end/category/edit_category', ['category' => $category]);
    }


    public function Category_update(Request $request)
    {

        $category = Category::find($request->category_id);

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();

        return redirect('product/manage')->with('message', 'Category Information Updated');

        //return $category;

    }



    public function Category_delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('product/manage')->with('message', 'Category Deleted');
    }

}
