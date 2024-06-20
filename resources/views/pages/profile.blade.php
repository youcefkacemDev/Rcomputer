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
    <link rel="icon" href="{{ asset('image/logo.png') }}">
    <title>{{ config('app.name') }}</title>
</head>

<body>
    <div class="row h-100">
        <div class="col-lg-2 col-md-12 bg-danger-subtle text-center shadow sidebar-color">
            @include('sidebar.sidebar')
        </div>
        <div class="col-lg-10 continaer image">
            <div class="row  mt-3">
                <div class="col text-start">
                    <h1 class="display-5 fw-bold text-dark">Admin Profile</h1>
                </div>
                <div class="col text-center m-auto mt-4">
                    <a href="{{ route('profile.edit', $admin) }}" class="d-flex justify-content-end me-5 p-auto links">
                        <button class="btn btn-info fw-bold me-5 p-2 px-3 shadow"><i
                                class="bi bi-pencil-square me-2"></i>Edit</button>
                    </a>
                </div>
                <div class="d-block mt-2">
                    @if (session()->has('success'))
                        <div class="w-75 alert alert-dismissible m-auto text-center bg-success-subtle h4 rounded-pill shadow-lg text-success"
                            role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="container mt-5">
                <div class="card padding-5 rounded rounded-5 shadow">
                    <div class="row">
                        <div class="col">
                            <div class="m-5">
                                <div>
                                    <span class="display-5 mt-5 fw-bold">First Name : </span>
                                    <spna class="display-5 m-5">{{ $first_name }}</spna>
                                </div>
                            </div>
                            <div class="m-5">
                                <div>
                                    <span class="display-5 mt-5 fw-bold">Last Name : </span>
                                    <spna class="display-5 m-5">{{ $last_name }}</spna>
                                </div>
                            </div>
                            <div class="m-5">
                                <div>
                                    <span class="display-5 mt-5 fw-bold">Email : </span>
                                    <spna class="display-5 m-5">{{ $email }}</spna>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 m-auto text-center">
                            <img src="{{ $image }}" alt="admin image" class="rounded-5 shadow my-5"
                                width="150px" height="auto">
                        </div>

                    </div>
                </div>


                <div class="d-flex flex-column mt-5">
                    <div class="row mb-5">
                        <div
                            class="col links col px-5 py-3 m-2 bg-light border-5 border-start border-danger shadow rounded-5">
                            <div class="d-block">
                                <div>
                                    <h3 class="display-5 text-danger">Your Products</h3>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="fw-bold text-dark">{{ $products_number }}</h4>
                                    </div>
                                    <div class="col text-end m-auto">
                                        <i class="bi bi-dropbox" style="font-size: 1.5rem; color: rgb(0, 0, 0);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col links col px-5 py-3 m-2 bg-light border-5 border-start border-info shadow rounded-5">
                            <div class="d-block">
                                <div>
                                    <h3 class="display-5 text-info">Your Brands</h3>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="fw-bold text-dark">{{ $brands_number }}</h4>
                                    </div>
                                    <div class="col text-end m-auto">
                                        <i class="bi bi-award-fill" style="font-size: 1.5rem; color: rgb(0, 0, 0);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col links col px-5 py-3 m-2 bg-light border-5 border-start border-warning shadow rounded-5">
                            <div class="d-block">
                                <div>
                                    <h3 class="display-5 text-warning">Your Cateories</h3>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="fw-bold text-dark">{{ $categories_number }}</h4>
                                    </div>
                                    <div class="col text-end m-auto">
                                        <i class="bi bi-bookmark-check-fill"
                                            style="font-size: 1.5rem; color: rgb(0, 0, 0);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
