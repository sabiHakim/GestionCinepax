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
            @foreach ($venteProduit as $produit)
            <!-- Sales Card -->
       <div class="col-xxl-4 col-md-6">
           <div class="card info-card sales-card">
             <div class="card-body">
               <h5 class="card-title">{{ $produit->nomprod }}<span>| {{ $date }}</span></h5>

               <div class="d-flex align-items-center">
                 <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                   <i class="bi bi-cart"></i>
                 </div>
                 <div class="ps-3">
                   <h6  > CAP : <span class="text-success">{{ $produit->ca }} Ariary</span> </h6>
                 </div>
               </div>
             </div>

           </div>
         </div><!-- End Sales Card -->
            @endforeach
            @foreach ($cafilm as $films )
              <!-- Sales Card -->
       <div class="col-xxl-4 col-md-6">
        <div class="card info-card sales-card">
          <div class="card-body">
            <h5 class="card-title">{{ $films->film_titre }}<span>| {{ $date }}</span></h5>

            <div class="d-flex align-items-center">
              <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                <i class="bi bi-tv"></i>
              </div>
              <div class="ps-3">
                <h6  > CAF : <span class="text-success">{{ $films->sum }} Ariary</span> </h6>
              </div>
            </div>
          </div>

        </div>
      </div><!-- End Sales Card -->
            @endforeach

            <br>
            @foreach ($vues as $v )
            <!-- Sales Card -->
     <div class="col-xxl-4 col-md-6">
      <div class="card info-card sales-card">
        <div class="card-body">
          <h5 class="card-title">{{ $v->film_titre }}<span>| {{ $date }}</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="bi bi-eye"></i>
            </div>
            <div class="ps-3">
              <h6  ><span class="text-success">{{ $v->count }} vues</span> </h6>
            </div>
          </div>
        </div>

      </div>
    </div><!-- End Sales Card -->
          @endforeach
        </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
@include('include.footer')
</body>

</html>
