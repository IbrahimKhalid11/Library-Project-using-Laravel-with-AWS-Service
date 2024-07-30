<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function updateSubjects(rowIndex) {
                const nameSelect = document.querySelector(`select[name="categories[${rowIndex}][Name]"]`);
                const subjectSelect = document.querySelector(`select[name="categories[${rowIndex}][Subject]"]`);
                const yearSelect = document.querySelector(`select[name="categories[${rowIndex}][Year]"]`);
                const priceInput = document.querySelector(`input[name="categories[${rowIndex}][Price]"]`);
                const numberInput = document.querySelector(`input[name="categories[${rowIndex}][Number]"]`);
                const discountSelect = document.querySelector(`select[name="categories[${rowIndex}][Discount]"]`);
                const newPriceInput = document.querySelector(`input[name="categories[${rowIndex}][NewPrice]"]`);

                subjectSelect.innerHTML = '<option value="">Select Subject</option>';
                yearSelect.innerHTML = '<option value="">Select Year</option>';
                priceInput.value = '';
                newPriceInput.value = '';
                numberInput.value = 1;

                fetch(`/categories/subjects?name=${nameSelect.value}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        data.forEach(subject => {
                            const option = document.createElement('option');
                            option.value = subject.Subject;
                            option.text = subject.Subject;
                            subjectSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching subjects:', error));

                subjectSelect.addEventListener('change', () => updateYears(rowIndex));
                numberInput.addEventListener('input', () => updateNewPrice(rowIndex));
                discountSelect.addEventListener('change', () => updateNewPrice(rowIndex));
            }

            function updateYears(rowIndex) {
                const nameSelect = document.querySelector(`select[name="categories[${rowIndex}][Name]"]`);
                const subjectSelect = document.querySelector(`select[name="categories[${rowIndex}][Subject]"]`);
                const yearSelect = document.querySelector(`select[name="categories[${rowIndex}][Year]"]`);
                const priceInput = document.querySelector(`input[name="categories[${rowIndex}][Price]"]`);
                const numberInput = document.querySelector(`input[name="categories[${rowIndex}][Number]"]`);
                const discountSelect = document.querySelector(`select[name="categories[${rowIndex}][Discount]"]`);
                const newPriceInput = document.querySelector(`input[name="categories[${rowIndex}][NewPrice]"]`);

                yearSelect.innerHTML = '<option value="">Select Year</option>';
                priceInput.value = '';
                newPriceInput.value = '';

                fetch(`/categories/years?name=${nameSelect.value}&subject=${subjectSelect.value}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        data.forEach(year => {
                            const option = document.createElement('option');
                            option.value = year.Year;
                            option.text = year.Year;
                            yearSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error fetching years:', error));

                yearSelect.addEventListener('change', () => updatePrice(rowIndex));
            }

            function updatePrice(rowIndex) {
                const nameSelect = document.querySelector(`select[name="categories[${rowIndex}][Name]"]`);
                const subjectSelect = document.querySelector(`select[name="categories[${rowIndex}][Subject]"]`);
                const yearSelect = document.querySelector(`select[name="categories[${rowIndex}][Year]"]`);
                const numberInput = document.querySelector(`input[name="categories[${rowIndex}][Number]"]`);
                const priceInput = document.querySelector(`input[name="categories[${rowIndex}][Price]"]`);
                const discountSelect = document.querySelector(`select[name="categories[${rowIndex}][Discount]"]`);
                const newPriceInput = document.querySelector(`input[name="categories[${rowIndex}][NewPrice]"]`);

                fetch(`/categories/price?name=${nameSelect.value}&subject=${subjectSelect.value}&year=${yearSelect.value}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok ' + response.statusText);
                        }
                        return response.json();
                    })
                    .then(data => {
                        priceInput.value = data;
                        updateNewPrice(rowIndex);
                    })
                    .catch(error => console.error('Error fetching price:', error));
            }

            function updateNewPrice(rowIndex) {
                const priceInput = document.querySelector(`input[name="categories[${rowIndex}][Price]"]`);
                const numberInput = document.querySelector(`input[name="categories[${rowIndex}][Number]"]`);
                const discountSelect = document.querySelector(`select[name="categories[${rowIndex}][Discount]"]`);
                const newPriceInput = document.querySelector(`input[name="categories[${rowIndex}][NewPrice]"]`);

                const discount = (discountSelect.value || 0) / 100;
                const newPrice = (priceInput.value * (numberInput.value || 1) * (1 - discount)).toFixed(2);
                newPriceInput.value = newPrice;
                updateTotalPrice();
            }

            function updateTotalPrice() {
                const newPriceInputs = document.querySelectorAll(`input[name*="[NewPrice]"]`);
                let totalPrice = 0;
                newPriceInputs.forEach(input => {
                    totalPrice += parseFloat(input.value) || 0;
                });
                document.getElementById('totalPrice').innerText = totalPrice.toFixed(2);
            }

            function addCategoryRow() {
                const table = document.getElementById('categories-table');
                const rowCount = table.rows.length;
                const row = table.insertRow(rowCount);

                row.innerHTML = `
                    <td>
                        <select class="form-control" name="categories[${rowCount}][Name]" required>
                            <option value="">Select Name</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->Name }}">{{ $category->Name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="categories[${rowCount}][Subject]" required>
                            <option value="">Select Subject</option>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="categories[${rowCount}][Year]" required>
                            <option value="">Select Year</option>
                        </select>
                    </td>
                    <td><input type="number" class="form-control" name="categories[${rowCount}][Number]" value="1" required oninput="updateNewPrice(${rowCount})"></td>
                    <td><input type="number" class="form-control" name="categories[${rowCount}][Price]" readonly></td>
                    <td>
                        <select class="form-control" name="categories[${rowCount}][Discount]" required onchange="updateNewPrice(${rowCount})">
                            <option value="0">0%</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}%</option>
                            @endfor
                        </select>
                    </td>
                    <td><input type="number" class="form-control" name="categories[${rowCount}][NewPrice]" readonly></td>
                    <td><button type="button" class="btn btn-danger" onclick="removeCategoryRow(this)">-</button></td>
                `;

                const nameSelect = row.querySelector(`select[name="categories[${rowCount}][Name]"]`);
                nameSelect.addEventListener('change', () => updateSubjects(rowCount));
            }

            function removeCategoryRow(button) {
                const row = button.parentNode.parentNode;
                row.parentNode.removeChild(row);
                updateTotalPrice();
            }

            window.addCategoryRow = addCategoryRow;
            window.removeCategoryRow = removeCategoryRow;

            const initialRowSelect = document.querySelector(`select[name="categories[0][Name]"]`);
            initialRowSelect.addEventListener('change', () => updateSubjects(0));
        });
    </script>
</head>
<body>
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
</body>
</html>
