@extends('shoptamp.template')

@section('content')
<section class="content-header bg-while">
    <main class="container">
        <div class="container-fluid">
            <h1 class="display-4 fst-italic">Keranjang</h1>
            <p class="lead my-3">Bersihkan keranjangmu dangan chackout sekarang juga!</p>

            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a>Cart</a></li>
            </ol>
        </div>
        <div class="row g-5">
            <div class="col-md-8">
                <div class="card mb-3">
                    <table class="table table-borderless">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col" width="120">Barang</th>
                                <th scope="col" width="50">Kuantitas</th>
                                <th scope="col" width="120">Harga</th>
                                <th scope="col" width="120">Sub total</th>
                                <th scope="col" width="20">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $c)
                            <tr>
                                <td>
                                    <figure class="itemside align-items-center">
                                        <div class="aside"><img src="data:image/png;base64,{{$c->inventories->photo1}}"
                                                class="img-sm"></div>
                                        <figcaption class="info"> <a href="/detail/{{$c->inventories->id}}"
                                                class="title text-dark" data-abc="true">{{$c->inventories->nama}}</a>
                                            <p class="text-muted small">Jenis: {{$c->inventories->types->jenis}}
                                                <br> Unit: {{$c->inventories->units->unit}}</p>
                                        </figcaption>
                                    </figure>
                                </td>
                                <td>
                                    <livewire:cart-livewire :post="$c" />
                                </td>
                                <td>
                                    <var class="harga">Rp.{{$c->inventories->harga}}</var>
                                </td>
                                <td>
                                    <livewire:cartupdate-livewire :post="$c" />
                                </td>
                                <td>
                                    <form action="/cart/{{$c->id}}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-flat">
                                            <i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-2 position-sticky" style="top: 2rem;">
                    <div class="card-body mb-3">
                        <dl class="dlist-align">
                            <dt>Total Pembelian: </dt>
                            <livewire:cart-pieceupdate-livewire />
                        </dl>
                    </div>
                    <a class="btn btn-success mb-3" href="/shop">Lanjut Berbelanja</a>
                    <a class="btn btn-warning mb-3" href="/checkout">Lanjut Checkout</a>
                </div>
            </div>
        </div>
    </main>
</section>
@endsection
