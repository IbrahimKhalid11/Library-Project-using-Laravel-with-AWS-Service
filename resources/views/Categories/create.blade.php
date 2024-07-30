<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if ($errors->any())
    @foreach ( $errors->all() as $error )
        <div class="alert- alert-danger">{{ $error }}</div>
    @endforeach
    @endif
    <form action="{{ url("categories") }}" method="post">
        @csrf
        <input type="text" name="name" id=""><br>
        <input type="text" name="subject" id=""><br>
        <input type="text" name="year" id=""><br>
        <input type="number" name="number" id=""><br>
        <input type="number" name="price" id=""><br>
        <button type="submit">submit</button>
    </form>
</body>
</html>