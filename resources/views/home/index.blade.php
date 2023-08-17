<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auction Website</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    @include('common.navbar')
    <section class="container my-5">
        <div class="row justify-content-center">
            @foreach ($items as $item)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $item->image }}" class="card-img-top" alt="Auction Item 1">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text">Starting Bid: {{ $item->price }}</p>
                            <button class="btn btn-primary">Place Bid</button>
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
