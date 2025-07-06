@extends('template.main')

@section('content')

    <main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Prodi</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Prodi</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Data Prodi</h3>
                            <div class="card-tools">
                                <a href="{{ url('prodi/create') }}" class="btn btn-primary">Tambah Prodi</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="thead-light text-center align-middle">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Prodi</th>
                                        <th>Nama Kaprodi</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                        
                                </thead>
                                <tbody>

                                        @foreach ($prodi as $p )

                                        <tr class="align-middle">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $p->nama }}
                                            </td>
                                            <td>
                                                {{ $p->kaprodi }}
                                            </td>
                                            <td>
                                                {{ $p->jurusan }}
                                            </td>
                                            <td>
                                                <a href="{{ url('prodi/' . $p->id . '/edit') }}" class="btn btn-warning mb-2 mt-2">Edit</a>

                                                <form action="{{ url('prodi/'. $p->id) }}" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"  onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger mb-2 mt-2">Delete</button>
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

                <!-- /.col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
@endsection