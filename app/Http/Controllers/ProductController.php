<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;
use File;
use Illuminate\Support\Facades\Validator;

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
        return view('product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|min:3',
            'description' => 'required|max:50|min:10',
            'price' => 'required|max:6|min:3',
            'photo' => 'required|mimes:jpg,jpeg,png,gif',
        ]);
        if ($validator->fails()) {
            return redirect('product/create')
                ->withInput()
                ->withErrors($validator);
        }
        $photo = $request->file('photo');
        $upload = 'img/products/';
        $filename = time() . $photo->getClientOriginalName();
        $path = move_uploaded_file($photo->getPathName(), $upload . $filename);

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if ($path) {
            $product->photo = $filename;
        }
        $product->save();

        return redirect('product/create');
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
        $products = array();

        foreach (Product::all() as $product) {
            $products[$product->id] = $product->name;
        }
        $products = Product::findOrFail($id);


        return view('product.edit')
            ->with('product', $product);
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
        $validator = Validator::make($request->all(), [

            'name' => 'required|max:20|min:3',
            'description' => 'required|max:50|min:10',
            'price' => 'required|max:6|min:3',
            'photo' => 'required|mimes:jpg,jpeg,png,gif',
        ]);
        if ($validator->fails()) {
            return redirect('product/' . $id . '/edit')
                ->withInput()
                ->withErrors($validator);
        }
        // Create The Post
        if ($request->file('photo') != "") {
            $image = $request->file('photo');
            $upload = 'img/products/';
            $filename = time() . $image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload . $filename);
        }
        $product = Product::find($id);
        $product->name = $request->Input('name');
        $product->description = $request->Input('description');
        $product->price = $request->Input('price');
        if (isset($filename)) {
            $product->photo = $filename;
        }
        $product->save();
        Session::flash('product_update', 'Product is updated');
        return redirect('product/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();
        Session::flash('Proudct_delete', 'Product is Deleted');
        return redirect('/product');
    }
}
