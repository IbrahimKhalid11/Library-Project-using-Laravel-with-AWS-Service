<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .navbar-nav li a {
            font-size: 20px;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
        }
        .navbar {
            background-color: #343A40;
        }
        .navbar-brand{
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
            
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand" href="{{ route('dashboard') }}">Library</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">My App</a>
                </li> --}}
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
                    <a class="nav-link" href="{{ route('invoice') }}">Invoice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('invoice.history') }}">Invoice History</a>
                </li>
            </ul>
            {{-- <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul> --}}
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Add the JS Bundle Links Here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    @yield('scripts')
</body>
</html>
