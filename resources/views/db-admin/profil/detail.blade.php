@extends('layouts.db-admin')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height flex justify-center">

            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header flex justify-between">
                        <h3 class="text-xl">Account</h2>
                        <a href="{{ route('db-admin.changedetail') }}" class="btn btn-primary bg-primary rounded-pill me-1 mb-1 focus:ring-0 hover:shadow-xl animation">Change</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal">
                                <div class="form-body">
                                    <div class="space-y-3">
                                        <div class="flex items-center space-x-4">
                                            <div class="col-md-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person h-10 w-10" viewBox="0 0 16 16">
                                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                                </svg>
                                            </div>
                                            <div class="col-md-10">
                                                <p>{{ Auth::user()->name }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <div class="col-md-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-envelope h-10 w-10" viewBox="0 0 16 16">
                                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                                </svg>
                                            </div>
                                            <div class="col-md-10">
                                                <p>{{ Auth::user()->email }}</p>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <div class="col-md-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-badge h-10 w-10" viewBox="0 0 16 16">
                                                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                                                </svg>
                                            </div>
                                            <div class="col-md-10">
                                                @if (Auth::user()->is_admin == 1)
                                                    <p>Admin</p>
                                                @else
                                                    <p>Customer</p>
                                                @endif
                                            </div>
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