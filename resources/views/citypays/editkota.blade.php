@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Kota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/kota">Daftar Kota</a></li>
                    <li class="breadcrumb-item"><a>Ubah Kota</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Main content-->
<section class="container-fluid">
    <!-- Form Element sizes -->
    <div class="card card-blue">
        <div class="card-header">
            <h3 class="card-title">Ubah kota Tujuan Pengiriman</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/kota/{{$ongkir->id}}">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota"
                        value="{{$ongkir->kota}}" placeholder="Masukan kota tujuan">
                    @error('kota')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
                        value="{{$ongkir->harga}}" placeholder="Masukan harga ongkos kirim">
                    @error('harga')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
