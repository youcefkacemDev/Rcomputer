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
                    <h1 class="display-5 fw-bold text-dark">Clients</h1>
                </div>
                <div class="col text-center m-auto mt-4">
                    <form class="d-flex">
                        <input class="form-control me-2 shadow" type="search" placeholder="Search" name="search" aria-label="Search">
                        <button class="btn btn-outline-success fw-bold shadow" type="submit">Search</button>
                    </form>
                </div>
                <div class="col my-auto text-end">

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
                                                    <th scope="col">Frist Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">City</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($clients as $client)
                                                    <tr>
                                                        <td>{{ $client['id'] }}</td>
                                                        <td>{{ $client['created_at']->diffForHumans() }}</td>
                                                        <td>{{ $client['first_name'] }}</td>
                                                        <td>{{ $client['last_name'] }}</td>
                                                        <td>{{ $client['email'] }}</td>
                                                        <td>{{ $client['phone'] }}</td>
                                                        <td>{{ $client['address'] }}</td>
                                                        <td>{{ $client['city'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="my-2">
                                    {{ $clients->links() }}
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
