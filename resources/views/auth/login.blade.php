@extends('layouts.sub')

@section('container')
    <div class="container">
        <div class="card border-0 shadow-lg my-5" style="max-width: 500px; margin: 0 auto;">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="p-5">
                        <div class="text-center">
                            @if (session('error'))
                                <div class="alert alert-danger d-flex justify-content-between align-items-center">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close flex-end" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success d-flex justify-content-between align-items-center">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close flex-end" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <h1 class="h4 text-gray-900 mb-4">Silahkan Login untuk masuk ke aplikasi</h1>
                        </div>
                        <form class="user" action="{{ route('login.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="login" class="form-control form-control-custom mb-4"
                                    id="login" aria-describedby="login" placeholder="Masukkan username atau email anda">
                                @error('login')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-custom mb-4"
                                    id="exampleInputPassword" placeholder="Masukkan password anda">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group text-end pe-3">
                                <button type="submit" class="btn btn-primary py-2">
                                    Login
                                </button>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="{{ route('forgot-password') }}">Lupa Password?</a>
                            |
                            <a class="small" href="{{ route('register') }}">Buat akun baru!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
