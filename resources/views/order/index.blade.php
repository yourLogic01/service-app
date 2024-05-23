@extends('layouts.sub')

@section('container')

{{-- <div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-3">Order Jasa Reparasi</h2>
            
        </div>
    </div>
</div> --}}
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <h1 class="h2">Order Jasa Reparasi</h1>
</div>
<div class="col-lg-10">
    <div class="card shadow mb-5">
        <div class="card-body">
            <form method="post" action="/order" class="mb-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" placeholder="Masukkan Nama" class="form-control form-control-custom @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}"> 
                  @error('name')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">Alamat</label>
                  <input type="text" placeholder="Masukkan Alamat Anda" class="form-control form-control-custom @error('address') is-invalid @enderror" id="address" name="address" required value="{{ old('address') }}">
                  @error('address')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="date" class="form-label">Tanggal Reservasi</label>
                  <input type="date" class="form-control form-control-custom @error('address') is-invalid @enderror" id="date" name="date" required value="{{ old('address') }}">
                  @error('address')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                      @foreach ($categories as $category)
                      @if (old('category_id')== $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                      @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif
                      
                      @endforeach
                    </select>
                  </div> --}}
                <div class="mb-3">
                    <div class="row">
                  <div class="col-5">
                    <label for="condition" class="form-label">Kondisi</label>
                    <select class="form-select" name="condition_id">
                        <option value="rusak">Rusak</option>
                        <option value="mati">Mati</option>
                        <option value="malfungsi">Salah satu fungsi tidak bekerja</option>
                    </select>
                  </div>
                  <div class="col-5">
                    <label for="item" class="form-label">Jenis Barang</label>
                    <select class="form-select" name="item_id">
                        <option value="kulkas">Kulkas</option>
                        <option value="mesin cuci">Mesin Cuci</option>
                        <option value="kipas angin">Kipas Angin</option>
                        <option value="rice cooker">Rice cooker</option>
                    </select>
                  </div>
                </div>
                </div>
                <div class="mb-3">
                  <label for="detail" class="form-label">Jelaskan keadaan barang anda secara detail!</label>
                  @error('detail')
                  <p class="text-danger">{{ $message }}</p>
                  @enderror
                  <input id="detail" type="hidden" name="detail" value="{{ old('detail') }}">
                  <trix-editor input="detail"></trix-editor>
                </div>
                <div class="mb-3">
                    <label for="itemPic" class="form-label">Input Gambar Barang anda <span class="text-muted">(optional)</span></label>
                    <input class="form-control" type="file" id="itemPic">
                </div>
                <button type="submit" class="btn btn-primary mt-3 py-3">Create Order</button>
            </form>
        </div>
      </div>
</div>
<script>
    document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
  })
</script>
@endsection