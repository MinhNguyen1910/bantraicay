<!DOCTYPE html>
<html lang="">
    <head>
        <base href="/">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Title Page</title>
        <style>
            body {
                background-image: url('uploads/Banner/pexels-pixabay-206359.jpg');
            }
        </style>
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
    </head>
    <body>
        <h1 class="text-center" style="color: white;">Trang Đăng Ký Quản Lý</h1>

        <div class="container">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng Ký</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST" role="form">
                            @csrf
                            <div class="form-group">
                                <label for="">Tên</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Input name"
                                />
                                @error('name')
                                <small class="error-message ">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Email</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="email"
                                    placeholder="Input email"
                                />
                                @error('email')
                                <small class="error-message ">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Mật Khẩu</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="password"
                                    placeholder="Input password"
                                />
                                @error('password')
                                <small class="error-message ">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Nhập Lại Mật Khẩu</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="confirm_password"
                                    placeholder="Input password again"
                                />
                                @error('confirm_password')
                                <small class="error-message ">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success">
                                Đăng Ký
                            </button>

                            <a
                                href="{{ route('manager.login') }}"
                                class="btn btn-primary"
                                >Đăng Nhập</a
                            >
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
    </body>
</html>
