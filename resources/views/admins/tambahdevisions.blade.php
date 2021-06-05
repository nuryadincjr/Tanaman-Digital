@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Bagian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/devisions">Data Bagian</a></li>
                    <li class="breadcrumb-item"><a>Tambah Bagian</a></li>
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
            <h3 class="card-title">Tambah Bagian Satuan</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/devisions">
                @csrf
                <div class="form-group">
                    <label for="bagian">Bagian</label>
                    <input type="text" class="form-control @error('bagian') is-invalid @enderror" id="bagian" name="bagian"
                        value="{{old('bagian')}}" placeholder="Masukan bagian tanaman">
                    @error('bagian')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="gaji">Gaji</label>
                    <input type="text" class="form-control @error('gaji') is-invalid @enderror" id="gaji" name="gaji"
                        value="{{old('gaji')}}" placeholder="Masukan gaji admin">
                    @error('gaji')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
