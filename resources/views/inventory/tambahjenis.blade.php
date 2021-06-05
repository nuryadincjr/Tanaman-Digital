@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Jenis</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/jenis">Data Jenis</a></li>
                    <li class="breadcrumb-item"><a>Tambah Jenis</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="container-fluid">
    <!-- Form Element sizes -->
    <div class="card card-blue">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Jenis</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/jenis">
                @csrf
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <input type="text" class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis"
                        value="{{old('jenis')}}" placeholder="Masukan jenis tanaman">
                    @error('jenis')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
