@extends('shoptamp.template')

@section('content')
<section class="content-header bg-while">
    <main class="container">
        <div class="container-fluid">
            <h1 class="display-4 fst-italic">Checkout</h1>
            <p class="lead my-3">Lakukan pembayaran sesuai pesanan mu!</p>
            <ol class="breadcrumb float-sm-right mb-5">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item"><a href="/cart">Cart</a></li>
                <li class="breadcrumb-item"><a>Checkout</a></li>
            </ol>
            <h1>Detail Pesanan</h1>
        </div>
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
                                        <div class="price-wrap">
                                            <var class="harga">{{$c->quntity}}</var>
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
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <h4 class="mb-3">Alamat Pembayaran</h4>
                <form class="needs-validation" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Nama Lengkap</label>
                            <input disabled type="text" class="form-control" id="firstName"
                                placeholder="{{$users->nama}}" value="" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Telpon</label>
                            <input disabled type="text" class="form-control" id="lastName"
                                placeholder="{{$users->telpon}}" value="" required>
                            <div class="invalid-feedback">

                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span
                                    class="text-muted">(Optional)</span></label>
                            <input disabled type="email" class="form-control" id="email"
                                placeholder="{{$users->email}}">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address"
                                placeholder="Alamat Penagihan dan pengantaran" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-md-5">
                            <label for="country" class="form-label">Kota Tujuan</label>
                            <select class="form-select" id="country" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="zip" class="form-label">Ongkos Kirim</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Rp.0
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Metode Pembayaran</h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked
                                required>
                            <label class="form-check-label" for="credit">Teransver Bank</label>
                        </div>
                        <div class="form-check">
                            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                            <label class="form-check-label" for="debit">Bayar di Tempat</label>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                </form>
            </aside>
            <aside class="col-lg-3 ">
                <div class="card p-2">
                    <div class="card-body mb-3">
                        <dl class="dlist-align">
                            <dt>Total Pembelian:</dt>
                            <dd class="text-right ml-3">$69.97</dd>
                        </dl>
                    </div>
                    <a class="btn btn-success mb-3" href="/shop">Lanjut Berbelanja</a>
                    <a class="btn btn-warning mb-3" href="/detailpesanan">Lanjut Pembayaran</a>
                </div>
            </aside>
        </div>
        </div>
    </main>
</section>
@endsection
