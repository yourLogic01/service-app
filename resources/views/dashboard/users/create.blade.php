@extends('dashboard.layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data User</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form class="form-card p-4" action="{{ route('admin.userStore') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label class="form-control-label">Nama Lengkap<span class="text-danger"> *</span>
                            </label>
                            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}"
                                placeholder="Masukkan Nama Lengkap">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label class=" form-control-label">Username<span class="text-danger"> *</span>
                            </label>
                            <input class="form-control" type="text" id="username" name="username" value="{{ old('username') }}"
                                placeholder="Masukkan Username">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label class="form-control-label">Phone<span class="text-danger"> *</span>
                            </label>
                            <input class="form-control" type="number" id="phone" name="phone" value="{{ old('phone') }}"
                                placeholder="Masukkan phone">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label class=" form-control-label">Email<span class="text-danger"> *</span>
                            </label>
                            <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan Email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label class=" form-control-label">Password<span class="text-danger"> *</span>
                            </label>
                            <input class="form-control" type="password" id="password" name="password" value="{{ old('password') }}"
                                placeholder="Masukkan Password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-3 flex-column d-flex">
                            <label class="form-control-label">Role<span class="text-danger"> *</span></label>
                            <select class="form-select @error('role') is-invalid @enderror" aria-label="role" id="role"
                                name="role">
                                <option selected disabled>- Pilih role -</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex">
                            <label class="form-control-label">Thumbnail<span class="text-danger"> *</span>
                            </label>
                            <input class="form-control" type="file" name="thumbnail" id="thumbnail">
                            @error('thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end py-4 px-4">
                        <div class="form-group col-sm-2">
                            <a href="{{ route('admin.userIndex') }}" class="btn btn-secondary btn-block">Cancel</a>
                        </div>
                        <div class="form-group col-sm-2">
                            <button type="submit" class="btn btn-primary btn-block">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
