@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Create or Update Category</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        @if (session('success'))
            @php
                $details = session('success');
            @endphp
            <div class="alert alert-success">
                Category saved successfully! <br>
                Name: {{ $details['name'] }} <br>
                Subject: {{ $details['subject'] }} <br>
                Year: {{ $details['year'] }} <br>
                Price: {{ $details['price'] }} <br>
                Number: {{ $details['number'] }}
            </div>
        @endif

        <form action="{{ url('categories') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="existingCategory">Select Existing Category (if any)</label>
                <select name="existingCategory" id="existingCategory" class="form-control">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->Name }} - {{ $category->Subject }} - {{ $category->Year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="nameField">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
            </div>
            <div class="form-group" id="subjectField">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter subject">
            </div>
            <div class="form-group" id="yearField">
                <label for="year">Year</label>
                <input type="text" name="year" id="year" class="form-control" placeholder="Enter year">
            </div>
            <div class="form-group" id="numberField">
                <label for="number">Number</label>
                <input type="number" name="number" id="number" class="form-control" placeholder="Enter number" required>
            </div>
            <div class="form-group" id="priceField">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control" placeholder="Enter price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <a href="{{ route('main') }}" class="btn btn-secondary mt-3">Back to Main</a>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const existingCategorySelect = document.getElementById('existingCategory');
            const nameField = document.getElementById('nameField');
            const subjectField = document.getElementById('subjectField');
            const yearField = document.getElementById('yearField');
            const numberField = document.getElementById('numberField');
            const priceField = document.getElementById('priceField');
            const priceInput = document.getElementById('price');

            existingCategorySelect.addEventListener('change', function () {
                if (this.value) {
                    nameField.style.display = 'none';
                    subjectField.style.display = 'none';
                    yearField.style.display = 'none';
                    numberField.style.display = 'block';
                    priceField.style.display = 'block';

                    // Fetch the price for the selected category
                    fetch(`/categories/${this.value}/price`)
                        .then(response => response.json())
                        .then(data => {
                            priceInput.value = data.price;
                        })
                        .catch(error => console.error('Error fetching price:', error));
                } else {
                    nameField.style.display = 'block';
                    subjectField.style.display = 'block';
                    yearField.style.display = 'block';
                    numberField.style.display = 'block';
                    priceField.style.display = 'block';
                    priceInput.value = '';
                }
            });
        });
    </script>
@endsection
