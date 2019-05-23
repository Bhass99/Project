@extends('layout.layout')

@section('extra-css')
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    
@endsection
@section('content')
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin paneel</h3>
            </div>
            <ul class="list-unstyled components">
                <p>Hallo, {{ Auth::user()->name }}</p>
                <li>
                    <a href="{{route('createEvents')}}">Toevoegen</a>
                </li>
                <li>
                    <a href="{{route('displayEvents')}}">Wijzigen/verwijderen</a>
                </li>
                <li>
                    <a href="{{route('volunteer.index')}}">Bekijk vrijwilligers</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span class="toggleText">Verberg menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <a href="{{route('events')}}"id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Terug naar de website</span>
                    </a>
                </div>
            </nav>
            @yield('admin-content')
            
        </div>
    </div>
   
@endsection
@section('extra-js')
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function (e) {
                var bool = true
                var g = $('#sidebar').toggleClass('active');
                // $('.toggleText').text('Verberg menu');    
                $('.toggleText').text(($('.toggleText').text() == 'Verberg menu') ? 'Open menu' : 'Verberg menu');
                    // $().text('Verberg menu');       

                // if(g){
                // }else if(!g){
                //     $('.toggleText').text('Open menu');    
                // }
            });
        });
    </script>

@endsection