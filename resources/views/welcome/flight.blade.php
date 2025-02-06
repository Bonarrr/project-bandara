<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Information</title>
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
            background: #f8f9fa;
            border: 1px solid #e9ecef;
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
            background: #f1f3f5;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.1);
        }

        .filter-card {
            background: white;
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
        <a href="javascript:history.back()" class="back-button">
            <i class="fas fa-arrow-left"></i>
            Back to Dashboard
        </a>

        <div class="filter-card">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">Flight Information</h2>
            
            <div class="tab-container">
                <div class="tab active">Departures</div>
                <div class="tab">Arrivals</div>
            </div>

            <div class="filter-section">
                <input type="text" class="search-input" placeholder="Search by Flight Number">
                <input type="date" class="search-input">
                <select class="search-input">
                    <option value="">All Airlines</option>
                    <option value="GA">Garuda Indonesia</option>
                    <option value="QG">Citilink</option>
                    <option value="ID">Batik Air</option>
                </select>
            </div>
        </div>

        <table class="flight-table">
            <thead>
                <tr>
                    <th>Flight No</th>
                    <th>Airline</th>
                    <th>Destination</th>
                    <th>Schedule</th>
                    <th>Terminal</th>
                    <th>Gate</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>GA-318</td>
                    <td>Garuda Indonesia</td>
                    <td>Jakarta (CGK)</td>
                    <td>15:30</td>
                    <td>Terminal 1</td>
                    <td>Gate A3</td>
                    <td><span class="status status-ontime">On Time</span></td>
                </tr>
                <tr>
                    <td>QG-145</td>
                    <td>Citilink</td>
                    <td>Surabaya (SUB)</td>
                    <td>16:15</td>
                    <td>Terminal 2</td>
                    <td>Gate B1</td>
                    <td><span class="status status-delayed">Delayed</span></td>
                </tr>
                <tr>
                    <td>ID-6370</td>
                    <td>Batik Air</td>
                    <td>Denpasar (DPS)</td>
                    <td>16:45</td>
                    <td>Terminal 1</td>
                    <td>Gate A5</td>
                    <td><span class="status status-boarding">Boarding</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>