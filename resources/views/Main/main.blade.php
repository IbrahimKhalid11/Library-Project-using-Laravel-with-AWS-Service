<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Main Page</h1>
        <div class="btn-group-vertical">
            <a class="btn btn-primary" href="{{ route('add') }}">Add</a>
            <a class="btn btn-info" href="{{ route('all') }}">All</a>
            <a class="btn btn-secondary" href="{{ route('categories.editList') }}">Edit</a>
            <a class="btn btn-warning" href="{{ route('invoice') }}">عمل فاتوره</a>
        </div>
    </div>
</body>
</html>
