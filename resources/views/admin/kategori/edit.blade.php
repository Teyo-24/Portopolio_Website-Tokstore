@extends('layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Kategori</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('kategori.update', $kategori->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Nama Kategori</label>
                                    <input type="text" class="form-control" id="kategori" name="nama_kategori"
                                        placeholder="Input Kategori" value="{{ $kategori->nama_kategori }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('kategori.index') }}" class="btn btn-secondary ms-2">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
