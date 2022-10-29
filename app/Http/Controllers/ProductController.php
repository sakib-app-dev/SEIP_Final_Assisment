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
            'name'=>$request->name,
            'category'=>$request->category,
            'brand'=>$request->brand,
            'price'=>$request->price,
            'description'=>$request->description,
            'status'=>$request->status ? true : false,
        ]);
       
        return redirect()
        ->route('product.index')
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
        ->route('product.index')
        ->with('message','Delete Successfully');
    }

    public function uploadImage($file)
    {
        $fileName = date('y-m-d').'-'.time().'.'.$file ->getClientOriginalExtension();
       
        $file->move(storage_path('app/public/products'), $fileName);

        return $fileName;
    }

   

 




}
