<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Detail Produk</title>
</head>

<body>
    @include('common.navbar')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="product-image.jpg" alt="Product Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1>Product Name</h1>
                <p class="price">$99.99</p>
                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempor lectus non
                    tellus fringilla, vel feugiat odio vehicula.</p>
                <button class="btn btn-primary">Add to Cart</button>
            </div>
        </div>
    </div>
    @include('common.footer')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
