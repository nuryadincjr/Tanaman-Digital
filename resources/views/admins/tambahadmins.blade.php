@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/admins">Daftar Admin</a></li>
                    <li class="breadcrumb-item"><a>Tambah Admin</a></li>
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
            <h3 class="card-title">Tambah Data Admin</h3>
        </div>
        <div class="card-body">
            <form method="post" action="/admins" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                        value="{{old('nama')}}" placeholder="Masukan nama admin">
                    @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="bagian_id">Bagian</label>
                    <select class="form-control" id="bagian_id" name="bagian_id" value="{{old('bagian_id')}}">
                        @foreach ($devisions as $item)
                        <option value="{{$item->id}}">{{$item->bagian}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{old('email')}}" placeholder="Masukan email admin">
                    @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" value="{{old('password')}}" placeholder="Masukan password admin">
                    @error('password')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="telpon">Telpon</label>
                    <input type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon"
                        name="telpon" value="{{old('telpon')}}" placeholder="Masukan telpon admin">
                    @error('telpon')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="2"
                        placeholder="Masukan alamat rumah">{{old('alamat')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status admin</label>
                    <select class="form-control" id="status" name="status" value="{{old('status')}}">
                        <option>Aktif</option>
                        <option>Nonaktif</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pohoto">Gambar Profile</label><br>
                    <img id="photo" src="{{asset('img/user.png')}}" alt="add your image profile" style="width: 100px;">
                    <input type="file" accept="image/*" class="form-control-file pt-2 @error('photo') is-invalid @enderror"
                        id="photo" name="photo" onchange="readURL(this, id)">
                    @error('photo')<div class="invalid-feedback">{{$message}}</div>@enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
</section>
@endsection
