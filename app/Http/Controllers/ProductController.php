<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::select()->latest('id')->get();
        if (auth()->user()->is_admin == 1) {
            $user = User::find(Auth::user()->id);
            return view('db-admin.product.shop', compact('products', 'user'));
        }

        return view('product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = User::find(Auth::user()->id);
        $categories = Category::all();
        $sku = $this->generateUniqueCode();
        
        if ( ! $categories->isEmpty() ) {
            return view('db-admin.product.create', compact('categories', 'user', 'sku'));
        }

        $addcategory = 'The category is still empty, please create a category first. <a href="' . url('/db-admin/addcategory') . '" class="font-semibold text-blue-700 underline">Add Category Now!</a>';
        return redirect()->back()->with('status', $addcategory);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        //
        $path = $request->image->store('public/product');
        Product::create([
            'image' => $path,
            'qty' => $request->qty,
            'name' => $request->name,
            'brand' => $request->brand,
            'category_id' => $request->category_id,
            'color' => $request->color,
            'sku' => $request->sku,
            'price' => $request->price,
            'detail' => $request->detail,
        ]);
        return redirect()->route('db-admin.shop')->with('status','Product added successfully!');
    }

    public function generateUniqueCode()
    {
        $sku = 0;
        do {
            $sku = random_int(100000, 999999);
        } while (Product::where('sku', '=', $sku)->first());
  
        return $sku;
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
        $product = Product::find($id);
        $products = Product::limit(4)->latest('id')->get();
        return view('product.show', compact('product','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find(Auth::user()->id);
        $product = Product::find($id);
        $categories = Category::all();
        return view('db-admin.product.edit', compact('product', 'user', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        //
        $product = Product::find($id);

        if ($request->has('image')) {
            $path = $request->image->store('public/product');
            if($request->oldimage) {
                Storage::delete($request->oldimage);
            }
        } else {
            $path = $product->image;
        }

        $product->image = $path;
        $product->qty = $request->qty;
        $product->name = $request->name;
        $product->brand = $request->brand;
        $product->category_id = $request->category_id;
        $product->color = $request->color;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->detail = $request->detail;

        $product->update();

        return redirect()->route('db-admin.shop')->with('status','Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        Product::find($id)->delete();
        if($request->oldimage) {
            Storage::delete($request->oldimage);
        }
        return redirect()->route('db-admin.shop')->with('status','Product deleted successfully!');

    }
}
