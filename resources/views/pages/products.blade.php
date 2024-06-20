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
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('image/logo.png') }}">
</head>

<body>
    <div class="row  h-100">
        <div class="col-lg-2 col-md-12 bg-danger-subtle text-center shadow sidebar-color">
            @include('sidebar.sidebar')
        </div>
        <div class="col-lg-10 continaer image">
            <div class="row mt-3">
                <div class="col text-start">
                    <h1 class="display-5 fw-bold text-dark">Products</h1>
                </div>
                <div class="col text-center m-auto mt-4">
                    <form action="{{ route('products') }}" class="d-flex">
                        <input class="form-control me-2 shadow" type="search" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success fw-bold shadow" type="submit">Search</button>
                    </form>
                </div>
                <div class="col my-auto text-end">
                    <a href="{{ route('product-form') }}">
                        <button class="btn btn-info fw-bold me-5 p-2 px-3 shadow"><i
                                class="bi bi-plus-square-fill me-2"></i>Add</button>
                    </a>
                </div>
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
            </div>
            <div class="container mt-5">
                <div class="bg-image">
                    <div class="mask d-flex align-items-center">
                        <div class="container">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-striped mb-0 text-center shadow">
                                            <thead style="background-color: #002d72;">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Sku</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Brand</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Descount</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="cal">Image</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr>
                                                        <td>{{ $product['id'] }}</td>
                                                        <td>{{ $product['created_at']->diffForHumans() }}</td>
                                                        <td>{{ $product['sku'] }}</td>
                                                        <td>{{ $product['name'] }}</td>
                                                        <td>{{ $product->getBrand($product['brand_id']) }}</td>
                                                        <td>{{ $product->getCategory($product['category_id']) }}</td>
                                                        <td>{{ $product['description'] }}</td>
                                                        <td>{{ $product['price'] }} <span class="fw-bold">DA</span></td>
                                                        <td>{{ $product['discount'] }}</td>
                                                        <td>{{ $product['quantity'] }}</td>
                                                        <td><img src="{{ 'storage/' . $product['image'] }}" alt="" width="100"></td>
                                                        <td class="px-4">
                                                            <form action="{{ route('product.edit', $product) }}" method="get">
                                                                @csrf
                                                                <button data-toggle="tooltip" data-placement="top" title="Edit" class="{{ (Auth::id() === $product['admin_id']) ? "btn btn-warning mx-2" : "btn btn-warning mx-2 disabled" }} "><i
                                                                        class="bi bi-pencil-square"></i></button>
                                                            </form>
                                                            <form action="{{ route('product.destroy', $product) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button data-toggle="tooltip" data-placement="top" title="Delete" class="{{ (Auth::id() === $product['admin_id']) ? "btn btn-danger mx-2" : "btn btn-danger mx-2 disabled" }} ">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="my-2">
                                    {{ $products->links() }}
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
