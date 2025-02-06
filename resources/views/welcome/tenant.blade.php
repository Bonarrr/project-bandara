<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant Directory</title>
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

        .tenant-card {
            background: whitesmoke;
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 1.5rem
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
            border-radius: 10px;
            background: white;
            font-size: 0.9rem;
            width: 100%;
        }

        .filter-dropdown {
            padding: 0.8rem 1.2rem;
            border: none;
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
        <a href="javascript:history.back()" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Back to Dashboard
        </a>
        <div class="tenant-card">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">Tenant Directory</h2>
            
            <div class="filter-section">
                <input type="text" class="search-input" placeholder="Search tenants...">
                <select class="filter-dropdown">
                    <option value="">All Categories</option>
                    <option value="food">Food & Beverage</option>
                    <option value="retail">Retail</option>
                    <option value="services">Services</option>
                    <option value="duty-free">Duty Free</option>
                </select>
                <select class="filter-dropdown">
                    <option value="">All Areas</option>
                    <option value="t1">Terminal 1</option>
                    <option value="t2">Terminal 2</option>
                    <option value="domestic">Domestic Area</option>
                    <option value="international">International Area</option>
                </select>
            </div>

            <div class="tenants-grid">
                @foreach ($tenants as $tenant)
                    <div class="tenant-item">
                        <img src="{{ url('storage/' . $tenant->foto) }}" alt="{{ $tenant->nama }}" class="tenant-image">
                        <div class="tenant-info">
                            <span class="tenant-category">{{ $tenant->kategori }}</span>
                            <h3 class="tenant-name">{{ $tenant->nama }}</h3>
                            <p class="tenant-description">{{ implode(', ', $tenant->jadwal) }}</p>
                            <div class="tenant-details">
                                <p><i class="fas fa-map-marker-alt"></i> {{ $tenant->location }}</p>
                                <p><i class="fas fa-clock"></i>{{ date('H:i', strtotime($tenant->jam_buka)) }} - {{ date('H:i', strtotime($tenant->jam_tutup)) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Tambahkan Pagination -->
            <div style="margin-top: 20px;">
                {{ $tenants->links() }}
            </div>

        </div>
    </div>
</body>

</html>