<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
  
    <title>{{ $shareData['system_name'] }}</title>
    <link rel="apple-touch-icon" href="{{ asset('/others') }}/{{ $shareData['favicon'] }}">
    <link rel="shortcut icon" href="{{ asset('/others') }}/{{ $shareData['favicon'] }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{!! asset('admin/plugins/fontawesome-free/css/all.min.css') !!}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/toaster.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/chosen.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
      [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover{
        background-color: #007bff !important;
        color: #fff !important;
      }
    </style>
  </head>