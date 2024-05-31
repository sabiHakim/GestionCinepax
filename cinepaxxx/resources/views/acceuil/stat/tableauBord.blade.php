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
                  <h5 class="card-title">Choix  Date</h5>
                  <div>
                   <form action="{{ Url('getableauBord') }}" method="get">
                    @csrf
                    <input type="date" name="date" class="form-control">
                    <button type="submit" class="btn btn-outline-primary">Valider</button>
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
