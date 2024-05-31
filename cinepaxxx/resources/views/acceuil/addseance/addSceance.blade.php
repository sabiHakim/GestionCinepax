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
            <div class="card ">
                <div class="card-body">
                  <h5 class="card-title">Add Sceance</h5>
                  <form action="{{ Url('doAddsceance') }}" method="get">
                    @csrf
                    <div class="row">

                        <div class="col-lg-4">
                            <select class="form-select" aria-label="Default select example" name="film">
                                <option selected>Choix Film</option>
                                @foreach ($film  as $f)
                                <option value="{{ $f->id }}">{{ $f->titre }}</option>
                                @endforeach
                              </select>

                        </div>
                        <div class="col-lg-4">
                            <select class="form-select" aria-label="Default select example"name="salle">
                                <option selected>choix Salle</option>
                                @foreach ($salle  as $s)
                                <option value="{{ $s->id }}">{{ $s->nom }}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="col-lg-4">
                            <input type="time"class="form-control" name="time">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <button type="submit" class="btn btn-outline-primary">Valider</button>
                    </div>
                   </form>
                </div>
              </div>
        </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
@include('include.footer')
</body>

</html>
