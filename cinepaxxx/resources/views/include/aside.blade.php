  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Pages</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ Url('film')}}">
              <i class="bi bi-circle"></i><span>film</span>
            </a>
          </li>
          <li>
            <a href="{{Url('tableauBord')}}">
              <i class="bi bi-circle"></i><span>Tableau de Bord</span>
            </a>
          </li>
          <li>
            <a href="{{Url('addsceance')}}">
              <i class="bi bi-circle"></i><span>Ajouter Sceance</span>
            </a>
          </li>
          <li>
            <a href="{{Url('ticket')}}">
              <i class="bi bi-circle"></i><span>Tickets</span>
            </a>
          </li>
    </ul>

  </aside><!-- End Sidebar-->
