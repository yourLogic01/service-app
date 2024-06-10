<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Service-App</title>
    {{-- JQuery UI --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    {{-- Bootstrap 5  CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
    {{-- Bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- Sweet Alert --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css"
        integrity="sha256-h2Gkn+H33lnKlQTNntQyLXMWq7/9XI2rlPCsLsVcUBs=" crossorigin="anonymous">
    {{-- CSS --}}
    <link rel="stylesheet" href="/css/style.css">
    {{-- Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap"
        rel="stylesheet">
    {{-- trix cdn --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('images/logo.png') }}">
</head>

<body>

    @include('partials.navbar')
    @include('partials.hero')

    <div class="container mt-4">
        @yield('container')
    </div>
    @include('blog.recent')
    @include('contact.index')
    @include('partials.footer')

    <!-- Back To Top Button -->
    <button onclick="topFunction()" id="myBtn">
        <img src="/images/up-arrow.png" alt="alternative">
    </button>
    <!-- end of back to top button -->

    {{-- JQuery JS  --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    {{-- JQuery UI --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    {{-- Sweet Alert JS  --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js"
        integrity="sha256-dyw4h6gMbTk1vSiOqcs/wqhyqydsuILBl78WhcD44lY=" crossorigin="anonymous"></script>
    {{-- Bootstrap js CDCN --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- library js --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    {{-- js --}}
    <script src="/js/main.js"></script>

    @yield('script')
</body>

</html>
