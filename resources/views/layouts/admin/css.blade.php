<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>XFlow | Admin</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
{{-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> --}}
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
    href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
<style>
    .transaction-form {
        display: none;
    }

    .show-deposit-form #deposit-form,
    .show-withdraw-form #withdraw-form {
        display: block;
    }

    table thead {
        color: #fff !important;
        background-color: #17a2b8 !important;

    }

    table tbody tr:nth-child(even) {
        background: #f5f2f2
    }

    table tbody tr:nth-child(odd) {
        background: #FFF
    }

    .btn {
        border-radius: 30px;
        box-shadow: 4px 2px 4px 0px rgb(0, 0, 0, .2);
    }

    .nav-sidebar .nav-item>.nav-link {
        border: 2px solid #0661ab;
        margin-bottom: 10px;
        border-top: 1px solid #dee2e61a;
        border-radius: 25px;
        box-shadow: 3px 3px 2px 1px #000000;

    }

    .green-text {
        color: green;
        font-size: 1.2rem;
        font-weight: 800;
    }

    .red-text {
        color: red;
        font-size: 1.2rem;
        font-weight: 800;
    }
</style>
