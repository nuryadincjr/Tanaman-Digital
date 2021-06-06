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

        <div class="container">
            <div class="row">
                <aside class="col-lg-9">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                        <th scope="col">Barang</th>
                                        <th scope="col" width="120">Kuantitas</th>
                                        <th scope="col" width="120">Harga</th>
                                        <th scope="col" width="120">Sub total</th>
                                        <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $c)
                                    <tr>
                                        <td>
                                            <figure class="itemside align-items-center">
                                                <div class="aside"><img
                                                        src="data:image/png;base64,{{$c->inventories->photo1}}"
                                                        class="img-sm"></div>
                                                <figcaption class="info"> <a href="/detail/{{$c->inventories->id}}"
                                                        class="title text-dark"
                                                        data-abc="true">{{$c->inventories->nama}}</a>
                                                    <p class="text-muted small">Jenis: {{$c->inventories->types->jenis}}
                                                        <br> Unit: {{$c->inventories->units->unit}}</p>
                                                </figcaption>
                                            </figure>
                                        </td>

                                        <td class="cart-product-quantity" width="130px">
                                            <div class="input-group quantity">
                                                <div class="input-group-prepend decrement-btn" style="cursor: pointer;">
                                                    <span class="input-group-text" wire:click.prevent="incresaseQty('{{$c->id}}')">-</span>
                                                </div>
                                                <input type="text" class="qty-input form-control" maxlength="3" max='10'
                                                    value="1">
                                                <div class="input-group-append increment-btn" style="cursor: pointer;">
                                                    <span class="input-group-text" wire:click.prevent="desresaseQty('{{$c->id}}')">+</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="harga">Rp.{{$c->inventories->harga}}</var>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="harga">Rp.{{$c->inventories->harga}}</var>
                                            </div>
                                        </td>
                                        <td class="text-right d-none d-md-block">
                                            <form action="/cart/{{$c->id}}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-md btn-danger btn-flat">
                                                    <i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-3">
                    <div class="card p-2">
                        <div class="card-body mb-3">
                            <dl class="dlist-align">
                                <dt>Total Pembelian:</dt>
                                <dd class="text-right ml-3">$69.97</dd>
                            </dl>
                        </div>
                        <a class="btn btn-success mb-3" href="/shop">Lanjut Berbelanja</a>
                        <a class="btn btn-warning mb-3" href="/checkout">Lanjut Checkout</a>
                    </div>
                </aside>
            </div>
        </div>
    </main>
</section>
@endsection
