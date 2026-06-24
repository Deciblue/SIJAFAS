<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SIJAFAS Admin')</title>
    <!-- Include a minimal CSS framework or custom stylesheet -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div id="app" class="min-h-screen flex flex-col">
        <!-- Header -->
        @include('admin.layouts.header')
        <!-- Main Content -->
        <main class="flex-1 container mx-auto py-6">
            @yield('content')
        </main>
        <!-- Footer -->
        @include('admin.layouts.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
