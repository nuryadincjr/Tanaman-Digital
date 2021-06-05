@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Data Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admins">Data Admin</a></li>
                    <li class="breadcrumb-item"><a>Ubah Data Admin</a></li>
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
            <h3 class="card-title">Ubah Data Admin</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/admins/{{$admins->id}}" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        value="{{$admins->nama}}" placeholder="Masukan nama admin">
                    @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="bagian_id">Bagian</label>
                    <select class="form-control" id="bagian_id" name="bagian_id">
                        <option value="{{$admins->bagian_id}}">{{$admins->devisions->bagian}}</option>
                        @foreach ($devisions as $item)
                        <option value="{{$item->id}}">{{$item->bagian}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input disabled type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{$admins->email}}" placeholder="Masukan email admin">
                    @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" value="{{$admins->password}}" placeholder="Masukan password admin">
                    @error('password')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="telpon">Telpon</label>
                    <input type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon"
                        name="telpon" value="{{$admins->telpon}}" placeholder="Masukan telpon admin">
                    @error('telpon')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="2"
                        placeholder="Masukan alamat rumah">{{$admins->alamat}}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status admin</label>
                    <select class="form-control" id="status" name="status" value="{{$admins->status}}">
                        <option>Aktif</option>
                        <option>Nonaktif</option>
                    </select>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="photo">Gambar Profil</label><br>
                        <img id="photo" src="data:photo/png;base64,{{$admins->photo}}" alt="add your photo" style="width: 100px;">
                        <input type="file" accept="image/*" class="form-control-file pt-2 @error('photo') is-invalid @enderror"
                            id="photo" name="photo" onchange="readURL(this, id)">
                        @error('photo1')<div class="invalid-feedback">{{$message}}</div>@enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
