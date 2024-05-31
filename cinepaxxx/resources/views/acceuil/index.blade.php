<!DOCTYPE html>
<html lang="en">
    @include('include.header');
<body>
@include('include.aside');
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
      <div class="row ">
        <div class="card ">
            <div class="card-body">
              <h5 class="card-title">Choix Sceqnces</h5>

              <!-- No Labels Form -->
                @foreach ( $sceance as $s )
                <div class="card">
                    <div class="filter">
                      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                          <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                      </ul>
                    </div>

                    <div class="card-body">
                      <h5 class="card-title">Recent Activity <span>| Today</span></h5>
                      <div class="activity">
                        <div class="activity-item d-flex">
                          <div class="activite-label">
                            <input type="hidden" name="sceance_id" value="{{ $s->sceance_id }}">
                            <div class="row">
                                    <div class="col-lg-6">
                                        <h6> Titre :  {{ $s->film_titre }}</h6>
                                        <h6>Annee : {{ $s->film_annee }} </h6>
                                        <h6>Salle : {{ $s->salle_nom}} </h6>
                                        <h6>heurre : {{ $s->sceance_heure }}</h6>
                                    </div>
                            </div>
                            <div>
                                <img src='{{ asset("assets/img/$s->film_image") }}' alt="" style="width: 400px; heigth:400px">
                            </div>
                            <div class="row">
                                <div class="text-center mt-3">
                                    <a href="{{ url('sceanceReserve/'. $s->sceance_id) }}" class="btn btn-outline-primary"> <i class="bi bi-tv"></i> Faire Reservation</a>
                                </div>
                                <div class="mt-3 text-center">
                                        <a class="btn btn-outline-success" href="{{ url('vuePlace/'.$s->sceance_id) }}"> <i class="bi bi-eye"></i> Places  </a>
                                </div>
                            </div>
                        </div>
                        </div><!-- End activity item-->
                      </div>
                    </div>
                  </div><!-- End Recent Activity -->
                  @endforeach
            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
@include('include.footer');

</body>

</html>
