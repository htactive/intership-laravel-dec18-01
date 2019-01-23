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

        $cate = new Category;

        $cate['categoryname'] = $request['categoryname'];
        $cate['describe'] = $request['describe'];
        $cate['slug'] = str_slug($request['categoryname']);
        if($request['status'] == true){
            $cate['status'] = $request['status'];
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

        return view('admin.categories.show',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if($request->status == null){ $request->status=0; }
        if($category->categoryname == $request->categoryname && $category->describe == $request->describe && $category->status == $request->status )
        {
            $notification = array(
                'message' => 'Date category no change!',
                'alert-type' => 'info'
            );
            return redirect()->route('categories.index')->with($notification);
        }
        if($category->categoryname == $request->categoryname)
        {
            $this->validate($request,[
                'categoryname' => 'required',
                'describe' => 'required|max:250',
            ],[
                'categoryname.required' => 'The Category Name field is required',

                'describe.required' => 'The Describe field is required',
                'describe.max' => 'Maximum of 250 characters',
            ]);
            $category->categoryname = $request['categoryname'];
            $category->describe = $request['describe'];
            $category->status = $request->status;
            $category->save();
            $notification = array(
                'message' => 'Change category successful!!',
                'alert-type' => 'success'
            );
            return redirect()->route('categories.index')->with($notification);
        }
        else {
            $this->validate($request,[
                'categoryname' => 'required|unique:categories',
                'describe' => 'required|max:250',
            ],[
                'categoryname.required' => 'The Category Name field is required',
                'categoryname.unique' => 'The Category Name field already exist',

                'describe.required' => 'The Describe field is required',
                'describe.max' => 'Maximum of 250 characters',
            ]);
            $category->categoryname = $request['categoryname'];
            $category->describe = $request['describe'];
            $category->status = $request->status;
            $category->save();
            $notification = array(
                'message' => 'Change category successful!!',
                'alert-type' => 'success'
            );
            return redirect()->route('categories.index')->with($notification);
        }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $category = Category::find($id);
        if($category->status == true)
        {
            $category->status = false;
        }
        else{
            $category->status = true;
        }
        $category->save();
        $notification = array(
            'message' => 'Change status successful!',
            'alert-type' => 'success'
        );
        return redirect()->route('categories.index')->with($notification);
    }
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
