<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Category</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $category->Name }}" required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" value="{{ $category->Subject }}" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="text" class="form-control" name="year" id="year" value="{{ $category->Year }}" required>
            </div>
            <div class="form-group">
                <label for="number">Number</label>
                <input type="number" class="form-control" name="number" id="number" value="{{ $category->Number }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" value="{{ $category->Price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
</body>
</html>
