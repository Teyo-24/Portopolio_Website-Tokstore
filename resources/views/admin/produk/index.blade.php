@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
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

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">DataTable with default features</h3>
                            <div class="ml-auto">
                                <a href="{{ route('produk.create') }}"><button type="button" class="btn btn-primary">Tambah
                                        Barang</button></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        {{-- <th>Kategori</th> --}}
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produk as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{ $item->nama_kategori }}</td> --}}
                                            <td>{{ $item->nama }}</td>
                                            <td> Rp. {{ $item->harga }}</td>
                                            <td>{{ Str::limit(strip_tags($item->deskripsi), 70) }}</td>
                                            <td style="display: flex; align-items: center;">
                                                <a href="{{ route('produk.show', $item->id) }}" type="button"
                                                    class="btn btn-warning mr-2">
                                                    <i class="fas fa-folder"></i> Lihat
                                                </a>
                                                <a href="{{ route('produk.edit', $item->id) }}"
                                                    class="btn btn-primary mr-2">
                                                    <i class="fas fa-pencil-alt"></i> Ubah
                                                </a>
                                                <form method="POST" action="{{ route('produk.destroy', $item->id) }}"
                                                    style="margin: 0;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Anda yakin ingin menghapus data ini?')">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- /.content -->
@endsection
