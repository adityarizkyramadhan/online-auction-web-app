<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Detail Product</title>
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

        /* Styling for the modal */
        #bidModal {
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-dialog {
            margin-top: 15%;
        }

        .modal-content {
            background-color: #fff;
            border: none;
            border-radius: 5px;
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-title {
            font-size: 1.25rem;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: none;
        }
    </style>
</head>

<body>
    @include('common.navbar')
    @include('common.error')
    <div class="container mt-5 wrapper">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ $item->image }}" alt="Product Image" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1>{{ $item->name }}</h1>
                <h5 class="price">Price : {{ $item->price }}</h5>
                <h5> Description</h5>
                <p class="description">{{ $item->description }}</p>
                <button class="btn btn-primary" id="openModalBtn">Bid</button>
            </div>
        </div>
    </div>
    <div class="container">
        <h2>Bid List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Price</th>
                    <th>User ID</th>
                    <th>Good ID</th>
                    <th>Good Name</th>
                    <th>User Name</th>
                    <th>Bid Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataArray as $index => $data)
                    <tr @if ($index === 0) style="background-color: #70FF54;" @endif>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->user_id }}</td>
                        <td>{{ $data->good_id }}</td>
                        <td>{{ $data->good_name }}</td>
                        <td>{{ $data->user_name }}</td>
                        <td>{{ $data->bid_price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('common.footer')
    <div id="bidModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Input Bid</h5>
                    </div>
                    <div class="modal-body">
                        <form id="bidForm">
                            <div class="form-group">
                                <label for="bidAmount">Bid Amount:</label>
                                <input type="number" class="form-control" id="bidAmount" name="bidAmount" required
                                    min="{{ $minPrice }}">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="submitBidBtn">Submit Bid</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script>
            // Get the modal element
            const modal = document.getElementById('bidModal');

            // Get the button that opens the modal
            const openModalBtn = document.getElementById('openModalBtn');

            // Get the submit bid button
            const submitBidBtn = document.getElementById('submitBidBtn');

            // When the user clicks the button, open the modal
            openModalBtn.addEventListener('click', () => {
                modal.style.display = 'block';
            });

            // When the user clicks the close button or outside the modal, close the modal
            modal.addEventListener('click', (event) => {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });

            // When the user clicks the submit bid button, handle the form submission
            submitBidBtn.addEventListener('click', () => {
                const bidAmount = parseFloat(document.getElementById('bidAmount').value);

                if (bidAmount < {{ $minPrice }}) {
                    alert('Bid amount must be greater than or equal to {{ $minPrice }}');
                } else {
                    const formData = {
                        _token: '{{ csrf_token() }}',
                        price: bidAmount,
                        good_id: '{{ $item->id }}'
                    };

                    // Using fetch to perform the POST request
                    fetch('/bid', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(formData)
                    }).then((response) => {
                        return response.json();
                    }).then((data) => {
                        if (data) {
                            alert('Bid successfully submitted');
                        } else {
                            alert('Bid failed to submit');
                        }
                    }).catch((error) => {
                        alert('Bid failed to submit');
                    });
                }

                // Close the modal
                modal.style.display = 'none';

                // Reload the page
                location.reload();
            });
        </script>
</body>

</html>
