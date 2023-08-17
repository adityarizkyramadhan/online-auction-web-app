<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction Website</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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
            min-height: 72vh;
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
</head>

<body>
    @include('common.navbar')
    @include('common.error')
    <section class="container my-5 wrapper">
        <div class="row justify-content-center">
            @foreach ($items as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $item->image }}" class="card-img-top" alt="Auction Item 1">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">Starting Bid: {{ $item->price }}</p>
                            <a href="/goods/detail/{{ $item->id }}" class="btn btn-primary">Bid Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- Add more auction items as needed -->
        </div>
    </section>
    @include('common.footer')
    <!-- Include Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
