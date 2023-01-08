@include('Dashboard.header')

<head>
    <style>
        .imagess{
            background: url("https://i.pinimg.com/564x/f4/95/39/f49539e45aed23317e9236cb43424158.jpg");
            background-position: center;
            background-size: cover;
        }
    </style>
</head>


<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block imagess"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang !</h1>
                                        <span class="small">Silahkan Log in </span><hr>
                                        @if (session('loginError'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session ('loginError') }}
                                    </div>
                                            @endif
                                    <form action= "{{ route('postlogin') }}" method="post" class="user">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="username"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Username...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password"
                                                id="exampleInputPassword" placeholder="Enter Password...">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <br>
                                        <br>
                                        <br><br><br>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@include('Dashboard.script')
