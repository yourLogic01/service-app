@extends('layouts.sub')

@section('container')
<div class="container py-3">
    <div class="card border-0 shadow-lg mb-5" style="max-width: 500px; margin: 0 auto;">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="p-5">
                    <div class="text-center">
                        @if (session('error'))
                            <div class="alert alert-danger d-flex justify-content-between align-items-center">
                                {{ session('error') }}
                                <button type="button" class="btn-close flex-end" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <h1 class="h4 text-gray-900 mb-4">Register Account</h1>
                    </div>
                    <form class="user" action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-custom mb-4" id="name"
                                aria-describedby="name" value="{{ old('name') }}" placeholder="Enter full name...">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control form-control-custom mb-4" id="username"
                                aria-describedby="username" value="{{ old('username') }}" placeholder="Enter username...">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-custom mb-4" id="email"
                                aria-describedby="email" value="{{ old('email') }}" placeholder="Enter email...">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" name="phone" class="form-control form-control-custom mb-4" id="phone"
                                aria-describedby="phone" value="{{ old('phone') }}" placeholder="Enter phone number..." min="0">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-custom mb-4"
                                id="exampleInputPassword" placeholder="Enter password...">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group text-end pe-3">
                            <button type="submit" class="btn btn-primary py-2">
                                Register
                            </button>
                        </div>
                    </form>
                    <hr>
                    <div class="form-group text-center">
                        <a class="small" href="{{ route('login') }}">I have an account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection