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
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                            <h3 class="card-title">Data Mahasiswa</h3>
                            <div class="card-tools">
                                <a href="/mahasiswa/create" class="btn btn-primary">Tambah Mahasiswa</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="thead-light text-center align-middle">
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Foto</th>
                                        <th>Email </th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                        @foreach ($mahasiswa as $m )

                                        <tr class="align-middle">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $m->nim }}
                                            </td>
                                            <td>
                                                {{ $m->nama }}
                                            </td>
                                            <td>
                                                {{ $m->prodi->nama}}
                                            </td>
                                            <td>
                                                <img src="{{ asset('storage/'. $m->foto) }}" alt="" width="100">
                                            </td>
                                            <td>
                                                {{ $m->email }}
                                            </td>
                                            <td>
                                                <a href="{{ url('mahasiswa/' . $m->nim . '/edit') }}" class="btn btn-warning mb-2 mt-2">Edit</a>

                                                <form action="{{ url('mahasiswa/'. $m->nim) }}" class="d-inline" method="POST">
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