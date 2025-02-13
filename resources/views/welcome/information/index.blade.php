<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
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

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }


        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .info-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.3);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.2);
        }

        .info-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .info-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .info-description {
            color: #666;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .info-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.8rem 1.5rem;
            background: var(--gradient);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
        }

        .info-button:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }

        .decoration-circle {
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            opacity: 0.1;
            right: -40px;
            bottom: -40px;
        }


        @media (max-width: 768px) {
            header {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .info-card {
                padding: 1.5rem;
            }

            .info-icon {
                font-size: 2rem;
            }

            .info-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <header style="padding-inline: 35px;">
        <a href="/" class="back-button">
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

    <div class="container">
        <div class="info-grid">
            <!-- YIA Artwork Card -->
            <div class="info-card">
                <div class="decoration-circle"></div>
                <i class="fas fa-palette info-icon"></i>
                <h2 class="info-title" data-en="YIA Artwork" data-id="Karya Seni YIA">YIA Artwork</h2>
                <p class="info-description" data-en="Discover the beautiful art installations and cultural displays throughout Yogyakarta International Airport. Experience the rich heritage of Javanese culture through modern art pieces." data-id="Temukan instalasi seni indah dan tampilan budaya di seluruh Bandara Internasional Yogyakarta. Alami warisan budaya Jawa melalui karya seni modern.">
                    Discover the beautiful art installations and cultural displays throughout Yogyakarta International Airport. Experience the rich heritage of Javanese culture through modern art pieces.
                </p>
                <a href="{{ route('welcome.information.artwork') }}" class="info-button">
                    <span data-en="Explore Artworks" data-id="Jelajahi Karya Seni">Explore Artworks</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Hotels Card -->
            <div class="info-card">
                <div class="decoration-circle"></div>
                <i class="fas fa-hotel info-icon"></i>
                <h2 class="info-title" data-en="Hotels" data-id="Hotel">Hotels</h2>
                <p class="info-description" data-en="Find comfortable accommodations near the airport. From luxury hotels to budget-friendly options, discover the perfect place for your stay in Yogyakarta." data-id="Temukan akomodasi yang nyaman di dekat bandara. Dari hotel mewah hingga pilihan ramah anggaran, temukan tempat yang sempurna untuk menginap di Yogyakarta.">
                    Find comfortable accommodations near the airport. From luxury hotels to budget-friendly options, discover the perfect place for your stay in Yogyakarta.
                </p>
                <a href="{{ route('welcome.information.hotel') }}" class="info-button">
                    <span data-en="View Hotels" data-id="Lihat Hotel">View Hotels</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Land Transport Card -->
            <div class="info-card">
                <div class="decoration-circle"></div>
                <i class="fas fa-bus info-icon"></i>
                <h2 class="info-title" data-en="Land Transport" data-id="Transportasi Darat">Land Transport</h2>
                <p class="info-description" data-en="Access information about various transportation options including buses, taxis, and rental services. Plan your journey to and from the airport with ease." data-id="Akses informasi tentang berbagai opsi transportasi termasuk bus, taksi, dan layanan penyewaan. Rencanakan perjalanan Anda ke dan dari bandara dengan mudah.">
                    Access information about various transportation options including buses, taxis, and rental services. Plan your journey to and from the airport with ease.
                </p>
                <a href="{{ route('welcome.information.landtransport') }}" class="info-button">
                    <span data-en="Transport Options" data-id="Opsi Transportasi">Transport Options</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Things to Do Card -->
            <div class="info-card">
                <div class="decoration-circle"></div>
                <i class="fas fa-map-marked-alt info-icon"></i>
                <h2 class="info-title" data-en="Things to Do" data-id="Hal yang Dapat Dilakukan">Things to Do</h2>
                <p class="info-description" data-en="Explore attractions and activities in Yogyakarta. From historic temples to modern entertainment, find the perfect activities for your visit." data-id="Jelajahi atraksi dan kegiatan di Yogyakarta. Dari candi bersejarah hingga hiburan modern, temukan kegiatan yang sempurna untuk kunjungan Anda.">
                    Explore attractions and activities in Yogyakarta. From historic temples to modern entertainment, find the perfect activities for your visit.
                </p>
                <a href="{{ route('welcome.information.todo') }}" class="info-button">
                    <span data-en="Discover More" data-id="Temukan Lebih Banyak">Discover More</span>
                    <i class="fas fa-arrow-right"></i>
                </a>
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
