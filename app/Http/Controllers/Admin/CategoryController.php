<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Str;
// use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(){
        $categories = Category::all();
        return view('admin.category.create',compact('categories'));
    }

public function store(CategoryRequest $request){
    $imageName = "";
    if($request->hasFile('image')){
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = time().'.'.$ext;
        $image->move('uploads/category', $imageName);
    }

    $category = Category::create([
        'name' => $request->name,
        'image' => $imageName,
        'parent_id' => $request->parent_category,
    ]);

    if($category){
        return redirect()->route('admin.category.index')->with('message', 'Category created successfully');
    } else {
        return back()->withInput()->with('error', 'Failed to create category');
    }
}
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        $categories=Category::all();
        return view('admin.category.edit',compact('category','categories'));

    }

    public function update(CategoryRequest $request, int $id)
    {
        $category=Category::findOrFail($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move('uploads/category', $imageName);
        }
        else{
            $imageName=$category->image;
        }
        $category->update([
            'name' => $request->name,
            'image' => $imageName,
            'parent_id' => $request->parent_category,
        ]);
        if($category){
            return redirect()->route('admin.category.index')->with('message', 'Category updated successfully');
        } else {
            return back()->withInput()->with('error', 'Failed to update category');
        }
    }

    public function destroy($id)
    {
          $category = Category::findOrFail($id)->delete();
          return redirect()->route('admin.category.index')->with('message', 'Category deleted successfully');;
    }

}
