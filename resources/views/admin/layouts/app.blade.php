<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>AngoStore - Painel Adminstrativo</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.cs') }}s">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/izitoast/css/iziToast.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('admin/assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Ola, {{ authUser()->person }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="{{ route('admin.profile')}}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Perfil
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('admin.logout')}}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i>Sair
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <p></p>
            <a href="{{ route('admin.users')}}"> <h4>Ango<span class="text-danger">Store</span></h4> </a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <p></p>
            <a href="{{ route('admin.users')}}"><h4>A<span class="text-danger">S</span></h4></a>
          </div>
          
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>            
            <li><a class="nav-link" href="{{ route('admin.users')}}"><i class="fas fa-user"></i> <span>Usuarios</span> </a></li>
            <li><a class="nav-link" href="{{ route('admin.category')}}"><i class="fas fa-list"></i> <span>Categorias</span> </a></li>
            <li><a class="nav-link" href="{{ route('admin.product')}}"><i class="fas fa-cart-plus"></i> <span>Produtos</span> </a></li>
            <li><a class="nav-link" href="#"><i class="fas fa-cogs"></i> <span>Configuraões</span> </a></li>
          </ul>        
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">



          @yield('content')



        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Desenvolvido por <a href="https://migueldeveloper.42web.io/">Miguel Leite</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('admin/assets/modules/izitoast/js/iziToast.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/page/modules-sweetalert.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/sweetalert/sweetalert.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/datatables/datatables.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/chart.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/owlcarousel2/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('admin/assets/js/axios/axios.js') }}"></script>
  <script src="{{ asset('admin/assets/js/page/index.js') }}"></script>
  @yield('page-script');
  <!-- Template JS File -->
  <script src="{{ asset('admin/assets/js/scripts.js') }}" type="module"></script>
  <script src="{{ asset('admin/assets/js/custom.js') }}" type="module"></script>
</body>
</html>