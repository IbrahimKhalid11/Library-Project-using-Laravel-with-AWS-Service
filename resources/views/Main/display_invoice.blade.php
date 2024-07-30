<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Display</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Category Details</h1>
        <div class="alert alert-success">
            Invoice saved successfully! Invoice ID: {{ $invoiceId }}
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Subject</th>
                    <th>Number</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>New Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category['Name'] }}</td>
                        <td>{{ $category['Year'] }}</td>
                        <td>{{ $category['Subject'] }}</td>
                        <td>{{ $category['Number'] }}</td>
                        <td>${{ $category['Price'] }}</td>
                        <td>{{ $category['Discount'] }}%</td>
                        <td>${{ number_format($category['Price'] * $category['Number'] * (1 - $category['Discount'] / 100), 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total Price: ${{ number_format($totalPrice, 2) }}</h3>
        <a href="{{ route('invoice') }}" class="btn btn-secondary">Back to Invoice</a>
    </div>
</body>
</html>
