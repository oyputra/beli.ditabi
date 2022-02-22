@extends('layouts.db-admin')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height flex justify-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-xl">Password of Account</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <form action=""></form>
                                    <form action="{{ route('db-admin.updatepassword') }}" enctype="multipart/form-data" method="POST">
                                        <div class="space-y-3">
                                            @csrf
                                            @method('PUT')
                                            <div class="row items-center">
                                                <div class="col-md-4">
                                                    <label>Current Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input name="old_password" type="password" class="@error('old_password') border-primary @enderror input-box focus:border focus:border-blue-700">
                                                    @error('old_password')
                                                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row items-center">
                                                <div class="col-md-4">
                                                    <label>New Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input name="password" type="password" class="@error('password') border-primary @enderror input-box focus:border focus:border-blue-700">
                                                    @error('password')
                                                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row items-center">
                                                <div class="col-md-4">
                                                    <label>Confirmation Password</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input name="password_confirmation" type="password" class="@error('password_confirmation') border-primary @enderror input-box focus:border focus:border-blue-700">
                                                    @error('password_confirmation')
                                                        <strong class="block mt-1 text-xs text-primary">{{ $message }}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary bg-primary rounded-pill me-1 mb-1 focus:ring-0 hover:shadow-xl animation">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection