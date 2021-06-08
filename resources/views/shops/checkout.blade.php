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
            <h2>Detail Pesanan</h2>
        </div>

        <form method="post" action="/order" enctype="multipart/form-data">
            @method('patch')
            @csrf
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
                                    <td>
                                        {{$c->quntity}}
                                    </td>
                                    <td>
                                        <var class="harga">Rp.{{$c->inventories->harga}}</var>
                                    </td>
                                    <td>
                                        <livewire:cartupdate-livewire :post="$c" />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                    <h2 class="mb-3">Alamat Pembayaran</h2>
                    <form class="needs-validation" novalidate>
                        <div class="row g-3">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                                    value="{{$users->nama}}" placeholder="Masukan nama pengguna">
                                @error('nama')<div class="invalid-feedback">{{$message}}</div>@enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" value="{{$users->email}}" placeholder="Masukan email pengguna">
                                @error('email')<div class="invalid-feedback">{{$message}}</div>@enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="telpon">Telpon</label>
                                <input type="text" class="form-control @error('telpon') is-invalid @enderror" id="telpon"
                                    name="telpon" value="{{$users->telpon}}" placeholder="Masukan telpon pengguna">
                                @error('telpon')<div class="invalid-feedback">{{$message}}</div>@enderror
                            </div>

                            <div class="col-12">
                                <label for="alamat">Alamat Penagihan</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" 
                                rows="2" placeholder="Masukan alamat rumah">{{$users->alamat}}</textarea>
                                @error('alamat')<div class="invalid-feedback">{{$message}}</div>@enderror
                            </div>

                            <div class="col-12">
                                <label for="country" class="form-label">Kota Tujuan - Ongkos Korim</label>
                                <select class="form-select" id="country" name="ongkir">
                                    @foreach ($ongkir as $o)
                                    <option value="{{$o->id}}">
                                        <p>{{$o->kota}} - Rp.{{$o->harga}}</p>
                                    </option>
                                    @endforeach
                                </select>
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
                    </form>

                </div>

                <div class="col-md-4">
                    <div class="card p-2 position-sticky" style="top: 2rem;">
                        <div class="card-body mb-3">
                            <dl class="dlist-align">
                                <dt>Total Pembelian: </dt>
                                <livewire:cart-pieceupdate-livewire />
                            </dl>
                            <dl class="dlist-align">
                                <dt>Ungkos Kirim: </dt>
                                <livewire:cart-pieceupdate-livewire />
                            </dl>
                            <dl class="dlist-align">
                                <dt>Total Pembayaran: </dt>
                                <livewire:cart-pieceupdate-livewire />
                            </dl>
                        </div>
                        <a class="btn btn-success mb-3" href="/shop">Lanjut Berbelanja</a>
                        <button type="submit" class="btn btn-warning mb-3" href="/bayar">Lanjut Pembayaran</button>
                    </div>
                </div>

            </div>

        </form>

    </main>
</section>
@endsection
