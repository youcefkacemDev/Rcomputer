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
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</head>

<body>
    <div class="row h-100">
        <div class="col-lg-2 col-md-12 bg-danger-subtle text-center shadow sidebar-color">
            @include('sidebar.sidebar')
        </div>
        <div class="col-lg-10 continaer image">
            <div class="row  mt-3">
                <div class="col text-start">
                    <h1 class="display-5 fw-bold text-dark">Dashboard</h1>
                </div>
                <div class="col text-center m-auto mt-4">
                    <form class="d-flex">
                        <input class="form-control me-2 shadow" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success fw-bold shadow" type="submit">Search</button>
                    </form>
                </div>
                <div class="col text-end m-auto mt-4">
                    <a href="{{ route('Profile') }}" class="d-flex justify-content-end p-auto links">
                        <div class="my-auto">
                            <span class="h4 p-3 text-dark">{{ $fullName }}</span>
                        </div>
                        <div class="my-auto">
                            <img src="{{ $image }}" alt="admin image" class="rounded-pill shadow-lg me-5"
                                width="50px" height="50px">
                        </div>
                    </a>
                </div>
            </div>
            <div class="container mt-5">
                <div class="d-block">
                    @if (session()->has('success'))
                        <div class="w-75 alert alert-dismissible m-auto text-center bg-success-subtle h4 rounded-pill shadow-lg text-success"
                            role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="row mt-5">
                    <a href="{{ route('products') }}"
                        class="links col px-5 py-3 m-2 bg-light border-5 border-start border-danger shadow rounded-5">
                        <div>
                            <div class="d-block">
                                <div>
                                    <h3 class="display-5 text-danger">Products</h3>
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
                    </a>
                    <a href="{{ route('brands') }}"
                        class="links col px-5 py-3 m-2 bg-light border-5 border-start border-info shadow rounded-5">
                        <div>
                            <div class="d-block">
                                <div>
                                    <h3 class="display-5 text-info">Brands</h3>
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
                    </a>
                    <a href="{{ route('categories') }}"
                        class="links col px-5 py-3 m-2 bg-light border-5 border-start border-warning shadow rounded-5">
                        <div>
                            <div class="d-block">
                                <div>
                                    <h3 class="display-5 text-warning">Categories</h3>
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
                    </a>
                    <a href="{{ route('orders') }}"
                        class=" links col px-5 py-3 m-2 bg-light border-5 border-start border-success shadow rounded-5">
                        <div>
                            <div class="d-block">
                                <div>
                                    <h3 class="display-5 text-success">Orders</h3>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h4 class="fw-bold text-dark">{{ $orders_number }}</h4>
                                    </div>
                                    <div class="col text-end m-auto">
                                        <i class="bi bi-person-lines-fill"
                                            style="font-size: 1.5rem; color: rgb(0, 0, 0);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <div class="col-6 card rounded-5 shadow my-5">
                        {!! $chart->container() !!}
                        {!! $chart->script() !!}
                    </div>
                    <divn class="col-5 card rounded-5 shadow m-5">
                        {!! $chart_circle->container() !!}
                        {!! $chart_circle->script() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
