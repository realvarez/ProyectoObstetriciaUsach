<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Plataforma de gestión de archivos') }}</title>

<link rel="dns-prefetch" href="//fonts.gstatic.com">
<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />
<!-- Switchery css -->
<link href="{{asset('plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
<!-- BEGIN CSS for this page -->
<link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
<!-- Filter -->
<link href="{{asset('plugins/jquery.filer/css/jquery.filer.css')}}" rel="stylesheet" />
<!-- Dragdrop -->
<link href="{{asset('plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css')}}" rel="stylesheet" />

<!-- Tags-->
<link href="{{asset('css\bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css"/>

<!-- DateRange -->
<link href="{{asset('plugins/datetimepicker/css/daterangepicker.css')}}" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />

<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

{{-- Jquery --}}
<script src="{{asset('js/jquery.min.js')}}"></script>

@switch(\Route::currentRouteName())
    @case('category.show')
        <link href="{{asset('css/categories/show.css')}}" rel="stylesheet" type="text/css"></link>
        @break
    @case('')
        <link href="{{asset('css/categories/show.css')}}" rel="stylesheet" type="text/css"></link>
        @break
    @case('users.index')
        <link href="{{asset('css/admin/users/index.css')}}" rel="stylesheet" type="text/css"></link>
        @break
    @default
@endswitch

