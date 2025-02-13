<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yogyakarta: Things to Do</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #34495e;
            --accent-color: #3498db;
            --background-color: #f4f6f7;
            --text-color: #333;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--background-color);
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
            border-radius: 15px;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #4361ee;
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
            color: #4361ee;
            font-weight: 500;
            transition: all 0.3s;
        }

        .lang-btn.active {
            background: #4361ee;
            color: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .title-card {
            text-align: center;
            padding: 3rem 0;
            background-color: var(--primary-color);
            color: white;
        }

        .title-card h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .title-card p {
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.1rem;
        }

        .activities {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
            margin-bottom: 2rem;
            position: relative;
            z-index: 10;
        }

        .activity-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }

        .activity-card:hover {
            transform: translateY(-10px);
        }

        .activity-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .activity-content {
            padding: 1.5rem;
        }

        .activity-content h2 {
            color: var(--accent-color);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            font-size: 1.4rem;
        }

        .activity-content h2 i {
            margin-right: 1rem;
            color: var(--secondary-color);
        }

        .activity-details {
            margin-top: 1rem;
            border-top: 1px solid #eee;
            padding-top: 1rem;
        }

        .activity-tag {
            display: inline-block;
            background-color: var(--accent-color);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            margin-top: 0.5rem;
        }

        .practical-info {
            background-color: white;
            padding: 3rem 0;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .info-card {
            text-align: center;
            padding: 1.5rem;
            background-color: var(--background-color);
            border-radius: 10px;
        }

        .info-card i {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        footer {
            background-color: var(--primary-color);
            color: white;
            text-align: center;
            padding: 1.5rem;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
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

    <div class="title-card">
        <div class="container">
            <h1 data-en="Yogyakarta: Adventure Awaits" data-id="Yogyakarta: Petualangan Menanti"></h1>
            <p data-en="A destination that combines history, culture, and natural beauty. Discover a variety of amazing activities that you can only experience in Yogyakarta." data-id="Sebuah destinasi yang memadukan sejarah, budaya, dan keindahan alam. Temukan berbagai aktivitas menakjubkan yang hanya bisa Anda alami di Yogyakarta."></p>
        </div>
    </div>

    <div class="container">
        <div class="activities">
            @foreach ($destinations as $destination)
                <div class="activity-card">
                    <img src="{{ url('storage/' . $destination->foto) }}" alt="foto" class="activity-image">
                    <div class="activity-content">
                        <h2>{{ $destination->nama }}</h2>
                        <p data-en="{{ $destination->deskripsi_en }}" data-id="{{ $destination->deskripsi }}"></p>
                        <div class="activity-details">
                            @foreach ($destination->tipe as $tipe)
                                @php
                                    $translatedtype = match ($tipe) {
                                        'Sejarah' => 'History',
                                        'Spiritual' => 'Spiritual',
                                        'Belanja' => 'Shopping',
                                        'Kuliner' => 'Culinary',
                                        'Budaya' => 'Culture',
                                        'Alam' => 'Nature',
                                        'Petualangan' => 'Adventure',
                                        'Seni' => 'Art',
                                        'Tradisional' => 'Traditional',
                                        default => $tipe,
                                    };
                                @endphp
                                <span class="activity-tag" data-en="{{ ucfirst($translatedtype) }}" data-id="{{ ucfirst($tipe) }}"></span>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="practical-info">
            <div class="info-grid mx-4">
                <div class="info-card">
                    <i class="fas fa-clock"></i>
                    <h3>Waktu Terbaik Berkunjung</h3>
                    <p>Mei-September: Cuaca cerah, cocok untuk menjelajah.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-money-bill-wave"></i>
                    <h3>Anggaran</h3>
                    <p>Persiapkan Rp 500.000 - Rp 1.000.000 per hari.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-bus"></i>
                    <h3>Transportasi</h3>
                    <p>Tersedia bus, taksi, dan transportasi online.</p>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2024 Yogyakarta Travel Guide - Setiap Perjalanan Adalah Kenangan</p>
    </footer>

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