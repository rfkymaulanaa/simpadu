@extends('template.main')

@section('content')
<main class="app-main">

    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('mahasiswa') }}">Mahasiswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>

    <div class="card card-warning card-outline mb-4 mt-4 mx-4 shadow">
        <!--begin::Header-->
        <div class="card-header">
            <div class="card-title">Tambah Mahasiswa</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form action="{{ url('mahasiswa')  }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!--begin::Body-->
            <div class="card-body">
                <div class="row mb-3">
                    <label for="nim" class="col-sm-2 col-form-label">Nim</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nim') is-invalid
                        @enderror" id="nim" name="nim" value="{{ old('nim') }}"  />
                        @error('nim')
                            <div class="invalid-feedback" >
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control @error('password') is-invalid
                        @enderror" id="password" name="password"   />
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama') is-invalid
                        @enderror" id="nama" name="nama" value="{{ old('nama') }}" />
                        @error('nama')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('tanggalLahir') is-invalid
                        @enderror" id="tanggalLahir" name="tanggalLahir" value="{{ old('tanggalLahir') }}" />
                        @error('tanggalLahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="telp" class="col-sm-2 col-form-label">No Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('telp') is-invalid
                        @enderror" id="telp" name="telp" value="{{ old('telp') }}" />
                        @error('telp')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control @error('email') is-invalid
                            
                        @enderror" id="email" name="email" value="{{ old('email') }}" />
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_prodi" class="col-sm-2 col-form-label">Prodi</label>
                    <div class="col-sm-10">
                        <select name="id_prodi" id="id_prodi" class="form-control">
                        @foreach ($prodi as $item )
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                        </select>
                    </div>
                        <div class="row mb-3 mt-3">
                            <label for="foto" class="col-sm-2 col-form-label">Upload Foto</label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control @error('foto') is-invalid
                                @enderror" id="foto" name="foto"  />
                                @error('foto')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                </div>

            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" value="Simpan" class="btn btn-primary">Simpan</button>
                <a href="{{ url('mahasiswa') }}" class="btn btn-danger float-end">Kembali</a>
            </div>
            <!--end::Footer-->
        </form>
        <!--end::Form-->
    </div>
</main>
@endsection