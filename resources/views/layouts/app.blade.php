<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TabunganKu')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Actor:wght@400&family=Afacad:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom Styles -->
    <style>
        .completed {
            background: linear-gradient(135deg, #875937 0%, #6d4228 100%);
        }
        .pending {
            background: linear-gradient(135deg, #f5eedd 0%, #f0e2cd 100%);
            border: 2px solid #d4a574;
        }
        .period-box {
            transition: all 0.3s ease;
        }
        .period-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(135, 89, 55, 0.3);
        }
    </style>
    
    @stack('styles')
</head>
<body class="text-black overflow-x-hidden" style="@yield('body-style', 'background: #FFE7D0;')">
    
    <!-- Include Navbar -->
    @include('partials.navbar')
    
    <!-- Main Content -->
    @yield('content')
    
    <!-- Include Footer (optional) -->
    @includeWhen(isset($showFooter), 'partials.footer')
    
    @stack('scripts')
</body>
</html>