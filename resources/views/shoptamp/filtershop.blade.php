<form class="position-sticky bg-while" style="top: 2rem;">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Nama Produk">
        <button type="submit" class="btn btn-secondary">Cari produk</button>
    </div>

    <label>Kategori Jenis</label>
    <div class="row mb-3">
        <div class="col">
        <a href="#" class="list-group-item list-group-item-action bg-light">Semua Jenis</a>
        @foreach ($types as $t)
        <a href="#" class="list-group-item list-group-item-action bg-light">{{$t->jenis}}</a>
        @endforeach
        </div>
    </div>

    <label>Kisaran Harga</label>
    <div class="row  mb-3">
        <div class="col">
            <input type="text" class="form-control" id="min" aria-describedby="Min" placeholder="Min">
        </div>
        <div class="col">
            <input type="text" class="form-control" id="max" aria-describedby="Max" placeholder="Max">
        </div>
    </div>
    <input type="range" class="form-range mb-3" id="customRange1">
    <div class="row  mb-3">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-primary">Terapkan</button>
            <button type="button" class="btn btn-success">Semua</button>
        </div>
    </div>
    
</form>
