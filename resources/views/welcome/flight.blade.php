<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Information</title>
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
            background-color: white;
            padding: 1rem;
            min-height: 100vh;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
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

        .filter-card {
            background: var(--gradient);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e9ecef;
        }

        .filter-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .search-input {
            padding: 0.8rem 1.2rem;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            background: white;
            font-size: 0.9rem;
            width: 100%;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .flight-table {
            width: 100%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            border: 1px solid #e9ecef;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .flight-table th {
            background: #f8f9fa;
            padding: 1rem;
            text-align: center;
            font-weight: 600;
            color: #495057;
            border-bottom: 1px solid #e9ecef;
        }

        .flight-table td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #e9ecef;
            color: #495057;
        }

        .flight-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .status {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-block;
        }

        .status-ontime {
            background: #d8f5e8;
            color: #065f46;
        }

        .status-delayed {
            background: #ffe3e3;
            color: #991b1b;
        }

        .status-boarding {
            background: #dbeafe;
            color: #1e40af;
        }

        .tab-container {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .tab {
            padding: 0.8rem 1.5rem;
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s;
            color: #495057;
        }

        .tab.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }

        .language-switch {
            display: flex;
            gap: 5px;
            background: rgba(255,255,255,0.9);
            padding: 5px;
            border-radius: 20px;
            margin-left: auto;
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
            .container {
                padding: 10px;
            }

            .flight-table {
                display: block;
                overflow-x: auto;
            }

            .filter-section {
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

        <div class="filter-card">
            <h2 style="color: white; margin-bottom: 1.5rem;" data-en="Flight Information" data-id="Informasi Penerbangan">Flight Information</h2>
            
            <div class="tab-container">
                <div class="tab {{ $arrdep == 'D' ? 'active' : '' }}" data-en="Departures" data-id="Keberangkatan" onclick="changeTab('D')">Departures</div>
                <div class="tab {{ $arrdep == 'A' ? 'active' : '' }}" data-en="Arrivals" data-id="Kedatangan" onclick="changeTab('A')">Arrivals</div>
            </div>

            <div class="filter-section">
                <form action="{{ route('welcome.flight') }}" method="GET" class="flex items-center gap-2 relative">
                    <!-- Kontainer input yang relatif -->
                    <div class="relative w-auto">
                        <input type="hidden" name="type" value="{{ $arrdep }}">
                        <input type="text" name="flight_no" 
                            value="{{ request()->get('flight_no') }}" 
                            placeholder="Search by Flight Number..." 
                            class="border rounded-md px-3 py-2 text-sm w-auto pr-10"
                        />
                        
                        <!-- Tombol 'x' hanya muncul jika ada pencarian -->
                        @if(request()->get('flight_no'))
                            <a href="{{ route('welcome.flight', ['type' => $arrdep]) }}" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-800">
                                <i class="fas fa-times"></i> <!-- Icon 'x' untuk membatalkan filter -->
                            </a>
                        @endif
                    </div>
                    <button type="submit" 
                        class="bg-white text-black px-3 py-2 rounded-md hover:bg-blue-600 h-8 flex items-center justify-center">
                        Search
                    </button>
                </form>                
            </div>
        </div>

        <table class="flight-table">
            <thead>
                <tr>
                    <th data-en="Flight No" data-id="No Penerbangan">Flight No</th>
                    <th data-en="Airline" data-id="Maskapai">Airline</th>
                    <th data-en="Destination" data-id="Tujuan">Destination</th>
                    <th data-en="Schedule" data-id="Jadwal">Schedule</th>
                    <th>{{ $arrdep == 'D' ? 'Gate' : 'Belt' }}</th>
                    <th data-en="Status" data-id="Status">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['FlightInfoMyInspection'] as $flight)
                <tr>
                    <td>{{ $flight['flightno'] }}</td>
                    <td>{{ $flight['operatorname'] }}</td>
                    <td>{{ $flight['fromto'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($flight['schedule'])->format('H:i') }}</td>
                    <td>{{ $arrdep == 'D' ? $flight['gatenumber'] : $flight['beltnumber'] }}</td>
                    <td>
                        <span class="status
                            @if($flight['flightstat'] == 'On Time')
                                status-ontime
                            @elseif($flight['flightstat'] == 'Delayed')
                                status-delayed
                            @else
                                status-boarding
                            @endif
                        ">
                            {{ $flight['flightstat'] }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function checkAndRefresh() {
            const now = new Date();
            if (now.getSeconds() === 0) {
                location.reload(); // Refresh hanya saat detik = 00
            }
        }

        function changeTab(type) {
            window.location.href = "{{ url('flight') }}?type=" + type;
        }

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

        setInterval(checkAndRefresh, 1000);
    </script>
</body>
</html>