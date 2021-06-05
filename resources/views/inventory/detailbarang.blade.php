@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Barang</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/barang">Data Barang</a></li>
                    <li class="breadcrumb-item"><a>Detail Barang</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="container-fluid">
    <!-- Default box -->
    <div class="card card-primary card-outline">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="col-12">
                    <img src="data:image/png;base64,{{$inventory->photo1}}" class="product-image" alt="Product Image" style="width: 600px; height: 400px;">
                    </div>
                    <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="data:image/png;base64,{{$inventory->photo1}}" alt="Product Image"></div>
                    <div class="product-image-thumb"><img src="data:image/png;base64,{{$inventory->photo2}}" alt="Product Image"></div>
                </div>
                </div>
                <div class="col-12 col-sm-6">
                    <!-- About Me Box -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Info Barang</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="far fa-file-alt mr-1"></i>ID</strong>
                        <p class="text-muted">{{$inventory->id}}</p>
                        <hr>
                        
                        <strong><i class="fas fa-book mr-1"></i>Nama</strong>
                        <p class="text-muted">{{$inventory->nama}}</p>
                        <hr>

                        <strong><i class="fas fa-book mr-1"></i>Jenis</strong>
                        <p class="text-muted">{{$inventory->types->jenis}}</p>
                        <hr>

                        <strong><i class="fas fa-book mr-1"></i> Unit</strong>
                        <p class="text-muted">{{$inventory->units->unit}}</p>
                        <hr>

                        <strong><i class="fas fa-tag mr-1"></i> Harga</strong>
                        <p class="text-muted">{{$inventory->harga}}</p>
                        <hr>

                        <strong><i class="fas fa-book mr-1"></i> Stok</strong>
                        <p class="text-muted">{{$inventory->stok}}</p>
                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Keterangan</strong>
                        <p class="text-muted">{{$inventory->Keterangan}}</p>
                        <hr>
                        
                        <strong><i class="fas fa-pencil-alt mr-1"></i> Tanggal Buat</strong>
                        <p class="text-muted">{{$inventory->created_at}}</p>
                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Tangal Update</strong>
                        <p class="text-muted">{{$inventory->updated_at}}</p>

                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->  
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
@endsection
