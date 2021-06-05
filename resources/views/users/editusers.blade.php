@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/users">Daftar Users</a></li>
                    <li class="breadcrumb-item"><a>Ubah Users</a></li>
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
            <h3 class="card-title">Ubah Data Users</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/users/{{$users->id}}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        value="{{$users->nama}}" placeholder="Masukan nama pengguna">
                    @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" disabled value="{{$users->email}}" placeholder="Masukan email pengguna">
                    @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="telpon">Telpon</label>
                    <input type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon"
                        name="telpon" value="{{$users->telpon}}" placeholder="Masukan telpon pengguna">
                    @error('telpon')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="photo">Gambar Profile</label><br>
                    <img id="photo" src="data:image/png;base64,{{$users->photo}}" alt="old imgage{{$users->photo}}" style="width: 100px; height: 100px;">
                    <input type="file" accept="image/*" class="form-control-file pt-2 @error('photo') is-invalid @enderror"
                        id="photo" name="photo" onchange="readURL(this, id)">
                    @error('photo')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="telpon">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" value="{{$users->password}}" placeholder="Masukan password pengguna">
                    @error('password')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="2"
                        placeholder="Masukan alamat rumah">{{$users->alamat}}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status pengguna</label>
                    <select class="form-control" id="status" name="status" value="{{$users->status}}">
                        <option>Aktif</option>
                        <option>Nonaktif</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
