<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=0.9" />
        <title>Marine Guest House</title>
        <link rel="icon" href="{{asset('img/logo.png')}}" type="image/png">
        <!-- Bootstrap CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
        <!-- Add your custom CSS styles here -->
        <link href="{{asset('css/all.min.css')}}" rel="stylesheet" />
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
        <script src="{{ asset('js/sweet_alert.js') }}"></script>
        <!-- CSS Front Template -->
        <link
            rel="stylesheet"
            href="{{ asset('css/theme.minc619.css') }}?v=2.0"
        />
    </head>
    <body style="height: 100vh; width: 100vw; display: flex; flex-direction: column;">
        @include('layouts.header')
        <div style="flex-grow: 1; display: flex;">
            @include('layouts.sidebar')
            <main role="main" style="flex-grow: 1; overflow-y: auto;">
                <div class="py-2"></div>
                <div style="position: sticky; top: 0; background-color: #fff; z-index: 1;">
                    <!-- Your main content here -->
                    @yield('content')
                </div>
            </main>
        </div>
        <!-- Include Bootstrap JS and your custom JS scripts here -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/custom.js') }}"></script>
        <script>
            function form_alert(id, message) {
                Swal.fire({
                    title: "Are you sure?",
                    text: message,
                    type: "warning",
                    showCancelButton: true,
                    focusCancel: true,
                    cancelButtonColor: "default",
                    confirmButtonColor: "#3953a4",
                    cancelButtonText: "No",
                    confirmButtonText: "Yes",
                    reverseButtons: false,
                }).then((result) => {
                    if (result.value) {
                        $("#" + id).submit();
                    }
                });
            }
        </script>
    </body>
</html>
