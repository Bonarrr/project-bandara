<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportasi Indonesia</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4cc9f0;
            --background-color: #f4f6f7;
            --text-color: #333;
            --card-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
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

        .page-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            text-align: center;
            padding: 4rem 2rem;
            border-radius: 20px;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .hero-section p {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .transport-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .transport-card {
            background-color: white;
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            transition: all 0.4s ease;
            box-shadow: var(--card-shadow);
        }

        .transport-card:hover {
            transform: translateY(-15px) rotate(1deg);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        .transport-card .icon {
            font-size: 4rem;
            color: var(--secondary);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .transport-card:hover .icon {
            transform: scale(1.2) rotate(15deg);
        }

        .transport-card h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .transport-card .description {
            color: #6c757d;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .access-info {
            background-color: var(--background-color);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: left;
        }

        .access-info h3 {
            color: var(--accent);
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .access-info ul {
            list-style: none;
        }

        .access-info li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.75rem;
            color: var(--text-color);
        }

        .access-info li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: var(--secondary);
            font-weight: bold;
        }

        @media (max-width: 1024px) {
            .transport-container {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .transport-container {
                grid-template-columns: 1fr;
            }

            .hero-section h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header style="padding-inline: 35px;">
        <a href="javascript:history.back()" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Back to Dashboard
        </a>

        <div class="right">
            <div class="language-switch">
                <button class="lang-btn" id="idBtn">ID</button>
                <button class="lang-btn active" id="enBtn">EN</button>
            </div>
        </div>
    </header>

    <div class="page-wrapper">
        <section class="hero-section">
            <h1 data-en="Modern Transportation in Indonesia" data-id="Transportasi Modern di Indonesia">
                Modern Transportation in Indonesia
            </h1>
            <p data-en="Explore various innovative and efficient transportation options. We provide comprehensive information to make your travel easier across the nation." data-id="Jelajahi berbagai pilihan transportasi inovatif dan efisien. Kami memberikan informasi komprehensif untuk memudahkan perjalanan Anda di seluruh penjuru negeri.">
                Explore various innovative and efficient transportation options. We provide comprehensive information to make your travel easier across the nation.
            </p>
        </section>
        
        <div class="transport-container">
            <!-- Transport Card 1 -->
            <div class="transport-card">
                <div class="icon">
                    <i class="fas fa-train"></i>
                </div>
                <h2 data-en="Train" data-id="Kereta Api">Train</h2>
                <p class="description" data-en="A modern transportation network linking cities with advanced infrastructure and high-quality services." data-id="Jaringan transportasi modern yang menghubungkan kota-kota dengan infrastruktur canggih dan pelayanan berkualitas tinggi.">
                    A modern transportation network linking cities with advanced infrastructure and high-quality services.
                </p>
                <div class="access-info">
                    <h3 data-en="Access Guide" data-id="Panduan Akses">Access Guide</h3>
                    <ul>
                        <li data-en="Check routes and schedules online" data-id="Cek rute dan jadwal online">Check routes and schedules online</li>
                        <li data-en="Select travel class" data-id="Pilih kelas perjalanan">Select travel class</li>
                        <li data-en="Book digital tickets" data-id="Booking tiket digital">Book digital tickets</li>
                        <li data-en="Confirm departure" data-id="Konfirmasi keberangkatan">Confirm departure</li>
                    </ul>
                </div>
            </div>

            <!-- Transport Card 2 -->
            <div class="transport-card">
                <div class="icon">
                    <i class="fas fa-bus"></i>
                </div>
                <h2 data-en="Bus Transportation" data-id="Transportasi Bus">Bus Transportation</h2>
                <p class="description" data-en="Affordable public transport with a comprehensive route network across urban and intercity areas." data-id="Layanan angkutan umum terjangkau dengan jaringan rute komprehensif di perkotaan dan antarwilayah.">
                    Affordable public transport with a comprehensive route network across urban and intercity areas.
                </p>
                <div class="access-info">
                    <h3 data-en="Access Guide" data-id="Panduan Akses">Access Guide</h3>
                    <ul>
                        <li data-en="Find the nearest route" data-id="Temukan rute terdekat">Find the nearest route</li>
                        <li data-en="Check real-time schedules" data-id="Periksa jadwal real-time">Check real-time schedules</li>
                        <li data-en="Prepare payment method" data-id="Siapkan metode pembayaran">Prepare payment method</li>
                        <li data-en="Use official bus stops" data-id="Gunakan halte resmi">Use official bus stops</li>
                    </ul>
                </div>
            </div>

            <!-- Transport Card 3 -->
            <div class="transport-card">
                <div class="icon">
                    <i class="fas fa-taxi"></i>
                </div>
                <h2 data-en="Taxi Services" data-id="Layanan Taksi">Taxi Services</h2>
                <p class="description" data-en="Flexible personal transportation with modern booking technology and a wide reach across the region." data-id="Transportasi pribadi fleksibel dengan teknologi booking modern dan jangkauan luas di seluruh kawasan.">
                    Flexible personal transportation with modern booking technology and a wide reach across the region.
                </p>
                <div class="access-info">
                    <h3 data-en="Access Guide" data-id="Panduan Akses">Access Guide</h3>
                    <ul>
                        <li data-en="Download the official app" data-id="Download aplikasi resmi">Download the official app</li>
                        <li data-en="Set pickup location" data-id="Tentukan lokasi penjemputan">Set pickup location</li>
                        <li data-en="Select vehicle type" data-id="Pilih jenis kendaraan">Select vehicle type</li>
                        <li data-en="Track your ride" data-id="Lacak perjalanan">Track your ride</li>
                    </ul>
                </div>
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
