@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a>Daftar Users</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- Main content -->
<section class="content">
    <!-- Main content -->
    <section class="container-fluid" style="margin-bottom: 10px;">
        <div class="row">
            <div class="col-2">
                <a href="/users/create" class="btn btn-success">Tambah Users</a>
            </div>
            <div class="col-4 align-self-end">
                <input type="search" class="form-control form-control-md" placeholder="Type your keywords here"
                    aria-controls="example">
            </div>
        </div>
    </section>

    <section class="container-fluid">
        <div class="row">
            <div class="col-12">
                @if (session('status'))
                <div class="alert alert-info alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-info"></i> Inpormasi!</h5>
                  {{ session('status') }}
                </div>
                @endif
                <div class="card card-blue">
                    <div class="card-header">
                        <h3 class="card-title">Data pengguna tanaman hias</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telpon</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Tanggal buat</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $i)
                                <tr>
                                <th scope="tow">{{ $loop-> iteration}}</th>
                                    <td>{{ $i->id}}</td>
                                    <td>{{ $i->nama}}</td>
                                    <td><img width="50" height="50" alt="null" src="data:image/png;base64,{{$i->photo}}"></td>
                                    <td>{{ $i->email}}</td>
                                    <td>{{ $i->telpon}}</td>
                                    @if ($i->status='1')
                                        <td>Aktif</td>
                                    @else
                                        <td>Nonaktif</td>
                                    @endif
                                    <td>{{ $i->created_at}}</td>
                                    <h1>{{$i->images}}</h1>
                                    <td>
                                        <a href="/users/{{$i->id}}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="/users/{{$i->id}}/edit" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="/users/{{$i->id}}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="container">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
