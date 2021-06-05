@extends('shoptamp.template')

@section('content')
<section class="content-header bg-light">
    <main class="container">
        <div class="p-4 p-md-5 mt-4 mb-5 rounded bg-while">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Keranjang</h1>
                <p class="lead my-3">Bersihkan keranjangmu dangan chackout sekarang juga!</p>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/home">Home</a></li>
                    <li class="breadcrumb-item"><a>Cart</a></li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
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
                                                <figcaption class="info"> <a href="#" class="title text-dark"
                                                        data-abc="true">{{$c->inventories->nama}}</a>
                                                    <p class="text-muted small">Jenis: {{$c->inventories->types->jenis}}
                                                        <br> Unit: {{$c->inventories->units->unit}}</p>
                                                </figcaption>
                                            </figure>
                                        </td>
                                        <td>
                                            
                                    <div class="add_row">
                                        
                                        

                                    </div>
                                        <td>
                                            <div class="price-wrap">
                                                <var class="harga">Rp.{{$c->inventories->harga}}</var>
                                                <small class="text-muted ">total:Rp. <a href="" class="harga">{{$c->inventories->harga}}</a> </small>
                                            </div>
                                        </td>
                                        <td class="text-right d-none d-md-block">
                                            <form action="/cart/{{$c->id}}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-md btn-danger btn-flat">
                                                <i class="fas fa-trash"></i></button>
                                            </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align">
                                <dt>Total Pembelian:</dt>
                                <dd class="text-right ml-3">$69.97</dd>
                            </dl>
                            <a class="btn btn-sm btn-success d-lg-inline-block my-2 my-md-0 ms-md-3" href="/checkout">Lanjut Checkout</a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>
</section>
@endsection
