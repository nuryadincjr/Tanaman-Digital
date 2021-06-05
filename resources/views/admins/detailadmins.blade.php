@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admins">Data Admin</a></li>
                    <li class="breadcrumb-item"><a>Detail Admin</a></li>
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
                <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    Toko Tanaman Ditital ID
                </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                            <h2 class="lead"><b>{{$admins->nama}}</b></h2>
                            <p class="text-muted text-sm"><b>Bagian: </b>{{$admins->devisions->bagian}} </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: {{$admins->nama}}</li>
                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$admins->telpon}}</li>
                            </ul>
                            </div>
                            <div class="col-5 text-center">
                            <img src="data:image/png;base64,{{$admins->photo}}" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                        </div>
                        </div>
                        <div class="card-footer">
                        <div class="text-right">
                            <a href="#" class="btn btn-sm bg-teal">
                            <i class="fas fa-comments"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-user"></i> Cetak Kartu
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                      <!-- About Me Box -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Info Profil</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="far fa-file-alt mr-1"></i>ID</strong>
                        <p class="text-muted">{{$admins->id}}</p>
                        <hr>
                        
                        <strong><i class="fas fa-book mr-1"></i>Nama</strong>
                        <p class="text-muted">{{$admins->nama}}</p>
                        <hr>

                        <strong><i class="fas fa-book mr-1"></i>Bagian</strong>
                        <p class="text-muted">{{$admins->devisions->bagian}}</p>
                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
                        <p class="text-muted">{{$admins->email}}</p>
                        <hr>

                        <strong><i class="fas fa-lg fa-phone"></i> Telpon</strong>
                        <p class="text-muted">{{$admins->telpon}}</p>
                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                        <p class="text-muted">{{$admins->alamat}}</p>
                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Status Akun</strong>
                        @if ($admins->status='1')
                        <p class="text-muted">Aktif</p>
                        @else
                        <p class="text-muted">Nonaktif</p>
                        @endif
                        
                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Tanggal Regisrasi</strong>
                        <p class="text-muted">{{$admins->created_at}}</p>
                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Tangal Update Profil</strong>
                        <p class="text-muted">{{$admins->updated_at}}</p>

                    </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->  
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
