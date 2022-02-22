<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Product::select('category_id')->groupBy('category_id')->latest('id')->get();
        $products = Product::limit(4)->latest('id')->get();

        return view('home', compact('products', 'categories'));
    }

    public function products(Request $request)
    {
        $products = Product::all();
        $filters = Product::select('category_id')->groupBy('category_id')->get();
        $relatedproducts = Product::limit(4)->latest('id')->get();

        if( ! $request->category_id ) {
            return view('product', compact('products', 'filters', 'relatedproducts'));
        }
                
        $products = Product::where('category_id', $request->category_id)->get();

        return view('product', compact('products', 'filters', 'relatedproducts'));
    }

    public function aboutus()
    {
        return view('aboutus');
    }

    public function contactus()
    {
        return view('contactus');
    }
}
