<!DOCTYPE html>
<!-- <html lang="en" class="scroll-smooth"> -->
<html lang="en">
<!-- <html lang="en"> -->
<head>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- <title>ACA Insurance | Create Profile</title> -->
  <title>@yield('title')</title>
   <!-- icon glyphcon
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}"> -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css"> -->
    <!-- SweetAlert2 -->
  <!-- <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}"> -->
  <!-- <script src="sweetalert2.min.js"></script> -->
  <!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
  <!-- Toastr -->
  <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
  <!-- BStepper -->
  <link rel="stylesheet" href="{{asset('plugins/bs-stepper/css/bs-stepper.min.css')}}">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{asset('plugins/dropzone/min/dropzone.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

  <script src="https://kit.fontawesome.com/98c7930b81.js" crossorigin="anonymous"></script>
  @yield('head-linkrel')
</head>
<!-- <body class="hold-transition layout-top-nav layout-fixed text-sm"> -->
<body class="{{ (Session::get('sidebar') == 'top-nav') ? 'hold-transition layout-top-nav layout-navbar-fixed layout-fixed layout-footer-fixed text-s' : 'hold-transition sidebar-mini layout-navbar-fixed layout-fixed layout-footer-fixed text-s' }}">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-primary navbar-light">
    <div class="{{session('sidebar') == 'top-nav' ? 'container' : 'container-fluid'}}">
      @if (session('sidebar') == 'top-nav')
      <a href="#" class="navbar-brand">
         <img src="{{asset('dist/img/company_logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">{{config('app.COMPANYNAME')}}</span>
      </a>
      @else
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      @endif
      <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="{{route('showchangepassword')}}">Change Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
            </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
      


  <!-- Main Sidebar Container -->
  @if (Session('sidebar') != 'top-nav')
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-primary">
      <img src="{{asset('dist/img/company_logo.png')}}" alt="Company Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-dark">{{config('app.COMPANYNAME')}}</span>
      <!-- <span class="brand-text font-weight-dark">ACA INSURANCE</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="overflow-y:auto;" >
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info text-wrap">
          <a href="{{route('myprofile')}}" class="d-block">{{ Session::get('Name')}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if (session('Role') == 'MARKETING OFFICER')
            <li class="{{ (Session::get('sidebar') == 'master') ? 'nav-item menu-is-opening menu-open' : 'nav-item' }}">
              <a href="#" class="{{ (Session::get('sidebar') == 'master') ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Master
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('master.ShowSysUser')}}" class="{{ (Session::get('sidebar') == 'master' && Session::get('sidebar-tree') == 'sysuser') ? 'nav-link active' : 'nav-link' }}">
                    <i class="fas fa-users nav-icon"></i>
                    <p>{{ (Session::get('Role') == 'ADMIN') ? 'User' : 'Business Source'}}</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif
          <li class="{{ Session::get('sidebar') == 'dashboard' ? 'nav-item menu-open' : 'nav-item' }}">
            <a href="{{ route('dashboard')}}" class="{{ Session::get('sidebar') == 'dashboard' ? 'nav-link active' : 'nav-link' }}">
            <!-- <a href="{{ route('dashboard')}}" class="{{ Session::get('sidebar') == 'dashboard' ? 'nav-link active' : 'nav-link' }}"> -->
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (session('Role') == 'MARKETING OFFICER')
          <li class="{{ Session::get('sidebar') == 'profile' ? 'nav-item menu-open' : 'nav-item' }}">
            <a href="{{ route('profile')}}" class="{{ Session::get('sidebar') == 'profile' ? 'nav-link active' : 'nav-link' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Client
              </p>
            </a>
          </li>
          <li class="{{ Session::get('sidebar') == 'sppa' ? 'nav-item menu-open' : 'nav-item' }}">
            <a href="{{ route('policy.transaction')}}" class="{{ Session::get('sidebar') == 'sppa' ? 'nav-link active' : 'nav-link' }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                SPPA
              </p>
            </a>
          </li>
          @endif
          <!-- <li c]i> -->
          @if (session('Role') == 'MARKETING OFFICER')
            <li class="{{ Session::get('sidebar') == 'survey' ? 'nav-item menu-open' : 'nav-item' }}">
              <a href="survey" class="{{ Session::get('sidebar') == 'survey' ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-video"></i>
                <p>
                  Survey
                </p>
              </a>
            </li>
          @endif
          
          @if (config('app.ShowStoredData'))
            <li class="{{ (Session::get('sidebar') == 'stored-data' && (Session::get('sidebar-tree') == 'stored-policy' || Session::get('sidebar-tree') == 'stored-document')) ? 'nav-item menu-is-opening menu-open' : 'nav-item' }}">
              <a href="#" class="{{ (Session::get('sidebar') == 'stored-data' && (Session::get('sidebar-tree') == 'stored-policy' || Session::get('sidebar-tree') == 'stored-document')) ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Stored Data
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('storeddata.showpolicy')}}" class="{{ (Session::get('sidebar') == 'stored-data' && Session::get('sidebar-tree') == 'stored-policy') ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Policy</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="{{ route('storeddata.showdocument')}}" class="{{ (Session::get('sidebar') == 'stored-data' && Session::get('sidebar-tree') == 'stored-document') ? 'nav-link active' : 'nav-link' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Document</p>
                  </a>
                </li> -->
              </ul>
            </li>
          @endif
          @if (session('Role') == 'AGENT')
          <li class="{{ Session::get('sidebar') == 'training_class' ? 'nav-item menu-open' : 'nav-item' }}">
              <a href="{{ route('trainingclass')}}" class="{{ Session::get('sidebar') == 'training_class' ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                <p>
                  Training Class
                </p>
              </a>
            </li>
            <li class="{{ Session::get('sidebar') == 'faq' ? 'nav-item menu-open' : 'nav-item' }}">
              <a href="{{ route('faqlist')}}" class="{{ Session::get('sidebar') == 'faq' ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-question"></i>
                <p>
                  FAQ
                </p>
              </a>
            </li>
<<<<<<< HEAD
          @endif
          @if (session('Role') == 'AGENT')
            <li class="{{ Session::get('sidebar') == 'training_class' ? 'nav-item menu-open' : 'nav-item' }}">
              <a href="{{ route('trainingclass')}}" class="{{ Session::get('sidebar') == 'training_class' ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-chalkboard-teacher"></i>
=======
            <li class="{{ Session::get('sidebar') == 'materi' ? 'nav-item menu-open' : 'nav-item' }}">
              <a href="{{ route('showmateri')}}" class="{{ Session::get('sidebar') == 'materi' ? 'nav-link active' : 'nav-link' }}">
                <i class="nav-icon fas fa-chalkboard"></i>
>>>>>>> 3cb4e104eb03135beb1e05023fc5f881a19607a8
                <p>
                  Materi
                </p>
              </a>
            </li>
          @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  @endif

  
  <!-- Loading -->
  <div class="modal" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-body text-center">
        <div class="spinner-border text-info" style="width: 4rem; height: 4rem;" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal General -->
  <div class="modal fade" id="modal-general" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div id="class-modal-dialog" class="modal-dialog">
      <div class="modal-content">
        <div id="div-overlay-modal" style="display:none">
          <div style="position:absolute; top:0.1%; left:0.1%;" class="overlay"><i style="position:absolute; left:50%; top:50%; margin-top:-25px; margin-left:-25px;" class="fas fa-2x fa-sync fa-spin"></i></div>
        </div>
        <div class="modal-header">
          <h4 class="modal-title" id="modaltitle"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalbody">
        </div>
        <div class="modal-footer" id="modalfooter">
        </div>
      </div>
    </div>
  </div>

  <!-- The Modal -->
  <div id="myModal" class="modal" role="dialog">
    <span class="close-img">&times;</span>
    <!-- <div class="modal-body text-center"> -->
      <img class="modal-img-content" id="img01">
      <div id="caption"></div>
    <!-- </div> -->
  </div>

  @yield('maincontent')

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2021 <a href="#">Care Technologies</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>

<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<!-- <script src="{{asset('plugins/jszip/jszip.min.js')}}"></script> -->
<!-- <script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script> -->
<!-- <script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script> -->
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script> -->
<!-- BStepperJS -->
<script src="{{asset('plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- SweetAlert2 -->
<!-- <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script> -->
<!-- <script src="sweetalert2.all.min.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('plugins/dropzone/min/dropzone.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- jQuery Knob -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<!-- General For Web Portal MW -->
<script src="{{asset('dist/js/pages/webportal.js')}}?1"></script>
@yield('scriptpage')
</body>
</html>