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
             <div class="row">
              <div class="row mt-3">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">Film_Titre</th>
                              <th scope="col">Film_annee</th>
                              <th scope="col">Film_duree</th>
                              <th scope="col">Salle_nom</th>
                              <th scope="col">sceance_heurre</th>
                              {{-- <th scope="col">Voir_Details</th> --}}
                              {{-- <th scope="col">rang</th>
                              <th scope="col">num</th>
                              <th scope="col">datereservation</th> --}}
                            </tr>
                        </thead>
                        @foreach ($vente as $v )
                        <tbody>
                            <tr>
                                <th scope="row">{{ $v->id }}</th>
                                <td>{{ $v->film_titre }}</td>
                                <td>{{ $v->film_annee }}</td>
                                <td>{{ $v->film_duree }}</td>
                                <td>{{ $v->salle_nom }}</td>
                                <td>{{ $v->sceance_heure }}</td>
                                <td> <a class="mr-5" href="detailTicket/{{ $v->id }}"> <i class="bi bi-eye"></i> </a> </td>
                                {{-- <td>{{ $v->rang }}</td>
                                <td>{{ $v->num }}</td>
                                <td>{{ $v->datereservation }}</td> --}}
                            </tr>
                            </tbody>
                        @endforeach
              </table>
                {{-- <form action="{{ Url('exportPdf') }}" method="get">
                    <div class="col-lg-6">
                      <button type="submit" class="btn btn-outline-warning"> <i class="bi bi-file-earmark-pdf"></i>Exporter en Pdf</button>
                  </div>
                  </form> --}}
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
