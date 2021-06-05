@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/users">Data Users</a></li>
                    <li class="breadcrumb-item"><a>Detail Users</a></li>
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
                    <!-- Profile Image -->
                    <div class="card">
                        <div class="card-body box-profile">
                            <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                src="data:image/png;base64,{{$users->photo}}"
                                alt="User profile picture" style="widget: 100px; height: 100px;">
                            </div>

                            <h3 class="profile-username text-center">{{$users->nama}}</h3>

                            <p class="text-muted text-center">{{$users->email}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Total Pesanan</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total Pembelian</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Total Retur Pembelian</b> <a class="float-right">13,287</a>
                            </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Hubungi</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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
                        <p class="text-muted">{{$users->id}}</p>
                        <hr>
                        
                        <strong><i class="fas fa-book mr-1"></i>Nama</strong>
                        <p class="text-muted">{{$users->nama}}</p>
                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>
                        <p class="text-muted">{{$users->email}}</p>
                        <hr>

                        <strong><i class="fas fa-lg fa-phone"></i> Telpon</strong>
                        <p class="text-muted">{{$users->telpon}}</p>
                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                        <p class="text-muted">{{$users->alamat}}</p>
                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Status Akun</strong>
                        @if ($users->status='1')
                        <p class="text-muted">Aktif</p>
                        @else
                        <p class="text-muted">Nonaktif</p>
                        @endif
                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Tanggal Regisrasi</strong>
                        <p class="text-muted">{{$users->created_at}}</p>
                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Tangal Update Profil</strong>
                        <p class="text-muted">{{$users->updated_at}}</p>

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
