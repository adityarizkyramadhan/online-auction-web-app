<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product History with Bootstrap</title>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 62.5vh;
            margin-bottom: auto;
        }

        .footer {
            height: 60px;
            /* Set the height of your footer */
            background-color: #333;
            color: #fff;
            width: 100%;
        }
    </style>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    @include('common.navbar')
    @include('common.error')
    <div class="container mt-5 wrapper">
        <h1 class="text-center">Product History</h1>
        @if ($dataArray == null)
            <div class="alert alert-warning">
                There is no product.
            </div>
        @else
            <div class="row">
                @foreach ($dataArray as $data)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="{{ $data->good_image }}" class="card-img-top" alt="Product 1">
                            <div class="card-body">
                                <h5 class="card-title">{{ $data->good_name }}</h5>
                                <p class="card-text">Your Bid : {{ $data->bid_price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Tambahkan produk lainnya di sini -->
            </div>
        @endif

    </div>
    @include('common.footer')

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
