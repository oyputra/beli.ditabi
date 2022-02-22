@extends('layouts.db-admin')

@section('content')
    @if ( ! $categories->isEmpty() )
        <div class="flex justify-between items-center mb-5">
            <p>The shop has {{ count($categories) }} categories</p>
            <a href="{{ route('db-admin.addcategory') }}" class="btn btn-primary hover:shadow-xl animation">Add Category</a>
        </div>

        <div class="grid lg:grid-cols-3 gap-3 w-full">

            @foreach ($categories as $category)
                <div class="card">
                    <div class="card-content">
                        <div class="relative group">
                            <img class="card-img-top img-fluid object-cover" src="{{ Storage::url($category->image) }}" alt="Card image cap" style="height: 20rem" />
                            <div class="absolute rounded-t-lg inset-0 bg-black bg-opacity-40 flex flex-col items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <div class="grid grid-cols-2 gap-3">
                                    <a href="{{ route('db-admin.changecategory', $category->id) }}" class="text-white text-xs lg:text-md px-4 py-1 rounded flex items-center justify-center border border-white transition animation">
                                        Change
                                    </a>
                                    <form action="{{ route('db-admin.destroycategory', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="oldimage" value="{{ $category->image }}">
                                        <button type="submit" class="w-full text-white text-xs lg:text-md px-4 py-1 rounded flex items-center justify-center transition border border-white animation">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <p class="bg-primary text-center hover:bg-white text-white hover:text-primary py-2 rounded-b-lg block w-full capitalize">{{ $category->name }}</p>
                    </div>
                </div>
            @endforeach
            
        </div>
    @else
        <div class="card">
            <div class="card-body">
                <div class="">
                    <div class="flex flex-col justify-center">
                        <div class="text-center">
                            <p>There is currently no category available!</p>
                            <a href="{{ route('db-admin.addcategory') }}" class="btn btn-primary my-3 focus:ring-0 focus:outline-none">Add Category Now!</a>
                        </div>
                        <div class="flex justify-center">
                            <div class="lg:w-6/12">
                                <img src="{{ asset('images/null-order.gif') }}" class="card-img-top img-fluid" alt="singleminded">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection