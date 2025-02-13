<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YIA Artwork</title>
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

        .artwork-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
            position: relative;
            z-index: 10;
        }

        .artwork-item {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        .artwork-item:hover {
            transform: translateY(-5px);
        }

        .artwork-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .artwork-info {
            padding: 1.5rem;
        }

        .artwork-location {
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

        .artwork-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.8rem;
        }

        .artwork-description {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .artwork-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
        }

        @media (max-width: 480px) {
            .filter-section {
                flex-direction: column;
            }

            .artwork-image {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <header style="padding-inline: 35px;">
        <a href="/information" class="back-button">
            <i class="fas fa-arrow-left"></i>
            <span data-en="Back to information" data-id="Kembali ke Informasi"></span>
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
            <h2 class="info-title" data-en="YIA Artwork Collection" data-id="Karya Seni YIA"></h2>
            <div class="filter-section">
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="filter-dropdown inline-flex items-center justify-between px-3 py-2">
                            <div>
                                <p 
                                data-en= 
                                    @if (request('location'))
                                        "{{ request('location') }}"
                                    @else
                                        "All Locations"
                                    @endif 
                                data-id=
                                    @if (request('location'))
                                        "{{ request('location') }}"
                                    @else
                                        "{{ "Semua Lokasi" }}"
                                    @endif
                                >
                                </p>
                            </div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        
                        <x-dropdown-link :href="route('welcome.information.artwork', array_merge(request()->query(), ['location' => null]))"
                            class="{{ is_null(request('location')) ? 'bg-gray-200 font-bold' : '' }}" data-en="{{ __('All Location') }}" data-id="{{ __('Semua Lokasi') }}">
                            {{ __('All Locations') }}
                        </x-dropdown-link>
                    
                        @foreach ($allLocation as $lokasi)
                            <x-dropdown-link :href="route('welcome.information.artwork', array_merge(request()->query(), ['location' => $lokasi]))"
                                class="{{ request('location') === $lokasi ? 'bg-gray-200 font-bold' : '' }}">
                                {{ $lokasi }}
                            </x-dropdown-link>
                        @endforeach
                    
                    </x-slot>
                </x-dropdown>               
            </div>
        </div>

        @if ($artworks->isEmpty())
        <p class="text-center justify-center text-gray-500 py-4">
            No artworks found matching the selected filters.
        </p>
        @else
            <div class="artwork-grid">
                <!-- Artwork Item 1 -->
                @foreach ($artworks as $artwork)
                <div class="artwork-item">
                    <img src="{{ url('storage/' . $artwork->foto) }}" alt="foto" class="artwork-image">
                    <div class="artwork-info">
                        <div class="artwork-location">
                            <i class="fas fa-map-marker-alt"></i>
                            {{ $artwork->location }}
                        </div>
                        <h3 class="artwork-name">{{ $artwork->nama }}</h3>
                        <p class="artwork-description" data-en="{{ $artwork->deskripsi_en }}" data-id="{{ $artwork->deskripsi }}"></p>
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