@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Category Details</h1>
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="categoryTable">
                <thead class="thead-dark">
                    <tr>
                        <th onclick="sortTable(0)">
                            Name
                            <input type="text" class="search-input" id="nameSearch" onkeyup="filterTable()" placeholder="Search for names..">
                        </th>
                        <th onclick="sortTable(1)">
                            Year
                            <input type="text" class="search-input" id="yearSearch" onkeyup="filterTable()" placeholder="Search for years..">
                        </th>
                        <th onclick="sortTable(2)">
                            Subject
                            <input type="text" class="search-input" id="subjectSearch" onkeyup="filterTable()" placeholder="Search for subjects..">
                        </th>
                        <th onclick="sortTable(3)">
                            Number
                            <input type="number" class="search-input" id="numberSearch" onkeyup="filterTable()" placeholder="Search for numbers..">
                        </th>
                        <th onclick="sortTable(4)">
                            Price
                            <input type="number" class="search-input" id="priceSearch" onkeyup="filterTable()" placeholder="Search for prices..">
                        </th>
                    </tr>
                    {{-- <tr>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Subject</th>
                        <th>Number</th>
                        <th>Price</th>
                    </tr> --}}
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category['Name'] }}</td>
                            <td>{{ $category['Year'] }}</td>
                            <td>{{ $category['Subject'] }}</td>
                            <td>{{ $category['Number'] }}</td>
                            <td>${{ $category['Price'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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

        function sortTable(columnIndex) {
            const table = document.getElementById("categoryTable");
            let switching = true;
            let direction = "asc";

            while (switching) {
                switching = false;
                const rows = table.rows;
                for (let i = 2; i < (rows.length - 1); i++) {
                    let shouldSwitch = false;
                    const x = rows[i].getElementsByTagName("TD")[columnIndex];
                    const y = rows[i + 1].getElementsByTagName("TD")[columnIndex];

                    if (direction === "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (direction === "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                } else {
                    if (direction === "asc") {
                        direction = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>
@endsection
