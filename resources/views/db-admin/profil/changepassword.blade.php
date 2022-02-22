@extends('layouts.db-admin')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height flex justify-center">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-xl">Password of Account</h3>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="space-y-3">
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>Current Password</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="password" class="input-box" name="">
                                            </div>
                                        </div>
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>New Password</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="password" class="input-box" name="">
                                            </div>
                                        </div>
                                        <div class="row items-center">
                                            <div class="col-md-4">
                                                <label>Confirmation Password</label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="password" class="input-box" name="">
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary bg-primary rounded-pill me-1 mb-1 focus:ring-0 hover:shadow-xl animation">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection