@extends('template.main')

@section('content')
<main class="app-main">

    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit prodi</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('prodi') }}">prodi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
            <div class="card-title">Edit prodi</div>
        </div>
        <!--end::Header-->
        <!--begin::Form-->
        <form action="{{ url('prodi/'.$prodi->id)  }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!--begin::Body-->
            <div class="card-body">
                
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Prodi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama') is-invalid
                        @enderror" id="nama" name="nama" value="{{ $prodi->nama }}"  />
                        @error('nama')
                            <div class="invalid-feedback" >
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kaprodi" class="col-sm-2 col-form-label">Kaprodi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kaprodi') is-invalid
                        @enderror" id="kaprodi" name="kaprodi" value="{{ $prodi->kaprodi }}"  />
                        @error('kaprodi')
                            <div class="invalid-feedback" >
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('jurusan') is-invalid
                        @enderror" id="jurusan" name="jurusan" value="{{ $prodi->jurusan }}"  />
                        @error('jurusan')
                            <div class="invalid-feedback" >
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer">
                <button type="submit" value="Simpan" class="btn btn-primary">Simpan</button>
                <a href="{{ url('prodi') }}" class="btn btn-danger float-end">Kembali</a>
            </div>
            <!--end::Footer-->
        </form>
        <!--end::Form-->
    </div>
</main>
@endsection