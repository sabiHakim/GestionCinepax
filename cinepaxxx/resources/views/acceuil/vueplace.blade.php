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
        <div class="card mb-5">
            <div class="card-body">
              <h5 class="card-title">visualisation</h5>
            </div>
            <div class="row">
                @foreach ($place as $places)
                <div class="col-md-4 mb-5">
                    <div class="bg-dark text-white d-flex align-items-center justify-content-center" style="height: 50px; width: 50px;">
                        {{ $places->rang }}-{{ $places->numrang }}
                    </div>
                </div>
                @endforeach
                @foreach ($placeoccupes as $place)
                <div class="col-md-4 mb-5">
                    <div class="bg-dark text-white d-flex align-items-center justify-content-center" style="height: 50px; width: 50px;opacity:0.5">
                        {{ $place->rang }}-{{ $place->numrang }}
                    </div>
                </div>
                @endforeach
            </div>



        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
@include('include.footer')
</body>

</html>
