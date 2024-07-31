@extends('layouts.app')

@section('title', 'Invoice')

@section('content')
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
                        <td>${{ $category['NewPrice'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h3>Total Price: ${{ $totalPrice }}</h3>
        <a href="{{ route('invoice') }}" class="btn btn-secondary">Back to Invoice</a>
    </div>
@endsection
