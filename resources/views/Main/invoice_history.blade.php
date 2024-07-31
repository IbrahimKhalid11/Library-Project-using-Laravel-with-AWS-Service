@extends('layouts.app')

@section('title', 'Invoice History')

@section('content')
    <div class="container mt-5">
        <h1>Invoice History</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Subject</th>
                    <th>Number</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>New Price</th>
                    <th>Total Price</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    @php
                        $categories = json_decode($invoice->categories, true); // Cast to array
                    @endphp
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $invoice->id }}</td>
                            <td>{{ $category['Name'] }}</td>
                            <td>{{ $category['Year'] }}</td>
                            <td>{{ $category['Subject'] }}</td>
                            <td>{{ $category['Number'] }}</td>
                            <td>${{ $category['Price'] }}</td>
                            <td>{{ $category['Discount'] }}%</td>
                            <td>${{ $category['NewPrice'] }}</td>
                            @if ($loop->first)
                                <td rowspan="{{ count($categories) }}">${{ $invoice->total_price }}</td>
                                <td rowspan="{{ count($categories) }}">{{ \Carbon\Carbon::parse($invoice->created_at)->format('Y-m-d H:i:s') }}</td>
                            @endif
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('invoice') }}" class="btn btn-secondary">Back to Invoice</a>
    </div>
@endsection
