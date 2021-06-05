@extends('shoptamp.template')

@section('content')
<section class="content-header bg-light">
    <main class="container">
        <div class="p-4 p-md-5 mt-4 mb-5 rounded bg-while">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Profile</h1>
                <p class="lead my-3">Sesuaikan alamat lokasi anda dengan lokasi penagihan!</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item" ><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a>Profil</a></li>
                </ol>
            </div>
        </div>
        <div class="container-fluid">
        <div class="container">
        @if (session('status'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
          <strong>Inpormasi!</strong>  {{ session('status') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="data:image/png;base64,{{$users->photo}}" alt="{{$users->nama}}" class="rounded-circle " width="150" height="150">
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
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Lengkap</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$users->nama}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$users->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Telpon</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$users->telpon}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$users->alamat}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Updated At</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{$users->updated_at}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info" href="/user/{{auth()->user()->id}}/edit">Edit Profile</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
        </div>
    </main>
</section>
@endsection
