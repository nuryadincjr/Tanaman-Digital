@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Unit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/unit">Data Unit</a></li>
                    <li class="breadcrumb-item"><a>Ubah Unit</a></li>
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
            <h3 class="card-title">Ubah Unit Satuan Tanaman</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/unit/{{$units->id}}">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="unit">Units</label>
                    <input type="text" class="form-control @error('unit') is-invalid @enderror" id="unit" name="unit"
                        value="{{$units->unit}}" placeholder="Masukan unit tanaman">
                    @error('unit')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
