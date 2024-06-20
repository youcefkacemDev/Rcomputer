<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="{{ asset('image/logo.png') }}">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div class="container">
        <div class="d-block">
            <div class="text-lg-start text-md-start text-sm-center">
                <a href="{{ route('dashboard') }}" class="text-decoration-none text-dark">
                    <img src="{{ asset('logo/logo.png') }}" alt="logo" width="120px" height="120px">
                </a>
            </div>
        </div>
        <div class="d-block mb-5">
            <div class="text-center p-3 my-2">
                <span class="text-dark display-5 fw-bold">
                    Register
                </span>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-5">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-lg my-2 shadow rounded-pill input_width" type="text"
                            name="first_name" placeholder="FirstName" required>
                        @error('first_name')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <input class="form-control form-control-lg my-2 shadow rounded-pill input_width" type="text"
                            name="last_name" placeholder="LastName" required>
                        @error('last_name')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-lg my-2 shadow rounded-pill" type="password"
                            name="password" placeholder="Password" required>
                        @error('password')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-lg my-2 shadow rounded-pill" type="password"
                            name="password_confirmation" placeholder="Password confirmation" required>
                        @error('password_confirmation')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-lg my-2 shadow rounded-pill" type="email"
                            name="email" placeholder="Email" required>
                        @error('email')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-lg my-2 shadow rounded-pill" type="file"
                            name="image">
                        @error('image')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row ">
                    <div class="col text-end">
                        <button class="btn btn-success hover text-light fw- my-2 rounded-pill shadow" type="submit"><i
                                class="bi bi-check-square me-2"></i>Register</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="d-block mt-5">
            <span class="text-center blockquote">
                <p>You a memeber ? <a href="{{ route('login') }}" class="text-decoration-none ms-1 fst-italic">Log
                        in</a></p>
            </span>
        </div>
    </div>
</body>

</html>
