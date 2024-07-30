<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('main') }}">My App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('add') }}">Add</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('all') }}">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.editList') }}">Edit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('invoice') }}">عمل فاتوره</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('invoice.history') }}">Invoice History</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
