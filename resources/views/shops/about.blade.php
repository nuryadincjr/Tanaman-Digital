@extends('shoptamp.template')

@section('content')

<section class="section">
    <div class="px-4 py-5 my-5 text-center">
        <h2 class="pb-2 border-bottom">Tentang Kami</h2>
        <div class="container marketing">
            <img class="d-block mx-auto mb-4" src="{{asset('img/brandgreb.png')}}" alt="" width="500">
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the
                    world’s
                    most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid
                    system,
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
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#toggles2"></use>
                    </svg>
                </div>
                <div>
                    <h2>Mudah</h2>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                        sentence and probably just keep going until we run out of words.</p>
                    <a href="#" class="btn btn-primary">
                        Primary button
                    </a>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#cpu-fill"></use>
                    </svg>
                </div>
                <div>
                    <h2>Cepat</h2>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                        sentence and probably just keep going until we run out of words.</p>
                    <a href="#" class="btn btn-primary">
                        Primary button
                    </a>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
                    <svg class="bi" width="1em" height="1em">
                        <use xlink:href="#tools"></use>
                    </svg>
                </div>
                <div>
                    <h2>Aman</h2>
                    <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another
                        sentence and probably just keep going until we run out of words.</p>
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
        <h2 class="pb-2 border-bottom">Developers</h2>
        <div class="container marketing">

            <div class="row">
                <div class="col-lg-6">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777"
                            dy=".3em">140x140</text>
                    </svg>
                    <h2>Meri Nurhalimah</h2>
                    <p>Mahasiswa-STTBandung</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div>
                <div class="col-lg-6">
                    <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                        xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                        preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777"
                            dy=".3em">140x140</text>
                    </svg>
                    <h2>Meri Nurhalimah</h2>
                    <p>Mahasiswa-STTBandung</p>
                    <p><a class="btn btn-secondary" href="#">View details »</a></p>
                </div>


            </div>
        </div>
    </div>
</section>
@endsection
