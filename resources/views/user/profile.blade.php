<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
</head>

<body>
    @include('common.navbar')
    @include('common.error')
    <div class="container mt-5 wrapper">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h1 class="card-title">{{ $user->name }}</h1>
                        <p class="card-text">Email: <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                        <p class="card-text">Address: {{ $user->address }}</p>
                        <p class="card-text">Phone : {{ $user->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('common.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
