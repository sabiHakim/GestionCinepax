<!DOCTYPE html>
<html lang="en">
<body>
@include('include.header');
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
      <div class="row">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Sceance  du  Films/Achat billet</h5>

                     <!-- Default Table -->
              <table class="table">
                <thead>
                <?php
                use App\Models\Film;
                use App\Models\Salle;

                    $films = new Film();
                    $salles = new Salle();
                ?>
                  <tr>
                    <th scope="col">Salle</th>
                    <th scope="col">Film</th>
                    <th scope="col">Heurre</th>
                    <th scope="col">Action</th>
                  </tr>

                </thead>
                <tbody>
                    @foreach ( $sceances as $sceance )
                  <tr>
                    <td>{{ $salles->getNameById($sceance->idsalle)}}</td>
                    <td>{{ $films->getNameById($sceance->idfilm)}}</td>
                    <td>{{ $sceance->heurre }}</td>
                    <td> <a href="{{ url('/billetage/' . $sceance->id) }}" class="btn btn-outline-primary"><i class="bi bi-patch-check-fill">Billets</i></a> </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->

            </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
@include('include.footer');
</body>

</html>
