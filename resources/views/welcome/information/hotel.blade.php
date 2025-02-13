<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YIA Hotels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4cc9f0;
            --gradient: linear-gradient(135deg, #4361ee 0%, #4cc9f0 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            padding: 1rem;
            min-height: 100vh;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            padding: 15px 20px;
            gap: 10px;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
            margin-bottom: 12px;
            background-color: white;
            border-radius: 15px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
        }

        .right {
            grid-column: 3;
            justify-self: end;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .language-switch {
            display: flex;
            gap: 5px;
            background: rgba(255,255,255,0.9);
            padding: 5px;
            border-radius: 20px;
            margin-right: 10px;
        }

        .lang-btn {
            border: none;
            padding: 5px 12px;
            border-radius: 15px;
            cursor: pointer;
            background: transparent;
            color: var(--primary);
            font-weight: 500;
            transition: all 0.3s;
        }

        .lang-btn.active {
            background: var(--primary);
            color: white;
        }

        .info-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .filter-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.3);
            position: relative;
            overflow: visible;
            z-index: 30;
        }

        .filter-section {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .filter-dropdown {
            padding: 0.8rem 1.2rem;
            border: none;
            border-radius: 10px;
            background: white;
            font-size: 0.9rem;
            min-width: 200px;
            cursor: pointer;
        }

        [x-dropdown] {
            position: relative;
            z-index: 50;
        }

        [x-dropdown] [x-slot="content"] {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 100;
            background: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            min-width: 200px;
            padding: 10px;
        }

        .hotel-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
            z-index: 10;
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
            background: var(--accent);
            color: white;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-bottom: 1rem;
        }

        .hotel-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.8rem;
        }

        .hotel-address {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 0.8rem;
        }

        .hotel-price {
            color: var(--secondary);
            font-weight: 600;
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .hotel-grid {
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .filter-section {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header style="padding-inline: 35px;">
        <a href="/information" class="back-button">
            <i class="fas fa-arrow-left"></i>
            <span data-en="Back to Information" data-id="Kembali ke Informasi"></span>
        </a>

        <div class="right">
            <div class="language-switch">
                <button class="lang-btn" id="idBtn">ID</button>
                <button class="lang-btn active" id="enBtn">EN</button>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="filter-card">
            <h2 class="info-title" data-en="Hotels" data-id="Hotel"></h2>
            <div class="filter-section">
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="filter-dropdown inline-flex items-center justify-between px-3 py-2">
                            <div>
                                <p 
                                    data-en="
                                        @if (request('jarak'))
                                            {{ $allDistance[request('jarak')] ?? 'Jarak' }}
                                        @else
                                            Distance
                                        @endif"
                                    data-id="
                                        @if (request('jarak'))
                                            {{ $allDistance[request('jarak')] ?? 'Jarak' }}
                                        @else
                                            Jarak
                                        @endif"
                                ></p>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        
                        <x-dropdown-link :href="route('welcome.information.hotel', array_merge(request()->query(), ['jarak' => null]))"
                            class="{{ is_null(request('jarak')) ? 'bg-gray-200 font-bold' : '' }}" data-en="{{ __('All Distance') }}" data-id="{{ __('Semua Jarak') }}">
                        </x-dropdown-link>
                
                        @foreach ($allDistance as $key => $distance)
                            <x-dropdown-link :href="route('welcome.information.hotel', array_merge(request()->query(), ['jarak' => $key]))"
                                class="{{ request('jarak') === $key ? 'bg-gray-200 font-bold' : '' }}">
                                {{ $distance }}
                            </x-dropdown-link>
                        @endforeach
                
                    </x-slot>
                </x-dropdown>
                
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="filter-dropdown inline-flex items-center justify-between px-3 py-2">
                            <div>
                                <p 
                                    data-en="
                                        @if (request('harga') && isset($allPrice[request('harga')]))
                                            {{ $allPrice[request('harga')] }}
                                        @else
                                            Price
                                        @endif"
                                    data-id="
                                        @if (request('harga') && isset($allPrice[request('harga')]))
                                            {{ $allPrice[request('harga')] }}
                                        @else
                                            Harga
                                        @endif"
                                ></p>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        
                        <x-dropdown-link :href="route('welcome.information.hotel', array_merge(request()->query(), ['harga' => null]))"
                            class="{{ is_null(request('harga')) ? 'bg-gray-200 font-bold' : '' }}" data-en="{{ __('All Price') }}" data-id="{{ __('Semua Harga') }}">   
                        </x-dropdown-link>
                
                        @foreach ($allPrice as $key => $price)
                            <x-dropdown-link :href="route('welcome.information.hotel', array_merge(request()->query(), ['harga' => $key]))"
                                class="{{ request('harga') === $key ? 'bg-gray-200 font-bold' : '' }}">
                                {{ $price }}
                            </x-dropdown-link>
                        @endforeach
                
                    </x-slot>
                </x-dropdown>
                
            </div>
        </div>

        @if ($hotels->isEmpty())
        <p class="text-center justify-center text-gray-500 py-4">
            No hotels found matching the selected filters.
        </p>
        @else
            <div class="hotel-grid">
                @foreach ($hotels as $hotel)
                    <div class="hotel-item">
                        <img src="{{ url('storage/' . $hotel->foto) }}" alt="{{ $hotel->nama }}" class="hotel-image">
                        <div class="hotel-info">
                            <div class="hotel-distance">
                                <i class="fas fa-location-dot"></i>
                                <span data-en="{{ $hotel->jarak }} Km from airport" data-id="{{ $hotel->jarak }} Km dari bandara"></span>
                            </div>
                            <h3 class="hotel-name">{{ $hotel->nama }}</h3>
                            <p class="hotel-address">
                                <i class="fas fa-map-marker-alt"></i>
                                {{ $hotel->alamat }}
                            </p>
                            <p class="hotel-price" data-en="Start from Rp. {{ number_format($hotel->harga) }}" data-id="Mulai dari Rp. {{ number_format($hotel->harga) }}"></p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        // Language Switch Functionality
        document.addEventListener("DOMContentLoaded", function() {
            let savedLang = localStorage.getItem("selectedLanguage") || "en"; // Default ke 'en'
            applyLanguage(savedLang);
        });

        document.getElementById('idBtn').addEventListener('click', function() {
            setLanguage('id');
        });

        document.getElementById('enBtn').addEventListener('click', function() {
            setLanguage('en');
        });

        function setLanguage(lang) {
            localStorage.setItem("selectedLanguage", lang); // Simpan ke LocalStorage
            applyLanguage(lang);
        }

        function applyLanguage(lang) {
            // Terapkan teks sesuai bahasa
            document.querySelectorAll('[data-en], [data-id]').forEach(element => {
                element.textContent = element.getAttribute(`data-${lang}`);
            });

            // Update tombol aktif
            document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('active'));
            document.getElementById(`${lang}Btn`).classList.add('active');
        }

        // Cegah flash default 'en' saat reload (terapkan sebelum halaman selesai load)
        let savedLang = localStorage.getItem("selectedLanguage") || "en";
        applyLanguage(savedLang);
    </script>
</body>
</html>