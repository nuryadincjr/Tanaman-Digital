@extends('shoptamp.template')

@section('content')
<section class="content-header bg-while">
    <main class="container">
        <div class="container-fluid">
            <h1 class="display-4 fst-italic">Edit Profile</h1>
            <p class="lead my-3">Sesuaikan alamat lokasi anda dengan lokasi penagihan!</p>

            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/profil">Profil</a></li>
                <li class="breadcrumb-item"><a>Edit Profil</a></li>
            </ol>
        </div>
        <div class="container">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img id="photo" src="data:image/png;base64,{{$users->photo}}"
                                        alt="{{$users->nama}}" class="rounded-circle" width="150" height="150">
                                    <div class="mt-3">
                                        <h4>{{$users->email}}</h4>
                                        <p class="text-secondary mb-1">Register at: {{$users->created_at}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form method="post" action="/user/{{$users->id}}" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Nama Lengkap</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                name="nama" value="{{$users->nama}}"
                                                placeholder="Masukan nama pengguna">
                                            @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email"
                                                class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" disabled value="{{$users->email}}"
                                                placeholder="Masukan email pengguna">
                                            @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Telpon</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text"
                                                class="form-control @error('telpon') is-invalid @enderror"
                                                id="telpon" name="telpon" value="{{$users->telpon}}"
                                                placeholder="Masukan telpon pengguna">
                                            @error('telpon')<div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Alamat</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea class="form-control" id="alamat" name="alamat" rows="2"
                                                placeholder="Masukan alamat rumah">{{$users->alamat}}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Photo Profil</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" accept="image/*"
                                                class="form-control-file pt-2 @error('photo') is-invalid @enderror"
                                                id="photo" name="photo" onchange="readURL(this, id)">
                                            @error('photo')<div class="invalid-feedback">{{$message}}</div>@enderror
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    </main>
</section>
@endsection
