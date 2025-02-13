<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Directory</title>
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

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.8rem 1.5rem;
            background: white;
            border: none;
            border-radius: 10px;
            color: var(--primary);
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 1.5rem;
            text-decoration: none;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .info-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .tenant-card {
            background: whitesmoke;
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255,255,255,0.3);
        }

        .filter-section {
            display: grid;
            grid-template-columns: 1fr auto auto;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .search-input {
            padding: 0.8rem 1.2rem;
            border: none;
            border: 1px solid #ccc;
            background: white;
            font-size: 0.9rem;
            width: 850px;
            flex-grow: 1; 
            border-radius: 10px; 
        }

        .filter-dropdown {
            padding: 0.8rem 1.2rem;
            border: none;
            border: 1px solid #ccc;
            border-radius: 10px;
            background: white;
            font-size: 0.9rem;
            min-width: 150px;
            cursor: pointer;
        }

        .tenants-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

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
            border-radius: 20px;
            object-fit: cover;
        }

        .tenant-info {
            padding: 1.5rem;
        }

        .tenant-category {
            display: inline-block;
            padding: 0.4rem 1rem;
            background: var(--accent);
            color: white;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-bottom: 1rem;
        }

        .tenant-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--primary);
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
            color: var(--primary);
            margin-right: 8px;
        }

        .tenant-details p {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
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

        @media (max-width: 768px) {
            header {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .filter-section {
                grid-template-columns: 1fr;
            }

            .tenants-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div style="display: flex;justify-content:space-between; align-items:center"> 
            <a href="/" class="back-button">
                <i class="fas fa-arrow-left"></i>
                <span data-en="Back to Dashboard" data-id="Kembali ke Dashboard">Back to Dashboard</span>
            </a>
            <div class="language-switch">
                <button class="lang-btn" id="idBtn">ID</button>
                <button class="lang-btn active" id="enBtn">EN</button>
            </div>
        </div>
        <div class="tenant-card">
            <h2 class="info-title" data-en="Tenant Directory" data-id="Direktori Penyewa"></h2>
            
            <div class="filter-section">
                <form action="{{ route('welcome.tenant') }}" method="GET" class="flex items-center gap-2" x-data="{ search: '{{ request('search') }}' }">
                    <div class="relative">
                        <input type="text" name="search" 
                            x-model="search"
                            placeholder="Search tenants name..." 
                            class="search-input"
                        />
                        <button type="button" x-show="search" x-transition
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-gray-200 hover:bg-gray-300 text-gray-600 rounded-full w-5 h-5 flex items-center justify-center"
                            @click="window.location.href = '{{ route('welcome.tenant') }}'">
                            &times;
                        </button>
                    </div>
                    <button type="submit" 
                        class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 flex items-center justify-center w-20"
                        data-en="Search" data-id="Cari">
                        Search
                    </button>
                </form>

                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="filter-dropdown inline-flex items-center justify-between px-3 py-2">
                            <div>
                                <p 
                                data-en= 
                                    @if (request('kategori'))
                                        "{{ Str::limit(request('kategori'), 10, '...') }}"
                                    @else
                                        "All Categories"
                                    @endif 
                                data-id=
                                    @if (request('kategori'))
                                        @if (request('kategori') == 'Food & Beverage')
                                            "{{ Str::limit("Makanan & Minuman", 10, '...') }}"
                                        @elseif (request('kategori') == 'Retail')
                                            "{{ Str::limit("Ritel", 10, '...') }}"
                                        @elseif (request('kategori') == 'Services')
                                            "{{ Str::limit("Layanan", 10, '...') }}"
                                        @elseif (request('kategori') == 'Duty Free')
                                            "{{ Str::limit("Bebas Bea", 10, '...') }}"
                                        @endif
                                    @else
                                    "{{ Str::limit("Semua Kategori", 10, '...') }}"
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
                        <!-- Pilihan "All Categories" -->
                        <x-dropdown-link :href="route('welcome.tenant', array_merge(request()->query(), ['kategori' => null]))"
                            class="{{ is_null(request('kategori')) ? 'bg-gray-200 font-bold' : '' }}" data-en="{{ __('All Categories') }}" data-id="{{ __('Semua Kategori') }}">
                            {{ __('All Categories') }}
                        </x-dropdown-link>
                
                        <!-- Daftar kategori -->
                        @foreach ($allCategories as $category)
                        @php
                            $translatedCategory = match ($category) {
                                'Food & Beverage' => 'Makanan & Minuman',
                                'Retail' => 'Ritel',
                                'Services' => 'Layanan',
                                'Duty Free' => 'Bebas Bea',
                                default => $category,
                            };
                        @endphp
                    
                        <x-dropdown-link 
                            :href="route('welcome.tenant', array_merge(request()->query(), ['kategori' => $category]))"
                            class="{{ request('kategori') === $category ? 'bg-gray-200 font-bold' : '' }}"
                            data-en="{{ $category }}"
                            data-id="{{ $translatedCategory }}"
                        >
                        </x-dropdown-link>
                    @endforeach
                    
                    </x-slot>
                </x-dropdown>

                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="filter-dropdown inline-flex items-center justify-between px-3 py-2">
                            <div>
                                <p 
                                data-en= 
                                    @if (request('location'))
                                        "{{ Str::limit(request('location'), 10, '...') }}"
                                    @else
                                        "All Locations"
                                    @endif 
                                data-id=
                                    @if (request('location'))
                                        "{{ Str::limit(request('location'), 10, '...') }}"
                                    @else
                                        "{{ Str::limit("Semua Lokasi", 10, '...') }}"
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
                        
                        <x-dropdown-link :href="route('welcome.tenant', array_merge(request()->query(), ['location' => null]))"
                            class="{{ is_null(request('location')) ? 'bg-gray-200 font-bold' : '' }}" data-en="{{ __('All Location') }}" data-id="{{ __('Semua Lokasi') }}">
                            {{ __('All Locations') }}
                        </x-dropdown-link>
                    
                        @foreach ($allLocation as $lokasi)
                            <x-dropdown-link :href="route('welcome.tenant', array_merge(request()->query(), ['location' => $lokasi]))"
                                class="{{ request('location') === $lokasi ? 'bg-gray-200 font-bold' : '' }}">
                                {{ $lokasi }}
                            </x-dropdown-link>
                        @endforeach
                    
                    </x-slot>
                </x-dropdown>

            </div>
            
            @if ($tenants->isEmpty())
            <p class="text-center justify-center text-gray-500 py-4">
                No tenants found matching the selected filters.
            </p>
            @else
                <div class="tenants-grid">
                    @foreach ($tenants as $tenant)
                        @php
                            $translatedCategory = match ($tenant->kategori) {
                                'Food & Beverage' => 'Makanan & Minuman',
                                'Retail' => 'Ritel',
                                'Services' => 'Layanan',
                                'Duty Free' => 'Bebas Bea',
                                default => $category,
                            };
                        @endphp
                        <div class="tenant-item">
                            <img src="{{ url('storage/' . $tenant->foto) }}" alt="{{ $tenant->nama }}" class="tenant-image">
                            <div class="tenant-info">
                                <span class="tenant-category" data-en="{{ $tenant->kategori }}" data-id="{{ $translatedCategory }}"></span>
                                <h3 class="tenant-name">{{ $tenant->nama }}</h3>
                                <p class="tenant-description" data-en="{{ $tenant->deskripsi_en }}" data-id="{{ $tenant->deskripsi }}"></p>
                                <div class="tenant-details">
                                    <p><i class="fas fa-map-marker-alt"></i> {{ $tenant->location }}</p>
                                    <p><i class="fas fa-clock"></i>{{ date('H:i', strtotime($tenant->jam_buka)) }} - {{ date('H:i', strtotime($tenant->jam_tutup)) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Tambahkan Pagination -->
            <div style="margin-top: 20px;">
                {{ $tenants->links() }}
            </div>

        </div>
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