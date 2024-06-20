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
                    <h1 class="display-5 fw-bold text-dark">Orders</h1>
                </div>
                <div class="col text-center m-auto mt-4">

                </div>
                <div class="col my-auto text-end">

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
                <div class="bg-image">
                    <div class="mask d-flex align-items-center">
                        <div class="container">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <table class="table table-striped mb-0 text-center shadow">
                                            <thead style="background-color: #002d72;">
                                                <tr>
                                                    <td scope='col'>#</td>
                                                    <th scope="col">Time</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Client Name</th>
                                                    <th scope="col">Total Price</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $order['id'] }}</td>
                                                        <td>{{ $order['created_at']->diffForHumans() }}</td>
                                                        <td>{{ $order['updated_at']->toDateString() }}</td>
                                                        <td>{{ $order->order($order['client_id'])->first_name }}
                                                            {{ $order->order($order['client_id'])->last_name }}</td>
                                                        <td>{{ $order['total_price'] }} <span class="fw-bold">DA</span></td>
                                                        <td>
                                                            <a href="{{ route('order.information', $order['id']) }}"><button
                                                                    class="btn btn-warning my-1"><i
                                                                        class="bi bi-eye-fill"></i></button></a>

                                                            <form action="{{ route('order.destroy', $order['id']) }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-danger my-1"><i
                                                                        class="bi bi-trash-fill"></i></button>
                                                            </form>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="my-2">
                                    {{ $orders->links() }}
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
