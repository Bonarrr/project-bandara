<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        <style>
        .tenant-item {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .tenant-item:hover {
            transform: translateY(-5px);
        }

        .tenant-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .tenant-info {
            padding: 1.5rem;
        }

        .tenant-category {
            display: inline-block;
            padding: 0.4rem 1rem;
            background: #4cc9f0;;
            color: white;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-bottom: 1rem;
        }

        .tenant-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #4361ee;;
        }

        .tenant-description {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .tenant-details {
            font-size: 0.85rem;
            color: #444;
        }

        .tenant-details i {
            width: 20px;
            color: #4361ee;;
            margin-right: 8px;
        }

        .tenant-details p {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .hotel-item {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        .hotel-item:hover {
            transform: translateY(-5px);
        }

        .hotel-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .hotel-info {
            padding: 1.5rem;
        }

        .hotel-distance {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 0.4rem 1rem;
            background: #4cc9f0;
            color: white;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-bottom: 1rem;
        }

        .hotel-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: #4361ee;
            margin-bottom: 0.8rem;
        }

        .hotel-address {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 0.8rem;
        }

        .hotel-price {
            color: #3f37c9;            ;
            font-weight: 600;
            font-size: 1.1rem;
        }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('components.layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
