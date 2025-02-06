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
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
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
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
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


        .page-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            text-align: center;
            padding: 4rem 2rem;
            border-radius: 20px;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%' height='100%' viewBox='0 0 1600 800' preserveAspectRatio='none'%3E%3Cpath fill='rgba(255,255,255,0.1)' d='M1102.5 734.8c2.5-1.2 24.8-8.6 25.6-7.5.5.7-5.4 23.1-6.2 22.7C1120.7 750.1 1100.2 736.4 1102.5 734.8zM1226.3 705.4c-2-1.6 22.1-10.4 22.3-8.8.2 1.6-21.3 9.9-22.3 8.8zM1152.2 773.8c1.7-1.4-12.7 10.2-12.7 8.9 0-1.3 11-9.5 12.7-8.9zM1218.7 715.4c2.3-1.5 24.7-10.4 25.2-9 .5 1.4-23.1 10.3-25.2 9zM1309.7 538.4c.3-.6-14.1 6.3-14.1 5.5 0-.9 13.8-6.1 14.1-5.5zM1432.3 676.9c1.9-1.6-17.1 9.7-17.1 8.2 0-1.5 15.2-8.6 17.1-8.2zM1277.7 696c.4-.5-11.7 6.2-11.7 5.4 0-.8 11.3-5.7 11.7-5.4z'/%3E%3Cpath fill='rgba(255,255,255,0.2)' d='M734.8 402.5c-1.2 2.5-8.6 24.8-7.5 25.6.7.5 23.1-5.4 22.7-6.2C750.1 421.7 736.4 401.2 734.8 402.5zM805.4 476.3c-1.6-2 10.4 22.1 8.8 22.3-1.6.2-9.9-21.3-8.8-22.3zM773.8 447.8c-1.4 1.7 10.2-12.7 8.9-12.7-1.3 0-9.5 11-8.9 12.7zM715.4 381.3c-1.5 2.3-10.4 24.7-9 25.2 1.4.5 10.3-23.1 9-25.2zM538.4 290.3c-.6.3 6.3-14.1 5.5-14.1-.9 0-6.1 13.8-5.5 14.1zM676.9 167.7c-1.6 1.9 9.7-17.1 8.2-17.1-1.5 0-8.6 15.2-8.2 17.1zM696 322.3c-.5.4 6.2-11.7 5.4-11.7-.8 0-5.7 11.3-5.4 11.7z'/%3E%3C/svg%3E");
            background-blend-mode: soft-light;
            opacity: 0.3;
            z-index: 1;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }

        .hero-section p {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1rem;
            opacity: 0.9;
            position: relative;
            z-index: 2;
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
            position: relative;
            overflow: hidden;
        }

        .transport-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
        }

        .transport-card:hover {
            transform: translateY(-15px) rotate(1deg);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        .transport-card .icon {
            font-size: 4rem;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }

        .transport-card:hover .icon {
            transform: scale(1.2) rotate(15deg);
        }

        .transport-card h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
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
            color: var(--accent-color);
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
            transition: transform 0.3s ease;
        }

        .access-info li::before {
            content: '•';
            position: absolute;
            left: 0;
            color: var(--secondary-color);
            font-weight: bold;
        }

        .access-info li:hover {
            transform: translateX(10px);
            color: var(--secondary-color);
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

        /* Additional Creative Touches */
        .transport-card::after {
            content: '';
            position: absolute;
            bottom: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .transport-card:hover::after {
            opacity: 1;
        }
    </style>
</head>
<body>
    
    <a href="javascript:history.back()" class="back-button">
        <i class="fas fa-arrow-left"></i>
        Back to Dashboard
    </a>
    <div class="page-wrapper">
        <section class="hero-section">
            <h1>Mobilitas Modern Indonesia</h1>
            <p>Jelajahi berbagai pilihan transportasi yang inovatif dan efisien. Kami memberikan informasi komprehensif untuk memudahkan perjalanan Anda di seluruh penjuru negeri.</p>
        </section>
        
        <div class="transport-container">
            <div class="transport-card">
                <div class="icon">
                    <i class="fas fa-train"></i>
                </div>
                <h2>Kereta Api</h2>
                <p class="description">Jaringan transportasi modern yang menghubungkan kota-kota dengan infrastruktur canggih dan pelayanan berkualitas tinggi.</p>
                <div class="access-info">
                    <h3>Panduan Akses</h3>
                    <ul>
                        <li>Cek rute dan jadwal online</li>
                        <li>Pilih kelas perjalanan</li>
                        <li>Booking tiket digital</li>
                        <li>Konfirmasi keberangkatan</li>
                    </ul>
                </div>
            </div>

            <div class="transport-card">
                <div class="icon">
                    <i class="fas fa-bus"></i>
                </div>
                <h2>Transportasi Bus</h2>
                <p class="description">Layanan angkutan umum terjangkau dengan jaringan rute komprehensif di perkotaan dan antarwilayah.</p>
                <div class="access-info">
                    <h3>Panduan Akses</h3>
                    <ul>
                        <li>Temukan rute terdekat</li>
                        <li>Periksa jadwal real-time</li>
                        <li>Siapkan metode pembayaran</li>
                        <li>Gunakan halte resmi</li>
                    </ul>
                </div>
            </div>

            <div class="transport-card">
                <div class="icon">
                    <i class="fas fa-taxi"></i>
                </div>
                <h2>Layanan Taksi</h2>
                <p class="description">Transportasi personal fleksibel dengan teknologi booking modern dan jangkauan luas di seluruh kawasan.</p>
                <div class="access-info">
                    <h3>Panduan Akses</h3>
                    <ul>
                        <li>Download aplikasi resmi</li>
                        <li>Tentukan lokasi penjemputan</li>
                        <li>Pilih jenis kendaraan</li>
                        <li>Lacak perjalanan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>