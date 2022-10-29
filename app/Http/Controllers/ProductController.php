<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product=Product::all();
        return view('admin.products.index',compact('product'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.products.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('hello');
        Product::create([
            'name'=>$request->name,
            'category'=>$request->category,
            'brand'=>$request->brand,
            'description'=>$request->description,
            'price'=>$request->price,
            'status'=>$request->status ? true : false,
            
            'image' =>  $this->uploadImage($request->file('image'))
        ]);
    
        return redirect()
        ->route('product.index')
        ->with('message','Create Successfully...');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $product->update([
            'title'=>$request->product_title,
            'category'=>$request->category,
            'is_active'=>$request->is_active ? true : false,
            'description'=>$request->description
        ]);
       
        return redirect()
        ->route('admin.product.index')
        ->with('message','Updated Successfully...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()
        ->route('admin.product.index')
        ->with('message','Delete Successfully');
    }

    public function uploadImage($file)
    {
        $fileName = date('y-m-d').'-'.time().'.'.$file ->getClientOriginalExtension();
       
        $file->move(storage_path('app/public/products'), $fileName);

        return $fileName;
    }

    public function productTrash()
    {
        $product=Product::onlyTrashed()->get();
        return view('admin.products.trash',compact('product'));
    }

    public function productRestore($id)
    {
        $product=Product::onlyTrashed()->find($id);
        $product->restore();
        return redirect()
        ->route('product.trash')
        ->with('message','Restore Successfully');
    }

    public function productDelete($id)
    {
        $product=Product::onlyTrashed()->find($id);
        $product->forceDelete();
        return redirect()
        ->route('product.trash')
        ->with('message','Delete Successfully');
    }





}
