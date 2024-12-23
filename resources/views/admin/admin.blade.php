<!DOCTYPE html>
<html lang="">
    <head>
        <base href="/">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/admin.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&family=Signika:wght@300..700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="assets/plugin/OwlCarousel/dist/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="assets/plugin/OwlCarousel/dist/owl.theme.default.min.css"
    />
    <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" 
    integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/plugin/fontawesome/css/all.min.css">
            @yield('css')
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <a class="navbar-brand" href="#"><i class="fa-solid fa-house"></i></a>
                <ul class="nav navbar-nav">
                    <li >
                        <a href="{{ route('admin.index') }}">Trang Chủ</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="">{{ auth()->user()->name }}</a></li>
                    <li><a href="{{ route('admin.logout') }}"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                </ul>
            </div>
        </nav>
        
        <div class="container">@yield('main')</div>

        <!-- jQuery -->
        <script src="assets/js/jquery.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/plugin/OwlCarousel/dist/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
        @if(Session::has('ok'))
        <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{ Session::get('ok') }}",
            showHideTransition: 'slide',
            position: 'top-center',
            icon: 'sucsses'
        })
        </script>
        @endif

        @if(Session::has('no'))
        <script>
        $.toast({
            heading: 'Thông báo',
            text: "{{ Session::get('no') }}",
            showHideTransition: 'slide',
            position: 'top-center',
            icon: 'error'
        })
        </script>
        @endif
        @yield('js')
    </body>
</html>
