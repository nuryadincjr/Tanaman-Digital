@extends('shoptamp.template')

@section('content')
@include('shoptamp.carosal')

<section class="section">
    <div class="px-4 py-5 my-5 text-center">
    <h2 class="pb-2 border-bottom">Tentang Kami</h2>
        <div class="container marketing">
        <img class="d-block mx-auto mb-4" src="{{asset('img/brandgreb.png')}}" alt="" width="500">
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s
                most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                extensive prebuilt components, and powerful JavaScript plugins.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Belanja</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Regisrasi</button>
            </div>
        </div>
    </div>
</section>

<section class="section bg-white">
<div class="container px-4 py-5 text-center" id="hanging-icons">
    <h2 class="pb-2 border-bottom">Layanan Kami</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#toggles2"></use></svg>
        </div>
        <div>
          <h2>Featured title</h2>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
          <a href="#" class="btn btn-primary">
            Primary button
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#cpu-fill"></use></svg>
        </div>
        <div>
          <h2>Featured title</h2>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
          <a href="#" class="btn btn-primary">
            Primary button
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em"><use xlink:href="#tools"></use></svg>
        </div>
        <div>
          <h2>Featured title</h2>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
          <a href="#" class="btn btn-primary">
            Primary button
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="sections">
    <div class="container px-4 py-5 text-center" id="custom-cards">
        <h2 class="pb-2 border-bottom">Produk Populer</h2>
        <div class="container marketing">

            <div class="row">
                @foreach ($populer as $p)
                <div class="col-lg-4">
                    <img src="data:image/png;base64,{{$p->photo1}}" alt="{{$p->nama}}" class="rounded-circle "
                        width="150" height="150">

                    <h2>{{$p->nama}}</h2>
                    <p>{{$p->types->jenis}}</p>
                    <p>{{$p->harga}}-{{$p->units->unit}}</p>
                    <p><a class="btn btn-secondary" href="/detail/{{$p->id}}">View details »</a></p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
