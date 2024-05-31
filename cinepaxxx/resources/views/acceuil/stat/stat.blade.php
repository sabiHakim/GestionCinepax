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
            @foreach ($film as $films)
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Stat <span>| Today</span></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src='{{ asset("assets/img/$films->image") }}' class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $films->titre }}</h6>
                                    <span class="text-success small pt-1 fw-bold">{{ $films->duree }}</span> <span class="text-muted small pt-2 ps-1"> Annee : {{ $films->annee }}</span>
                                    <a href="{{ Url('filmstat/'.$films->id) }}"> voir Statistique</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->
            @endforeach
        </div>
        {{ $film->links('pagination::simple-bootstrap-4') }}
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
@include('include.footer')
</body>

</html>
