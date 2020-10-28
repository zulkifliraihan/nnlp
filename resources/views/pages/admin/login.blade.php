<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="https://www.sekolahpengadaan.id/wp-content/uploads/2018/07/cropped-LOGO-LPKN2-32x32.png"
            sizes="32x32">
        <link rel="icon" href="https://www.sekolahpengadaan.id/wp-content/uploads/2018/07/cropped-LOGO-LPKN2-192x192.png"
            sizes="192x192">
        <link rel="apple-touch-icon"
            href="https://www.sekolahpengadaan.id/wp-content/uploads/2018/07/cropped-LOGO-LPKN2-180x180.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Admin LPKN Login">
        <meta name="keywords" content="Seminar online">
        <meta name="author" content="Erik">
        <title>Login Admin LPKN</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('mone/css/app.css') }}" />
        <!-- END: CSS Assets-->

        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
        <!-- END: JS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href=" {{ route('landing') }} " class="-intro-x flex items-center pt-5">
                        <img alt="Logo LPKN" class="w-32" src="{{ asset('pron/img/logo_putih.png') }}">
                    </a>
                    <div class="my-auto">
                        <img alt="Ilustrasi" class="-intro-x w-1/2 -mt-16" src="{{ asset('mone/images/illustration.svg') }}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            Admin LPKN
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white dark:text-gray-500">Login untuk mangakses dashboard admin</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Login
                        </h2>
                        <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Login untuk mangakses dashboard admin</div>
                        <form action="{{ route('login.admin.act') }}" method="POST" id="loginForm">
                            @csrf
                            <div class="intro-x mt-8">
                                <input type="text" name="username" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email">
                                <input type="password" name="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password">
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <input type="submit" value="Login" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3 align-top">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('mone/js/app.js') }}"></script>
        <!-- END: JS Assets-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            $('#loginForm').submit(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                Swal.fire({
                    text : "Mohon menunggu..."
                });

                swal.showLoading();
                $.ajax({
                    type: 'post',
                    url: $(this).attr("action"),
                    data: $(this).find('input, select').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        if(data.status == "ok"){
                            swal.close();
                            Swal.fire({
                                icon: 'success',
                                title: data.messages
                            });
                            
                            setTimeout(function() {
                                window.location.href = "{{ route('admin.dashboard') }}";
                            }, 1000);
                        }
                    },
                    error: function(data){
                        swal.close();
                        var data = data.responseJSON;

                        if(data.status == "fail"){
                            
                            Swal.fire({
                                icon: 'error',
                                title: data.messages
                            })

                            // if(data.email === true){
                            //     $('#emailNotif').removeClass('d-none');
                            // }
                        }
                    }
                });
            });
        </script>
    </body>
</html>