<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogSpace - Modern Blogging Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">

            {{-- header title --}}
            @include('components.header.headertitle')

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- navbar --}}
            <div class="collapse navbar-collapse" id="navbarNav">
                @include('components.header.navbar')
            </div>

        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">

                {{-- footer title --}}
                <div class="col-md-4 mb-4">
                    @include('components.footer.footertitle')
                </div>

                {{-- Quicklinks --}}
                <div class="col-md-4 mb-4">
                    @include('components.footer.quicklinks')
                </div>

                {{-- Follow Us --}}
                <div class="col-md-4 mb-4">
                    @include('components.footer.socialmedia')
                </div>
            </div>

            <hr class="bg-white">
            {{-- Copyright --}}
            <div class="text-center text-white-50">
                @include('components.footer.copyright')
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
