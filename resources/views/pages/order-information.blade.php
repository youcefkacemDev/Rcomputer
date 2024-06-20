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
                    <h1 class="display-5 fw-bold text-dark">Order Information</h1>
                </div>
                <div class="col text-center m-auto mt-4">
                    <a href="{{ route('orders') }}" class="d-flex justify-content-end me-5 p-auto links">
                        <button class="btn btn-danger fw-bold me-5 p-2 px-3 shadow"><i
                                class="bi bi-backspace-fill me-2"></i>Cancel</button>
                    </a>
                </div>
            </div>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-3 card padding-5 rounded rounded-5 shadow m-2">
                        <div class="row">
                            <div class="col">
                                <div class="my-3">
                                    <div class="text-center">
                                        <span class="display-5">Client</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="my-3">
                                    <div>
                                        <span class="fw-bold">First Name : </span>
                                        <spna>{{ $client['first_name'] }}</spna>
                                    </div>
                                </div>
                                <hr>
                                <div class="my-3">
                                    <div>
                                        <span class="fw-bold">Last Name : </span>
                                        <spna>{{ $client['last_name'] }}</spna>
                                    </div>
                                </div>
                                <hr>
                                <div class="my-3">
                                    <div>
                                        <span class="fw-bold">Phone : </span>
                                        <spna>{{ $client['phone'] }}</spna>
                                    </div>
                                </div>
                                <hr>
                                <div class="my-3">
                                    <div>
                                        <span class="fw-bold">Email : </span>
                                        <spna>{{ $client['email'] }}</spna>
                                    </div>
                                </div>
                                <hr>
                                <div class="my-3">
                                    <div>
                                        <span class="fw-bold">Address : </span>
                                        <spna>{{ $client['address'] }}</spna>
                                    </div>
                                </div>
                                <hr>
                                <div class="my-3">
                                    <div>
                                        <span class="fw-bold">City : </span>
                                        <spna>{{ $client['city'] }}</spna>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <div class="col card padding-5 rounded rounded-5 shadow m-2">
                        <div class="row">
                            <div class="col">
                                <div class="my-3">
                                    <div>
                                        <span class="display-5">Products</span>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div class="row">
                                        @foreach ($orderProduct as $op)
                                            <div class="col card rounded-3 m-3 shadow ">
                                                <div class="text-center p-2">
                                                    <img src="{{ '/storage/' . $op->getProduct($op['product_id'])->image }}" alt="" width="120">
                                                </div>
                                                <div class="text-center p-2">
                                                    <span class="fw-bold h3">{{ $op->getProduct($op['product_id'])->name }}</span>
                                                </div>
                                                <hr>
                                                <div>
                                                    <span class="fw-bold">Quantity : </span>
                                                    <span>{{ $op['product_quantity']}}</span>
                                                </div>
                                                <hr>
                                                <div>
                                                    <span class="fw-bold">Price (P): </span>
                                                    <span>{{$op->getProduct($op['product_id'])->price }} <span class="fw-bold">DA</span></span>
                                                </div>
                                                <hr>
                                                <div>
                                                    <span class="fw-bold">Price (Q): </span>
                                                    <span>{{$op->getProduct($op['product_id'])->price *  $op['product_quantity'] }} <span class="fw-bold">DA</span></span>
                                                </div>
                                                <hr>
                                                <div>
                                                    <span class="fw-bold">sku : </span>
                                                    <span>{{$op->getProduct($op['product_id'])->sku }}</span>
                                                </div>
                                                <hr>
                                                <div>
                                                    <span class="fw-bold">Discount : </span>
                                                    <span>{{$op->getProduct($op['product_id'])->discount }} <span class="fw-bold">DA</span></span>
                                                </div>
                                                <hr>
                                            </div>
                                        @endforeach
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
