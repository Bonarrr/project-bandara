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
            grid-template-rows: 55vh 27vh;
            gap: 1rem;
            height: 90%;
        }

        .card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem;
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
            <img src="gambar/MpuklX20190503080722 1.png" alt="Logo" class="logo">
        </div>
        <div class="right">
            <img src="gambar/image 9.png" alt="Logo" class="logo">
            <div class="language-switch">
                <button class="lang-btn" id="idBtn">ID</button>
                <button class="lang-btn active" id="enBtn">EN</button>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="grid">
            <!-- Baris Pertama -->
            <div class="card main-card">
                <i class="icon fas fa-plane-departure"></i>
                <h2 data-en="Flight Information" data-id="Informasi Penerbangan">Flight Information</h2>
                <p data-en="Real-time flight updates from Yogyakarta International Airport" 
                   data-id="Update penerbangan langsung dari Bandara Internasional Yogyakarta">
                    Real-time flight updates from Yogyakarta International Airport
                </p>
                
                <table class="flight-table">
                    <tr>
                        <th data-en="Flight" data-id="Penerbangan">Flight</th>
                        <th data-en="Route" data-id="Rute">Route</th>
                        <th data-en="Time" data-id="Waktu">Time</th>
                        <th data-en="Status" data-id="Status">Status</th>
                    </tr>
                    <tr>
                        <td>GA-318</td>
                        <td>JKT ➔ DPS</td>
                        <td>15:30</td>
                        <td data-en="On Time" data-id="Tepat Waktu">On Time</td>
                    </tr>
                    <tr>
                        <td>QG-145</td>
                        <td>JKT ➔ SUB</td>
                        <td>16:15</td>
                        <td data-en="Delayed" data-id="Terlambat">Delayed</td>
                    </tr>
                </table>
                <a href="{{ route('welcome.flight') }}" class="btn">
                    <span data-en="View All Flights" data-id="Lihat Semua Penerbangan">View All Flights</span>
                    <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
                </a>
            </div>

            <div class="side-container">
                <div class="card">
                    <i class="icon fas fa-map-marked-alt"></i>
                    <h2 data-en="Interactive Map" data-id="Peta Interaktif">Interactive Map</h2>
                    <p data-en="Explore airport facilities and navigation" 
                       data-id="Jelajahi fasilitas dan navigasi bandara">
                        Explore airport facilities and navigation
                    </p>
                    <a href="#" class="btn">
                        <span data-en="Open Map" data-id="Buka Peta">Open Map</span>
                    </a>
                </div>
                
                <div class="card">
                    <i class="icon fas fa-store"></i>
                    <h2 data-en="Tenant Directory" data-id="Direktori Tenant">Tenant Directory</h2>
                    <p data-en="Discover shops and services available" 
                       data-id="Temukan toko dan layanan yang tersedia">
                        Discover shops and services available
                    </p>
                    <a href="{{ route('welcome.tenant') }}" class="btn">
                        <span data-en="Browse Tenants" data-id="Lihat Tenant">Browse Tenants</span>
                    </a>
                </div>
            </div>

            <!-- Baris Kedua -->
            <div class="bottom-row">
                <div class="card">
                    <i class="icon fas fa-info-circle"></i>
                    <h2 data-en="Information" data-id="Informasi">Information</h2>
                    <p data-en="Essential travel guidelines and regulations" 
                       data-id="Panduan dan peraturan perjalanan penting">
                        Essential travel guidelines and regulations
                    </p>
                    <a href="{{ route('welcome.information.index') }}" class="btn">
                        <span data-en="Learn More" data-id="Selengkapnya">Learn More</span>
                    </a>
                </div>

                <div class="card">
                    <i class="icon fas fa-headset"></i>
                    <h2 data-en="Customer Service" data-id="Layanan Pelanggan">Customer Service</h2>
                    <p data-en="24/7 support for your travel needs" 
                       data-id="Dukungan 24/7 untuk kebutuhan perjalanan Anda">
                        24/7 support for your travel needs
                    </p>
                    <a href="{{ route('welcome.customerservice') }}" class="btn">
                        <span data-en="Contact Us" data-id="Hubungi Kami">Contact Us</span>
                    </a>
                </div>

                <div class="card">
                    <i class="icon fas fa-comment-dots"></i>
                    <h2 data-en="Customer Feedback" data-id="Umpan Balik">Customer Feedback</h2>
                    <p data-en="Share your airport experience with us" 
                       data-id="Bagikan pengalaman bandara Anda dengan kami">
                        Share your airport experience with us
                    </p>
                    <a href="#" class="btn">
                        <span data-en="Give Feedback" data-id="Beri Umpan Balik">Give Feedback</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Language Switch Functionality
        document.getElementById('idBtn').addEventListener('click', function() {
            switchLanguage('id');
            updateTime(); // Update time display with Indonesian
        });

        document.getElementById('enBtn').addEventListener('click', function() {
            switchLanguage('en');
            updateTime(); // Update time display with English
        });

        function switchLanguage(lang) {
            // Update button active state
            document.querySelectorAll('.lang-btn').forEach(btn => btn.classList.remove('active'));
            document.getElementById(`${lang}Btn`).classList.add('active');
            
            // Update all translatable elements
            document.querySelectorAll('[data-en], [data-id]').forEach(element => {
                element.textContent = element.getAttribute(`data-${lang}`);
            });
        }

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
        switchLanguage('en');
        setInterval(updateTime, 1000);
        updateTime();
    </script>
</body>
</html>