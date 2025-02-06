<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YIA Hotels</title>
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

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
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

        .back-button:hover {
            transform: translateX(-5px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .filter-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.3);
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

        .hotel-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
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
    <div class="container">
        <a href="javascript:history.back()" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Back to Information
        </a>

        <div class="filter-card">
            <h2 style="color: var(--primary); margin-bottom: 1rem;">YIA Partner Hotels</h2>
            <div class="filter-section">
                <select class="filter-dropdown">
                    <option value="">Distance from Airport</option>
                    <option value="0-5">0-5 km</option>
                    <option value="5-10">5-10 km</option>
                    <option value="10-15">10-15 km</option>
                    <option value="15+">15+ km</option>
                </select>
                <select class="filter-dropdown">
                    <option value="">Price Range</option>
                    <option value="budget">Budget (< Rp 500k)</option>
                    <option value="mid">Mid-range (Rp 500k - 1M)</option>
                    <option value="luxury">Luxury (> Rp 1M)</option>
                </select>
            </div>
        </div>

        <div class="hotel-grid">
            <!-- Hotel Item 1 -->
            <div class="hotel-item">
                <img src="gambar/Container.svg" alt="Hotel Grand YIA" class="hotel-image">
                <div class="hotel-info">
                    <div class="hotel-distance">
                        <i class="fas fa-location-dot"></i>
                        2.5 km from Airport
                    </div>
                    <h3 class="hotel-name">Hotel Grand YIA</h3>
                    <p class="hotel-address">
                        <i class="fas fa-map-marker-alt"></i>
                        Jl. Wates km 8, Yogyakarta
                    </p>
                    <p class="hotel-price">Rp 850k - Rp 1.2M per night</p>
                </div>
            </div>

            <!-- Hotel Item 2 -->
            <div class="hotel-item">
                <img src="/api/placeholder/400/320" alt="Transit Inn Express" class="hotel-image">
                <div class="hotel-info">
                    <div class="hotel-distance">
                        <i class="fas fa-location-dot"></i>
                        0.8 km from Airport
                    </div>
                    <h3 class="hotel-name">Transit Inn Express</h3>
                    <p class="hotel-address">
                        <i class="fas fa-map-marker-alt"></i>
                        Jl. Airport Raya No. 10, Yogyakarta
                    </p>
                    <p class="hotel-price">Rp 450k - Rp 600k per night</p>
                </div>
            </div>

            <!-- Hotel Item 3 -->
            <div class="hotel-item">
                <img src="/api/placeholder/400/320" alt="Luxury Airport Resort" class="hotel-image">
                <div class="hotel-info">
                    <div class="hotel-distance">
                        <i class="fas fa-location-dot"></i>
                        1.2 km from Airport
                    </div>
                    <h3 class="hotel-name">Luxury Airport Resort</h3>
                    <p class="hotel-address">
                        <i class="fas fa-map-marker-alt"></i>
                        Jl. Kulon Progo Resort Area, Yogyakarta
                    </p>
                    <p class="hotel-price">Rp 1.2M - Rp 2.5M per night</p>
                </div>
            </div>

            <!-- Hotel Item 4 -->
            <div class="hotel-item">
                <img src="/api/placeholder/400/320" alt="Budget Airport Inn" class="hotel-image">
                <div class="hotel-info">
                    <div class="hotel-distance">
                        <i class="fas fa-location-dot"></i>
                        3.5 km from Airport
                    </div>
                    <h3 class="hotel-name">Budget Airport Inn</h3>
                    <p class="hotel-address">
                        <i class="fas fa-map-marker-alt"></i>
                        Jl. Wates No. 123, Yogyakarta
                    </p>
                    <p class="hotel-price">Rp 350k - Rp 450k per night</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>