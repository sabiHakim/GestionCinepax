<!DOCTYPE html>
<html lang="en">
@include('include.header')
<body>
@include('include.aside')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ Url('acceuil') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Billets/Places/</h5>
              @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
             @endif
             <div id="pdf-content-start"></div>
             <div class="row">
                <div class="col-lg-3 mb-3">
                    <h6> Heurre : {{ $sceance->heurre }}</h6>
                    <input type="hidden" value="{{ $sceance->id }}" name="ids">
                </div>
                <div class="col-lg-3 mb-3">
                    <h6> nomFilm : {{ $nomFilm[0]->titre }}</h6>
                </div>
                <div class="col-lg-3 mb-3">
                    <h6> nomSalle : {{ $nomSalle[0]->nom }}</h6>
                </div>

             </div>
              <form method="GET" action="{{ Url('reservation') }}" class="row">
                @csrf
                <div class="col-md-4 ">
                    <select id="inputState" class="form-select" name="billet">
                      @foreach ($billets as $billet)
                      <option value="{{ $billet->id }}">{{ $billet->nom}}  ({{ $billet->montant }} MGA) </option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4 ">
                    <input type="hidden" value="{{$id}}" name="idsceance">
                    <select id="inputState" class="form-select" name="place">
                        @foreach ($places as $place)
                        <option value="{{ $place->idrange}}-{{$place->numrang }}">{{ $place->rang }} - {{ $place->numrang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class=" col-md-4">
                    <button type="submit" class="btn btn-outline-primary">Reserver</button>
                </div>
                <div id="pdf-content-end"></div>
              </form><!-- End No Labels Form -->
              <div class="row mt-3">
                <form action="{{ Url('exportPdf') }}" method="get">
                    @csrf
                    <input type="hidden" value="{{$id}}" name="idsceance">

                    {{-- <div class="col-lg-6">
                      <button type="submit" class="btn btn-outline-warning"> <i class="bi bi-file-earmark-pdf"></i>Exporter en Pdf</button>
                  </div> --}}
                  </form>
              </div>
            </div>

          </div>
      </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
@include('include.footer')
</body>

</html>
