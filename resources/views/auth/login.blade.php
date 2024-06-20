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
    <link rel="stylesheet" href="/css/background.css">
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
        <div class="d-block">
            @if (session()->has('success'))
                <div class="w-75 alert alert-dismissible m-auto text-center bg-success-subtle h4 rounded-pill shadow-lg text-success"
                    role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="d-block mb-5">
            <div class="text-center p-3 my-2">
                <span class="text-dark display-5 fw-bold">
                    Log in
                </span>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-5">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-lg my-2 shadow rounded-pill input_width" type="email"
                            name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-lg my-2 shadow rounded-pill" type="password"
                            name="password" placeholder="Password" required>
                        @error('email')
                            <span class="d-block fs-6 text-danger mt-2 text-center">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row ">
                    <div class="col text-end">
                        <button class="btn btn-success hover text-light fw- my-2 rounded-pill shadow" type="submit"><i
                                class="bi bi-box-arrow-in-right me-2"></i>Log in</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="d-block mt-5">
            <span class="text-center blockquote">
                <p>Not a memeber yet ? <a href="{{ route('register') }}"
                        class="text-decoration-none ms-1 fst-italic">register</a></p>
            </span>
        </div>
    </div>
</body>

</html>
