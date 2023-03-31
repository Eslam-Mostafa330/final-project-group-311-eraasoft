<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">


  <title>Dashboard - Mybookstore</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom fonts for this template-->
  <link href="{!! asset('assets/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="{!! asset('assets/css/sb-admin-2.min.css') !!}" rel="stylesheet">

  <!-- font -->
  <link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">


  <style>
      body {
        background-color: #f0f0f0;
      }

      .sidebar.toggled .nav-item .nav-link {
          text-align: center !important;
      }

      input:focus::-webkit-placeholder, textarea:focus::-moz-placeholder { /* Chrome/Opera/Safari */
        color: #388E3C;
    }
    input:focus::-moz-placeholder, textarea:focus::-moz-placeholder { /* Firefox 19+ */
        color: #388E3C;
    }
    input:focus:-moz-placeholder, textarea:focus::-moz-placeholder { /* Firefox 18- */
        color: #388E3C;
    }
    input:focus:-ms-input-placeholder, textarea:focus::-moz-placeholder { /* IE 10+ */
        color: #388E3C;
    }
    .form-control:focus {
        border-color: #388E3C !important;
        box-shadow: none !important;
    }
    .card-header {
        background: #f1f7ef !important;
        color: #388E3C !important;
    }
    .validate-error::placeholder {
        color: red !important;
        font-size: 15px;
    }

    .fa-square-plus {
        font-size: 17px !important;
        margin-right: 2px;
    }
    .card {
        border: none ;
    }
    .card-header {
        border-bottom: none !important;
        font-size: 17px !important;
        font-weight: bold !important;
        color: #1DC88A !important;
    }

    table.table-bordered, .card {
        box-shadow: 3px 3px 3px 3px #f1f7ef;
    }

    .table thead tr {
        color: #1DC88A !important;
    }
    .table tr:hover{
        background: #f1f7ef !important;
    }

    .actions {
        display: flex !important;
    }

    .btn-add {
        padding: 5px 25px !important;
    }

    .delete-btn {
        font-size: 100%;
        font-family: inherit;
        border: 0;
        padding: 0;
        color: red;
        margin-left: 20px;
        font-size: 20px;
        transition: .2s !important;
    }
    .edit-btn {
        font-size: 20px;
        color: #1DC88A;
        transition: .2s;
        margin-left: 5px;
    }
    .edit-btn:hover {
        color: #388E3C;
    }



    .page-link {
        margin-bottom: 6px !important;
    }
    .page-item:not(:first-child) .page-link {
        color: #1DC88A !important;
        box-shadow: none !important;
    }
    .page-item:not(:first-child) .page-link:hover {
        color: #388E3C !important;
    }
    .page-item:not(:last-child) .page-link:hover {
        color: #388E3C !important;
    }
    .page-item:not(:last-child) .page-link {
        color: #1DC88A  !important;
        box-shadow: none !important;
    }
    .page-item.active .page-link {
        background: #388E3C !important;
        color: #fff !important;
        border-color:  #388E3C !important;
        box-shadow: none !important;
    }
    .page-item.active .page-link:hover {
        color: #fff !important;
    }

    .default-msg {
        font-weight: bold !important;
        font-size: 17px;
        color: #388E3C !important;
    }

    .star {
        color: red;
        font-size: 16px;
        font-weight: bold;
    }
  </style>
  @yield('head')
</head>

<body id="page-top" >
@include('sweetalert::alert')

  <!-- Page Wrapper -->
  <div id="wrapper">
    @include('admin.sidebar')


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        @include('admin.header')

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
          </div>
          @yield('content')
        </div>
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
        @include('admin.footer')
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        </div>
        <div class="modal-body">Are you sure you want to logout?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cansel</button>
          <a class="btn btn-primary"
             href="{{ route('logout') }}"
             onclick="event.preventDefault();
             document.getElementById('logout-form').submit();"
          >Yes</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="{!! asset('assets/vendor/jquery/jquery.min.js') !!}"></script>
  <script src="{!! asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{!! asset('assets/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{!! asset('assets/js/sb-admin-2.min.js') !!}"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  @yield('script')
</body>

</html>
