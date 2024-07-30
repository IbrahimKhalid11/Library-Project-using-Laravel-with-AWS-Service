<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Categories</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .search-input {
            width: 100%;
            padding: 5px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Manage Categories</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered" id="categoryTable">
            <thead>
                <tr>
                    <th>
                        Name
                        <input type="text" class="search-input" id="nameSearch" onkeyup="filterTable()" placeholder="Search for names..">
                    </th>
                    <th>
                        Year
                        <input type="text" class="search-input" id="yearSearch" onkeyup="filterTable()" placeholder="Search for years..">
                    </th>
                    <th>
                        Subject
                        <input type="text" class="search-input" id="subjectSearch" onkeyup="filterTable()" placeholder="Search for subjects..">
                    </th>
                    <th>
                        Number
                        <input type="number" class="search-input" id="numberSearch" onkeyup="filterTable()" placeholder="Search for numbers..">
                    </th>
                    <th>
                        Price
                        <input type="number" class="search-input" id="priceSearch" onkeyup="filterTable()" placeholder="Search for prices..">
                    </th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Subject</th>
                    <th>Number</th>
                    <th>Price</th>
                    <th>Actions</th>
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
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="post" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function filterTable() {
            const nameSearch = document.getElementById('nameSearch').value.toLowerCase();
            const yearSearch = document.getElementById('yearSearch').value.toLowerCase();
            const subjectSearch = document.getElementById('subjectSearch').value.toLowerCase();
            const numberSearch = document.getElementById('numberSearch').value;
            const priceSearch = document.getElementById('priceSearch').value;

            const table = document.getElementById('categoryTable');
            const tr = table.getElementsByTagName('tr');

            for (let i = 2; i < tr.length; i++) { // Start from 2 to skip header rows
                const tdName = tr[i].getElementsByTagName('td')[0];
                const tdYear = tr[i].getElementsByTagName('td')[1];
                const tdSubject = tr[i].getElementsByTagName('td')[2];
                const tdNumber = tr[i].getElementsByTagName('td')[3];
                const tdPrice = tr[i].getElementsByTagName('td')[4];

                if (tdName && tdYear && tdSubject && tdNumber && tdPrice) {
                    const nameValue = tdName.textContent || tdName.innerText;
                    const yearValue = tdYear.textContent || tdYear.innerText;
                    const subjectValue = tdSubject.textContent || tdSubject.innerText;
                    const numberValue = tdNumber.textContent || tdNumber.innerText;
                    const priceValue = tdPrice.textContent || tdPrice.innerText;

                    if (
                        nameValue.toLowerCase().indexOf(nameSearch) > -1 &&
                        yearValue.toLowerCase().indexOf(yearSearch) > -1 &&
                        subjectValue.toLowerCase().indexOf(subjectSearch) > -1 &&
                        (numberSearch === '' || numberValue === numberSearch) &&
                        (priceSearch === '' || priceValue === `$${priceSearch}`)
                    ) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        }
    </script>
</body>
</html>
