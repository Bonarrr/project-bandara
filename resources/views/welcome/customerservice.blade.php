<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Service - YIA</title>
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

        .container {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            padding: 1rem 0;
        }

        .main-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            border: 1px solid rgba(255,255,255,0.3);
        }

        .contact-item {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .contact-item:hover {
            transform: translateY(-5px);
        }

        .contact-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .contact-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .contact-info {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }

        .call-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 0.8rem 1.5rem;
            background: var(--gradient);
            color: white;
            border: none;
            border-radius: 25px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .call-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }

        .side-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            height: fit-content;
        }

        .faq-item {
            border-bottom: 1px solid rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-question {
            font-weight: 500;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .faq-answer {
            color: #666;
            font-size: 0.9rem;
            line-height: 1.5;
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

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            header {
                grid-template-columns: 1fr 1fr;
                grid-template-rows: auto auto;
                text-align: center;
            }

            .left {
                grid-column: 1 / -1;
                grid-row: 2;
                justify-self: center;
                margin-top: 10px;
            }

            .center {
                grid-column: 1;
                grid-row: 1;
                justify-self: start;
            }

            .right {
                grid-column: 2;
                grid-row: 1;
                justify-self: end;
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

    <div class="container">
        <div class="main-card">
            <h1 style="color: var(--primary); margin-bottom: 2rem;" data-en="Contact Customer Service" data-id="Hubungi Layanan Pelanggan">
                Contact Customer Service
            </h1>
            
            <div class="contact">
                <div class="contact-item">
                    <i class="contact-icon fas fa-phone-alt"></i>
                    <h3 class="contact-title" data-en="General Inquiries" data-id="Informasi Umum">General Inquiries</h3>
                    <p class="contact-info" data-en="24/7 Customer Support" data-id="Layanan Pelanggan 24/7">24/7 Customer Support</p>
                    <a href="tel:+62274123456" class="call-button">
                        <i class="fas fa-phone"></i>
                        <span data-en="Call Now" data-id="Hubungi Sekarang">Call Now</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="side-card">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;" data-en="FAQ" data-id="Pertanyaan Umum">FAQ</h2>
            
            <div class="faq-item">
                <h3 class="faq-question" data-en="What are the operating hours?" data-id="Apa jam operasional?">
                    What are the operating hours?
                </h3>
                <p class="faq-answer" data-en="Our customer service is available 24/7, including holidays." data-id="Layanan pelanggan kami tersedia 24/7, termasuk hari libur.">
                    Our customer service is available 24/7, including holidays.
                </p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question" data-en="Average response time?" data-id="Berapa lama waktu respons?">
                    Average response time?
                </h3>
                <p class="faq-answer" data-en="We aim to answer all calls within 3 minutes." data-id="Kami berusaha menjawab semua panggilan dalam waktu 3 menit.">
                    We aim to answer all calls within 3 minutes.
                </p>
            </div>

            <div class="faq-item">
                <h3 class="faq-question" data-en="Languages available?" data-id="Bahasa yang tersedia?">
                    Languages available?
                </h3>
                <p class="faq-answer" data-en="We provide support in Indonesian, English, and Mandarin." data-id="Kami menyediakan layanan dalam Bahasa Indonesia, Inggris, dan Mandarin.">
                    We provide support in Indonesian, English, and Mandarin.
                </p>
            </div>
        </div>
    </div>
</body>
</html>