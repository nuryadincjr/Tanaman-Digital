@extends('shoptamp.template')

@section('content')
<section class="section">
    <div class="px-4 py-5 my-5 text-center">
        <h2 class="pb-2 border-bottom">Kontak Kami</h2>

        <div class="row justify-content-center">
          <div class="col-6">
          <form class="row  g-3 justify-content-center">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" aria-describedby="nama">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" id="email" aria-describedby="email">
            </div>
            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan</label>
                <textarea class="form-control" placeholder="Tulis pesan Anda" id="pesan"></textarea>
            </div>
            
            <div class="mb-3">
              <button type="submit" class="btn btn-primary">Submit Mesage</button>
              <button type="submit" class="btn btn-success">WhatsApp Call</button>
            </div>
        </form>
          </div>
        </div>
    </div>
</section>
@endsection
