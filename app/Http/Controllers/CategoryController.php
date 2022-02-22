<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::find(Auth::user()->id);
        $categories = Category::latest('id')->get();
        return view('db-admin.category.index', compact('categories', 'user'));
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
        return view('db-admin.category.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        //
        $path = $request->image->store('public/category');
        Category::create([
            'image' => $path,
            'name' => $request->name,
        ]);
        return redirect()->route('db-admin.category')->with('status','Category added successfully!');
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
        //
        $user = User::find(Auth::user()->id);
        $category = Category::find($id);
        return view('db-admin.category.edit', compact('category', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        //
        $category = Category::find($id);

        if ($request->has('image')) {
            $path = $request->image->store('public/category');
            if($request->oldimage) {
                Storage::delete($request->oldimage);
            }
        } else {
            $path = $category->image;
        }

        $category->image = $path;
        $category->name = $request->name;

        $category->update();

        return redirect()->route('db-admin.category')->with('status','Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        //
        Category::find($id)->delete();

        if($request->oldimage) {
            Storage::delete($request->oldimage);
        }

        return redirect()->route('db-admin.category')->with('status','Category deleted successfully!');
    }
}
