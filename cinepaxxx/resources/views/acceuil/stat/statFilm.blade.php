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
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Stat <span>| Today</span></h5>
                                {{$rep->count}} Billets Vendues
                        </div>
                    </div>
                </div><!-- End Sales Card -->
        </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
@include('include.footer')
</body>

</html>
