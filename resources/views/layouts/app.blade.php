<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marine Guest House</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS styles here -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('img/logo.png')}}">
</head>
<body>
    @include('layouts.header')
    
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')
            
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="height: 100vh">
                <div style="height:80px"></div>
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Include Bootstrap JS and your custom JS scripts here -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
