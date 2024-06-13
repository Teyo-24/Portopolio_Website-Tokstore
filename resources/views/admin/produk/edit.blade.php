@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('produk.update', $produk->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar Produk</label>
                                    @if ($produk->gambar)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar Produk"
                                                width="150">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control py-1" id="gambar" name="gambar">
                                </div>
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori_id"
                                        aria-label="Default select example" required>
                                        <option selected disabled>Pilih Kategori</option>
                                        @foreach ($kategori as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $produk->kategori_id ? 'selected' : '' }}>
                                                {{ $item->nama_kategori }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $produk->nama }}" placeholder="Input Nama Produk" required>
                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga Barang</label>
                                    <input type="number" class="form-control" id="harga" name="harga"
                                        value="{{ $produk->harga }}" placeholder="Input Harga" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                                    <textarea class="form-control" name="deskripsi" id="editor" cols="50" rows="10">{{ $produk->deskripsi }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('produk.index') }}" class="btn btn-secondary ms-2">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
