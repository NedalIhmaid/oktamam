<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="description" content="">

    <title>OK Tamam</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">

    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">

    @if (app()->getLocale() == 'ar')

        {{--google font--}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo:400,600&display=swap">

        <style>
            body {
                font-family: 'cairo', 'sans-serif';
            }
        </style>
    @endif

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{--jquery--}}
    <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/jquery-ui.js') }}"></script>

    <style>
        .form-control {
            padding: 0.20rem 0.75rem;
        }

        label {
            font-weight: bold;
        }

    </style>
</head>

<body class="app sidebar-mini">

@include('layouts.dashboard._header')

@include('layouts.dashboard._aside')

<main class="app-content">

    @include('dashboard.partials._session')

    @yield('content')

</main><!-- end of main -->

<!-- Essential javascripts for application to work-->
<script src="{{ asset('dashboard_files/js/popper.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

{{--select 2--}}
<script type="text/javascript" src="{{ asset('dashboard_files/plugins/select2/select2.min.js') }}"></script>

<script src="{{ asset('dashboard_files/js/main.js') }}"></script>

<!-- The javascript plugin to display page loading on top-->
{{--<script src="{{ asset('dashboard_files/plugins/pace/pace.min.js') }}"></script>--}}

<!-- Page specific javascripts-->
{{--<script type="text/javascript" src="{{ asset('dashboard_files/plugins/chart/chart.js') }}"></script>--}}

<!-- ckeditor -->
<script src="{{ asset('dashboard_files/plugins/ckeditor/ckeditor.js') }}"></script>

<script>
    $(document).ready(function () {

        //delete
        $(document).on('click', '.delete', function (e) {

            var that = $(this)

            e.preventDefault();

            var n = new Noty({
                text: "Confirm deleting record",
                type: "alert",
                killer: true,
                buttons: [
                    Noty.button("Yes", 'btn btn-success mr-2', function () {
                        that.closest('form').submit();
                    }),

                    Noty.button("No", 'btn btn-primary mr-2', function () {
                        n.close();
                    })
                ]
            });

            n.show();

        });//end of delete


    });//end of document ready

    //select 2
    $('.select2').select2({
        'width': '100%',
    });
</script>
</body>
</html>