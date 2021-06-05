@extends('Layouttemp.template')

@section('page-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Bagian</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a>Data Bagian</a></li>
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
                <a href="/devisions/create" class="btn btn-success">Tambah Bagian</a>
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
                        <h3 class="card-title">Data Bagian admin tanaman hias</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Bagian</th>
                                    <th scope="col">Gaji</th>
                                    <th scope="col">Tanggal buat</th>
                                    <th scope="col">Tanggal ubah</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($devisions as $i)
                                <tr>
                                    <th scope="tow">{{ $loop-> iteration}}</th>
                                    <td>{{ $i->id}}</td>
                                    <td>{{ $i->bagian}}</td>
                                    <td>{{ $i->gaji}}</td>
                                    <td>{{ $i->created_at}}</td>
                                    <td>{{ $i->updated_at}}</td>
                                    <td>
                                        <a href="/devisions/{{$i->id}}/edit" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="/devisions/{{$i->id}}" method="post" class="d-inline">
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
                            {{ $devisions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
@endsection
<!-- /.card-header -->
