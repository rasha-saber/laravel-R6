<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\Common;

class ProductController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function indexR() {
     
       
        $products = Product::orderBy('created_at', 'desc')->take(3)->get();
        return view('index', compact('products')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add_products');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
       
        $data['image'] = $this->uploadFile($request->image, 'assets/images');



        Product::create($data); 
        return redirect()->route('products.index');
    }
   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
