@extends('shoptamp.template')

@section('content')
<section class="content-header bg-while">
    <main class="container">
        <div class="container-fluid">
            <h1 class="display-4 fst-italic">Detail Barang</h1>
            <p class="lead my-3">Cek sebelum membeli produk lebihbaik!</p>
        
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
                <li class="breadcrumb-item"><a>Detail Barang</a></li>
            </ol>
        </div>
        <div class="row g-5 mb-5">
            <div class="col">
                <div class="row">
                    <div class="col-10">
                        <div class="card  bg-success text-white" style="width: 35rem; height: 35rem;">
                            <img src="data:image/png;base64,{{$inventory->photo1}}" class=" card-img" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col m-2">
                                <img style="width: 5rem; height: 5rem;"
                                    src="data:image/png;base64,{{$inventory->photo2}}" class="card-img-top" alt="...">
                            </div>
                            <div class="col m-2">
                                <img style="width: 5rem; height: 5rem;"
                                    src="data:image/png;base64,{{$inventory->photo2}}" class="card-img-top" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h1 class="my-3"><b>{{$inventory->nama}}</b></h1>
                <p>{{$inventory->keterangan}}</p>
                <hr>

                <h4>Jenis Tumbuhan</h4>
                <p>{{$inventory->types->jenis}}</p>
                <br>

                <h4>Unit Beli</h4>
                <p>{{$inventory->units->unit}}</p>
                <br>

                <h4>Ketersediaan Stok</h4>
                <div class="bg-warning py-2 px-3 mb-5 mt-4">
                    <h2 class="mb-0"><i class="fas fa-shipping-fast"></i> {{$avilable}}</h2>

                    <h4 class="mt-0 ps-5">{{$inventory->stok}}-{{$inventory->units->unit}}</small></h4>
                </div>

                <h4>Harga Jual</h4>
                <div class="bg-warning py-2 px-3 mb-5 mt-4">
                    <h2 class="mb-0"><i class="fas fa-tag"> </i> Rp.{{$inventory->harga}}</h2>
                    <h4 class="mt-0 ps-5">Rp.<del>{{$inventory->harga}}</del></small></h4>
                </div>

                <div>
                    <form action="/cart/{{$inventory->id}}" method="post" class="d-inline">
                        @method('patch')
                        @csrf
                        <button type="submit" class="btn btn-md btn-warning btn-flat">
                            <i class="fas fa-shopping-cart"></i></button>
                    </form>

                    <div class="btn btn-md btn-danger btn-flat">
                        <i class="fas fa-heart fa-lg mr-2"></i> Add to Wishlist
                    </div>
                </div>

                <div class="mt-4 product-share mb-5">
                    <a href="#" class="text-gray">
                        <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                        <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>
</section>
@endsection
