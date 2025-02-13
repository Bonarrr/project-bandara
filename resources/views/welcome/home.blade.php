<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Dashboard</title>
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
            overflow: hidden;
        }

        header {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            padding: 15px 20px;
            gap: 10px;
            align-items: start;
            max-width: 1400px;
            margin: 0 auto;
            margin-bottom: 12px;
            background-color: white;
            border-radius: 15px;
        }

        .left {
            grid-column: 1;
            justify-self: start;
        }

        .center {
            grid-column: 2;
            justify-self: center;
        }

        .right {
            grid-column: 3;
            justify-self: end;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
        }

        .right .logo {
            max-height: 30px; /* Reduced logo size */
        }

        .container {
            height: calc(100vh - 2rem);
            max-width: 1400px;
            margin: 0 auto;
        }

        /* Language Switch Styles - Updated */
        .language-switch {
            display: flex;
            gap: 5px;
            background: rgba(255,255,255,0.9);
            padding: 5px;
            border-radius: 20px;
            margin-top: 5px;
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
            font-size: 0.8rem;
        }

        .lang-btn.active {
            background: var(--primary);
            color: white;
        }

        .container {
            height: calc(100vh - 2rem);
            max-width: 1400px;
            margin: 0 auto;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: 53vh 25vh;
            gap: 1rem;
            height: 90%;
        }

        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.3);
            overflow: hidden;
        }

        .flight-card {
           
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.3);
            overflow: hidden;
        }

        .main-card {
            grid-column: span 2;
            grid-row: span 1;
            background: var(--gradient);
            color: white;
            position: relative;
        }

        .side-container {
            display: grid;
            grid-template-rows: 1fr 1fr;
            gap: 1rem;
            height: 100%;
        }

        .bottom-row {
            grid-column: 1 / -1;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            height: 100%;
        }

        .icon {
            font-size: 2rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .main-card .icon {
            background: linear-gradient(45deg, white, #caf0f8);
            -webkit-background-clip: text;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 0.8rem;
            font-weight: 600;
        }

        p {
            color: #white;
            line-height: 1.5;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .flight-table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
        }

        .flight-table th {
            padding: 0.8rem;
            border-bottom: 2px solid rgba(255,255,255,0.3);
        }

        .flight-table td {
            padding: 0.8rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            padding: 0.6rem 1.2rem;
            background: rgba(255,255,255,0.9);
            color: var(--primary);
            border-radius: 25px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .btn:hover {
            background: white;
            transform: translateY(-2px);
        }

        

    </style>
</head>
<body>
    <header style="padding-inline: 35px;">
        <div class="left">
            <div style="font-size: 25px; color: blue; font-weight: 600;" id="clock"></div>
            <div id="day-date"></div>
        </div>
        <div class="center">
            <img src="storage/logo_yia.png" alt="Logo" class="logo">
        </div>
        <div class="right">
            <img src="storage/logo_injourney.png" alt="Logo" class="logo">
            <div class="language-switch">
                <button class="lang-btn" id="idBtn">ID</button>
                <button class="lang-btn active" id="enBtn">EN</button>
            </div>
        </div>
    </header>

    <div class="container" >
        <div class="grid">
            <!-- Baris Pertama -->
            <div class="flight-card main-card">
                <i class="icon fas fa-plane-departure"></i>
                <h2 data-en="Flight Information" data-id="Informasi Penerbangan">Flight Information</h2>
                <p data-en="Real-time flight updates from Yogyakarta International Airport" 
                   data-id="Update penerbangan langsung dari Bandara Internasional Yogyakarta">
                    Real-time flight updates from Yogyakarta International Airport
                </p>
                
                <table class="flight-table">
                    <tr>
                        <th data-en="Flight No" data-id="No Penerbangan">Flight No</th>
                        <th data-en="Destination" data-id="Tujuan">Destination</th>
                        <th data-en="Schedule" data-id="Jadwal">Schedule</th>
                        <th data-en="Status" data-id="Status">Status</th>
                    </tr>
                    @foreach ($nearestFlights as $flight)
                        <tr>
                            <td>{{ $flight['flightno'] }}</td>
                            <td>{{ $flight['fromto'] }}</td>
                            <td>{{ \Carbon\Carbon::parse($flight['schedule'])->format('H:i') }}</td>
                            <td>{{ $flight['flightstat'] }}</td>
                        </tr>
                    @endforeach
                </table>
                <a href="{{ route('welcome.flight') }}" class="btn">
                    <span data-en="View All Flights" data-id="Lihat Semua Penerbangan">View All Flights</span>
                    <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>

            <div class="side-container">
                <div class="card">
                    <i class="icon fas fa-map-marked-alt" style="margin: 0"></i>
                    <h2 data-en="Interactive Map" data-id="Peta Interaktif" style="margin: 0">Interactive Map</h2>
                    <p data-en="Explore airport facilities and navigation" style="margin: 0" 
                       data-id="Jelajahi fasilitas dan navigasi bandara">
                        Explore airport facilities and navigation
                    </p>
                    <a href="#" style="all: unset; cursor:pointer; color:var(--primary)">
                        <span data-en="Open Map" data-id="Buka Peta">Open Map</span>
                    </a>
                </div>
                
                <div class="card">
                    <i class="icon fas fa-store" style="margin: 0"></i>
                    <h2 data-en="Tenant Directory" data-id="Direktori Tenant" style="margin: 0">Tenant Directory</h2>
                    <p data-en="Discover shops and services available" style="margin: 0" 
                       data-id="Temukan toko dan layanan yang tersedia">
                        Discover shops and services available
                    </p>
                    <a href="{{ route('welcome.tenant') }}" style="all: unset; cursor:pointer; color:var(--primary)">
                        <span data-en="Browse Tenants" data-id="Lihat Tenant">Browse Tenants</span>
                    </a>
                </div>
            </div>

            <!-- Baris Kedua -->
            <div class="bottom-row">
                <div class="card">
                    <i class="icon fas fa-info-circle" style="margin:0px"></i>
                    <h2 data-en="Information" data-id="Informasi" style="margin:0px">Information</h2>
                    <p data-en="Essential travel guidelines and regulations" style="margin:0px"
                       data-id="Panduan dan peraturan perjalanan penting">
                        Essential travel guidelines and regulations
                    </p>
                    <a href="{{ route('welcome.information.index') }}" style="all: unset; cursor:pointer; color:var(--primary)"> 
                        <span data-en="Learn More" data-id="Selengkapnya">Learn More</span>
                    </a>
                </div>

                <div class="card">
                    <i class="icon fas fa-headset" style="margin: 0"></i>
                    <h2 data-en="Customer Service" data-id="Layanan Pelanggan" style="margin: 0">Customer Service</h2>
                    <p data-en="24/7 support for your travel needs" style="margin: 0" 
                       data-id="Dukungan 24/7 untuk kebutuhan perjalanan Anda">
                        24/7 support for your travel needs
                    </p>
                    <a href="{{ route('welcome.customerservice') }}" style="all: unset; cursor:pointer; color:var(--primary)">
                        <span data-en="Contact Us" data-id="Hubungi Kami">Contact Us</span>
                    </a>
                </div>

                <div class="card">
                    <i class="icon fas fa-comment-dots" style="margin: 0"></i>
                    <h2 data-en="Customer Feedback" data-id="Umpan Balik" style="margin: 0">Customer Feedback</h2>
                    <p data-en="Share your airport experience with us" style="margin: 0" 
                       data-id="Bagikan pengalaman bandara Anda dengan kami">
                        Share your airport experience with us
                    </p>
                    <a href="#" style="all: unset; cursor:pointer; color:var(--primary)">
                        <span data-en="Give Feedback" data-id="Beri Umpan Balik">Give Feedback</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkAndRefresh() {
            const now = new Date();
            if (now.getSeconds() === 0) {
                location.reload(); // Refresh hanya saat detik = 00
            }
        }

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


        // Time and Date Display
        function updateTime() {
            const now = new Date();
            const isIndonesian = document.getElementById('idBtn').classList.contains('active');

            // Day and Month names in both languages
            const days = isIndonesian ? 
                ["Minggu, ", "Senin, ", "Selasa, ", "Rabu, ", "Kamis, ", "Jumat, ", "Sabtu, "] :
                ["Sunday, ", "Monday, ", "Tuesday, ", "Wednesday, ", "Thursday, ", "Friday, ", "Saturday, "];
                
            const months = isIndonesian ? 
                ["Januari", "Februari", "Maret", "April", "Mei", "Juni", 
                 "Juli", "Agustus", "September", "Oktober", "November", "Desember"] :
                ["January", "February", "March", "April", "May", "June",
                 "July", "August", "September", "October", "November", "December"];

            const dayName = days[now.getDay()];
            const month = months[now.getMonth()];
            const day = now.getDate();
            const year = now.getFullYear();
            const dateString = isIndonesian ? 
                `${day} ${month} ${year}` : 
                `${month} ${day} ${year}`;

            // Time formatting
            let hours = now.getHours();
            let minutes = now.getMinutes();
            let seconds = now.getSeconds();

            hours = (hours < 10 ? '0' : '') + hours;
            minutes = (minutes < 10 ? '0' : '') + minutes;
            seconds = (seconds < 10 ? '0' : '') + seconds;

            const timeString = `${hours}:${minutes}:${seconds}`;

            document.getElementById("clock").textContent = timeString;
            document.getElementById("day-date").textContent = `${dayName}${dateString}`;
        }

        // Initial setup
        setInterval(checkAndRefresh, 1000);
        setInterval(updateTime, 1000);
        updateTime();
    </script>
</body>
</html>