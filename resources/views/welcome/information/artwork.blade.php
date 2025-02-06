<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YIA Artwork</title>
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

        .artwork-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
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
    <div class="container">
        <a href="javascript:history.back()" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Back to Information
        </a>

        <div class="filter-card">
            <h2 style="color: var(--primary); margin-bottom: 1rem;">YIA Artwork Collection</h2>
            <div class="filter-section">
                <select class="filter-dropdown">
                    <option value="">All Locations</option>
                    <option value="terminal1">Terminal 1</option>
                    <option value="terminal2">Terminal 2</option>
                    <option value="departure">Departure Hall</option>
                    <option value="arrival">Arrival Hall</option>
                    <option value="garden">Airport Garden</option>
                </select>
            </div>
        </div>

        <div class="artwork-grid">
            <!-- Artwork Item 1 -->
            <div class="artwork-item">
                <img src="gambar/Container.svg" alt="Wayang Kulit" class="artwork-image">
                <div class="artwork-info">
                    <div class="artwork-location">
                        <i class="fas fa-map-marker-alt"></i>
                        Terminal 1 Departure
                    </div>
                    <h3 class="artwork-name">Wayang Kulit Installation</h3>
                    <p class="artwork-description">A stunning display of traditional Javanese shadow puppets, showcasing the rich cultural heritage of Yogyakarta. The installation features intricate puppet designs illuminated by modern lighting.</p>
                </div>
            </div>

            <!-- Artwork Item 2 -->
            <div class="artwork-item">
                <img src="/api/placeholder/400/320" alt="Batik Wall" class="artwork-image">
                <div class="artwork-info">
                    <div class="artwork-location">
                        <i class="fas fa-map-marker-alt"></i>
                        Terminal 2 Main Hall
                    </div>
                    <h3 class="artwork-name">Contemporary Batik Wall</h3>
                    <p class="artwork-description">A modern interpretation of traditional batik patterns created using mixed media. This large-scale installation combines classic motifs with contemporary artistic expressions.</p>
                </div>
            </div>

            <!-- Artwork Item 3 -->
            <div class="artwork-item">
                <img src="/api/placeholder/400/320" alt="Borobudur" class="artwork-image">
                <div class="artwork-info">
                    <div class="artwork-location">
                        <i class="fas fa-map-marker-alt"></i>
                        Arrival Hall
                    </div>
                    <h3 class="artwork-name">Borobudur Relief</h3>
                    <p class="artwork-description">A miniature recreation of the famous Borobudur temple reliefs, carved in modern materials. This piece tells the story of ancient Buddhist narratives in a contemporary setting.</p>
                </div>
            </div>

            <!-- Artwork Item 4 -->
            <div class="artwork-item">
                <img src="/api/placeholder/400/320" alt="Garden Sculpture" class="artwork-image">
                <div class="artwork-info">
                    <div class="artwork-location">
                        <i class="fas fa-map-marker-alt"></i>
                        Airport Garden
                    </div>
                    <h3 class="artwork-name">Harmony in Motion</h3>
                    <p class="artwork-description">A kinetic sculpture that moves with the wind, representing the harmony between nature and modern aviation. Created from sustainable materials with traditional Javanese motifs.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>