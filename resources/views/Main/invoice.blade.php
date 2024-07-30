@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Category Form</h1>
        <form action="{{ route('displayInvoice') }}" method="POST">
            @csrf
            <table class="table table-bordered" id="categories-table">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Year</th>
                        <th>Number</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>New Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="categories[0][Name]" required>
                                <option value="">Select Name</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->Name }}">{{ $category->Name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="categories[0][Subject]" required>
                                <option value="">Select Subject</option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="categories[0][Year]" required>
                                <option value="">Select Year</option>
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="categories[0][Number]" value="1" required oninput="updateNewPrice(0)"></td>
                        <td><input type="number" class="form-control" name="categories[0][Price]" readonly></td>
                        <td>
                            <select class="form-control" name="categories[0][Discount]" required onchange="updateNewPrice(0)">
                                <option value="0">0%</option>
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}">{{ $i }}%</option>
                                @endfor
                            </select>
                        </td>
                        <td><input type="number" class="form-control" name="categories[0][NewPrice]" readonly></td>
                        <td><button type="button" class="btn btn-danger" onclick="removeCategoryRow(this)">-</button></td>
                    </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-secondary mb-3" onclick="addCategoryRow()">+</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <h3>Total Price: $<span id="totalPrice">0.00</span></h3>
    </div>
@endsection

<script>
    // Include the JavaScript code here
</script>
