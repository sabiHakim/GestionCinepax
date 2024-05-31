<!DOCTYPE html>
<html lang="en">
@include('include.header')
<body>
    <style>
        #pdf-content-start {
    margin-top: 20px;
}

.row {
    margin-bottom: 10px;
}

.row p {
    font-size: 12px;
    color: #666;
}

.row .col-lg-4 {
    width: 33.33%;
    float: left;
}

    </style>
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
             <div class="row">
                <div class="row mt-3">
                    <form action="{{ Url('exportPdf') }}" method="get">
                        <div id="pdf-content-start"></div>
                        @foreach ($vente as $v)
                            <div class="row">
                                <div class="col-lg-4">
                                    <p>Film : {{ $v->film_titre }}</p>
                                    <p>Row : {{ $v->rang }}</p>
                                    <p>Set : {{ $v->num }}</p>
                                </div>
                                <div class="col-lg-4">
                                    <p>Salle : {{ $v->salle_nom }}</p>
                                    <p>Time : {{ $v->sceance_heure }}</p>
                                    <p>Date : {{ $v->datereservation }}</p>
                                </div>
                            </div>
                        @endforeach
                        <div id="pdf-content-end"></div>
                        <input type="hidden" value="{{ $v->id }}" name="idv">
                        <div class="row mt-2">
                            <button type="submit" class="btn btn-outline-warning">
                                <i class="bi bi-file-earmark-pdf"></i>Exporter en Pdf
                            </button>
                        </div>
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
