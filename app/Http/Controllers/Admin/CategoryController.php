<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'categoryname' => 'required|unique:categories',
            'describe' => 'required|max:250',
        ],[
            'categoryname.required' => 'The Category Name field is required',
            'categoryname.unique' => 'The Category Name field already exist',

            'describe.required' => 'The Describe field is required',
            'describe.max' => 'Maximum of 250 characters',
        ]);
        $categoryname = $request['categoryname'];
        $describe = $request['describe'];
        $status = $request['status'];

        $cate = new Category;

        $cate['categoryname'] = $categoryname;
        $cate['describe'] = $describe;
        $cate['slug'] = str_slug($categoryname);
        if($status == true){
            $cate['status'] = $status;
        }else {
            $cate['status'] = false;
        }

        $cate -> save();

        $notification = array(
            'message' => 'Add category successful!',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->posts;
        return view('admin.categories.show',['posts'=>$posts,'category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->posts->count() > 0){
            $notification = array(
                'message' => 'You can not delete a category that has posts filed in it',
                'alert-type' => 'warning'
            );
            return redirect()->route('categories.index')->with($notification);
        }
        Category::where('id', $category->id)->delete();
        $notification = array(
            'message' => 'Delete category successful!',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }
}
