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
    <div class="container h-100">
        <div class="row">
            <div class="col text-lg-start text-md-start text-sm-center">
                <a href="{{ route('dashboard') }}" class="text-decoration-none text-dark">
                    <img src="{{ asset('logo/logo.png') }}" alt="logo" width="120px" height="120px">
                </a>
            </div>
            <div class=" col text-end m-auto">
                <a href="{{ route('categories') }}" class="text-decoration-none text-dark">
                    <button class="btn btn-danger m-auto shadow"><i class="bi bi-x-square-fill me-2"></i>Cancel</button>
                </a>
            </div>
        </div>
        <div class="d-block mb-5">
            <div class="text-center p-3 my-2">
                <span class="text-dark display-5 fw-bold">
                    Category Edit
                </span>
            </div>
        </div>
        <div class="row justify-content-center align-items-center mt-5">
            <form action="{{ route('category.update', $category) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <input class="form-control form-control-lg my-2 shadow" type="text" name="name"
                            placeholder="Name" value="{{ $category->name }}">
                        @error('name')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row ">
                    <div class="col">
                        <textarea class="form-control form-control-lg my-2 shadow" name="description" cols="40" rows="3"
                            placeholder="Description">{{ $category->description }}</textarea>
                        @error('description')
                            <span class="d-block fs-6 text-danger mt-2">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row ">
                    <div class="col text-end">
                        <button class="btn btn-success hover text-light fw- my-2  shadow" type="submit"><i
                                class="bi bi-save-fill me-2"></i>Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
