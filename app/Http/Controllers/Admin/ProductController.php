<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::has('parent')->get();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $imageName = null;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move('uploads/product', $imageName);
        }

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price'=>$request->price,
            'image' => $imageName,
            'category_id'=>$request->category_id
        ]);

        if($product){
            return redirect('admin/product')->with('message', 'product created successfully');
        } else {
            return back()->withInput()->with('error', 'Failed to create product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::findOrFail($id);
        $categories=Category::all();
        return view('admin.product.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product=Product::findOrFail($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time().'.'.$ext;
            $image->move('uploads/product', $imageName);
        }
        else{
            $imageName=$product->image;
        }
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price'=>$request->price,
            'image' => $imageName,
            'category_id'=>$request->category_id
        ]);
        if($product){
            return redirect()->route('admin.product.index')->with('message', 'product updated successfully');
        } else {
            return back()->withInput()->with('error', 'Failed to update product');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::findOrFail($id)->delete();
          return redirect()->route('admin.product.index')->with('message', 'Product deleted successfully');;
    }
}
