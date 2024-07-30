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
                @php
                    $totalPrice = 0;
                @endphp
                @foreach ($categories as $category)
                    @php
                        $discount = $category['Discount'] / 100;
                        $newPrice = $category['Price'] * $category['Number'] * (1 - $discount);
                        $totalPrice += $newPrice;
                    @endphp
                    <tr>
                        <td>{{ $category['Name'] }}</td>
                        <td>{{ $category['Year'] }}</td>
                        <td>{{ $category['Subject'] }}</td>
                        <td>{{ $category['Number'] }}</td>
                        <td>${{ $category['Price'] }}</td>
                        <td>{{ $category['Discount'] }}%</td>
                        <td>${{ number_format($newPrice, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total Price: ${{ number_format($totalPrice, 2) }}</h3>
        <a href="{{ route('invoice') }}" class="btn btn-secondary">Back to Form</a>
    </div>
</body>
</html>
