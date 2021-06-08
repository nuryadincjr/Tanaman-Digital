@extends('shoptamp.template')

@section('content')

<main class="container">
    <div class="container-fluid">
        <h1 class="display-4 fst-italic">Shop</h1>
        <p class="lead my-3">Koleksi Tanaman Favoritmu sekarang!</p>
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item"><a>Shop</a></li>
        </ol>
    </div>

    @if (session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Inpormasi!</strong>  {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row g-5">
        <div class="col-md-4">
            @include('shoptamp.filtershop')
        </div>
        <div class="col-md-8">
            <div class="conteiner">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Tanaman Terbaru
                </h3>
                <div class="row row-cols-2 row-cols-md-3 g-4">
                    @foreach($inventory as $i)
                    <div class="col text-center">
                        <div class="card h-100" style="width: 12rem;">
                            <img style="height: 12rem;" src="data:image/png;base64,{{$i->photo1}}" class="card-img-top"
                                alt="Photo {{$i->nama}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$i->nama}}</h5>
                                <p class="card-text"><b>Rp.{{$i->harga}}-{{$i->units->unit}}</b></p>
                                <p class="card-text"><del>Rp.{{$i->harga*2}}-{{$i->units->unit}}</del></p>
                                <div class="div">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <div class="btn-group rounded-bottom" role="group" aria-label="Basic example">
                                <a href="/detail/{{$i->id}}" alt="Detail" class="btn btn-sm btn-success"><i
                                        class="fas fa-eye"> Detail</i></a>
                                <livewire:cart-addeupdate-livewire :post="$i"/>      
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <h3 class="pb-4 mb-4 mt-5 fst-italic border-bottom">
                    {{ $inventory->links() }}
                </h3>
            </div>
            <div class="conteiner">
                <h3 class="pb-4 mb-4 fst-italic border-bottom">
                    Tanaman Populer
                </h3>
                <div class="row row-cols-2 row-cols-md-3 g-4">
                    @foreach($populer as $i)
                    <div class="col text-center">
                        <div class="card h-100" style="width: 12rem;">
                            <img style="height: 12rem;" src="data:image/png;base64,{{$i->photo1}}" class="card-img-top"
                                alt="Photo {{$i->nama}}">
                            <div class="card-body">
                                <h5 class="card-title">{{$i->nama}}</h5>
                                <p class="card-text"><b>Rp.{{$i->harga}}-{{$i->units->unit}}</b></p>
                                <p class="card-text"><del>Rp.{{$i->harga*2}}-{{$i->units->unit}}</del></p>
                                <div class="div">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </div>
                            </div>
                            <div class="btn-group rounded-bottom" role="group" aria-label="Basic example">
                                <a href="/detail/{{$i->id}}" alt="Detail" class="btn btn-sm btn-success"><i
                                        class="fas fa-eye"> Detail</i></a>
                                <livewire:cart-addeupdate-livewire :post="$i"/>      
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <h3 class="pb-4 mb-4 mt-5 fst-italic border-bottom">
                    {{ $populer->links() }}
                </h3>
            </div>
        </div>
    </div>
</main>
@endsection
