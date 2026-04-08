<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
        <title>Vantix Stay - Booking Experience</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, #f5f5f5 0%, #ffd024 100%);
                min-height: 100vh;
                padding: 20px;
            }

            .booking-container {
                max-width: 1200px;
                margin: 0 auto;
                background: white;
                border-radius: 32px;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
                overflow: hidden;
                position: relative;
            }

            .booking-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, #F0BC0F, #FF6B6B, #4ECDC4, #F0BC0F);
                background-size: 300% 100%;
                animation: gradient 3s ease infinite;
                z-index: 10;
            }

            @keyframes gradient {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }

            /* ========== STEPPER RESPONSIVE ========== */
            .stepper-wrapper {
                padding: 32px 24px 0 24px;
                background: white;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .stepper {
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: relative;
                margin-bottom: 40px;
                min-width: 500px;
            }

            .step {
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
                z-index: 2;
                flex: 1;
            }

            .step-icon {
                width: 56px;
                height: 56px;
                background: #f0f0f0;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 24px;
                font-weight: bold;
                color: #999;
                transition: all 0.3s ease;
                background: white;
                border: 3px solid #e0e0e0;
            }

            .step.active .step-icon {
                background: linear-gradient(135deg, #F0BC0F, #FFA500);
                border-color: #F0BC0F;
                color: white;
                box-shadow: 0 10px 25px -5px rgba(240, 188, 15, 0.3);
                transform: scale(1.05);
            }

            .step.completed .step-icon {
                background: #4CAF50;
                border-color: #4CAF50;
                color: white;
            }

            .step-label {
                margin-top: 10px;
                font-weight: 600;
                font-size: 12px;
                color: #666;
                transition: all 0.3s ease;
                white-space: nowrap;
            }

            .step.active .step-label {
                color: #F0BC0F;
                font-weight: 700;
            }

            .step.completed .step-label {
                color: #4CAF50;
            }

            .step-line {
                flex: 1;
                height: 3px;
                background: #e0e0e0;
                margin: 0 8px;
                position: relative;
                top: -24px;
            }

            .step-line.active {
                background: linear-gradient(90deg, #F0BC0F, #FFA500);
            }

            /* ========== CONTENT PANEL ========== */
            .content-panel {
                padding: 0 20px 32px 20px;
                animation: fadeIn 0.5s ease;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .step-title {
                font-size: 28px;
                font-weight: 700;
                color: #1a1a2e;
                margin-bottom: 8px;
            }

            .step-subtitle {
                font-size: 14px;
                color: #666;
                margin-bottom: 32px;
                border-left: 4px solid #F0BC0F;
                padding-left: 12px;
            }

            /* ========== FORM STYLES ========== */
            .form-group {
                margin-bottom: 24px;
            }

            .form-label {
                display: flex;
                align-items: center;
                gap: 10px;
                font-size: 16px;
                font-weight: 600;
                color: #333;
                margin-bottom: 10px;
            }

            .form-label span:first-child {
                font-size: 22px;
            }

            .form-input {
                width: 100%;
                padding: 14px 18px;
                font-size: 15px;
                border: 2px solid #e0e0e0;
                border-radius: 16px;
                transition: all 0.3s ease;
                font-family: 'Poppins', sans-serif;
                background: #fafafa;
            }

            .form-input:focus {
                outline: none;
                border-color: #F0BC0F;
                background: white;
                box-shadow: 0 0 0 4px rgba(240, 188, 15, 0.1);
            }

            .form-input.error {
                border-color: #f44336;
                background: #fff5f5;
            }

            .error-message {
                color: #f44336;
                font-size: 12px;
                margin-top: 6px;
                display: none;
            }

            /* ========== PROPERTY CARDS ========== */
            .property-selector {
                margin-bottom: 24px;
            }

            .property-cards {
                display: flex;
                flex-direction: column;
                gap: 16px;
                margin-top: 16px;
            }

            .property-card {
                background: white;
                border: 2px solid #e0e0e0;
                border-radius: 20px;
                overflow: hidden;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                padding: 12px;
                gap: 12px;
            }

            .property-card:hover {
                transform: translateX(4px);
                border-color: #F0BC0F;
                box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            }

            .property-card.selected {
                border-color: #F0BC0F;
                background: linear-gradient(135deg, #fff9e6, #ffffff);
                box-shadow: 0 10px 25px -5px rgba(240, 188, 15, 0.2);
            }

            .property-image {
                width: 80px;
                height: 80px;
                background-size: cover;
                background-position: center;
                border-radius: 12px;
                flex-shrink: 0;
            }

            .property-info {
                flex: 1;
            }

            .property-name {
                font-size: 16px;
                font-weight: 700;
                color: #333;
                margin-bottom: 4px;
            }

            .property-price {
                font-size: 16px;
                font-weight: 800;
                color: #F0BC0F;
                margin-bottom: 6px;
            }

            .property-details {
                display: flex;
                gap: 10px;
                font-size: 11px;
                color: #999;
                flex-wrap: wrap;
            }

            /* ========== SUMMARY SECTION ========== */
            .property-summary {
                background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
                border-radius: 20px;
                padding: 20px;
                margin-bottom: 24px;
                border: 1px solid rgba(240, 188, 15, 0.2);
            }

            .summary-title {
                font-size: 20px;
                font-weight: 700;
                color: #F0BC0F;
                margin-bottom: 16px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .summary-item {
                display: flex;
                justify-content: space-between;
                padding: 12px 0;
                border-bottom: 1px solid #e0e0e0;
                font-size: 14px;
            }

            .summary-item:last-child {
                border-bottom: none;
            }

            .summary-label {
                color: #666;
                font-weight: 500;
            }

            .summary-value {
                font-weight: 600;
                color: #333;
                text-align: right;
                word-break: break-word;
                max-width: 60%;
            }

            .total-price {
                margin-top: 12px;
                padding-top: 12px;
                border-top: 2px solid #F0BC0F;
            }

            .total-price .summary-label {
                font-size: 16px;
                font-weight: 700;
                color: #F0BC0F;
            }

            .total-price .summary-value {
                font-size: 18px;
                font-weight: 800;
                color: #F0BC0F;
            }

            /* ========== PAYMENT METHODS ========== */
            .payment-methods {
                margin-bottom: 24px;
            }

            .payment-title {
                font-size: 18px;
                font-weight: 600;
                margin-bottom: 16px;
                color: #333;
            }

            .payment-options {
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .payment-card {
                background: white;
                border: 2px solid #e0e0e0;
                border-radius: 16px;
                padding: 16px;
                cursor: pointer;
                transition: all 0.3s ease;
                display: flex;
                align-items: center;
                gap: 16px;
            }

            .payment-card:hover {
                transform: translateX(4px);
                border-color: #F0BC0F;
            }

            .payment-card.selected {
                border-color: #F0BC0F;
                background: linear-gradient(135deg, #fff9e6, #ffffff);
            }

            .payment-icon {
                font-size: 36px;
            }

            .payment-info {
                flex: 1;
            }

            .payment-name {
                font-weight: 600;
                color: #333;
                margin-bottom: 2px;
                font-size: 15px;
            }

            .payment-desc {
                font-size: 11px;
                color: #999;
            }

            /* ========== SUCCESS SECTION ========== */
            .success-container {
                text-align: center;
                padding: 24px 0;
            }

            .success-icon {
                width: 90px;
                height: 90px;
                background: linear-gradient(135deg, #4CAF50, #45a049);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 24px;
                animation: scaleIn 0.5s ease;
            }

            @keyframes scaleIn {
                from {
                    transform: scale(0);
                    opacity: 0;
                }
                to {
                    transform: scale(1);
                    opacity: 1;
                }
            }

            .success-icon svg {
                width: 45px;
                height: 45px;
                stroke: white;
                stroke-width: 3;
            }

            .success-title {
                font-size: 28px;
                font-weight: 800;
                color: #4CAF50;
                margin-bottom: 12px;
            }

            .success-message {
                font-size: 15px;
                color: #666;
                margin-bottom: 24px;
            }

            .booking-code {
                background: linear-gradient(135deg, #f8f9fa, #ffffff);
                padding: 16px;
                border-radius: 16px;
                display: inline-block;
                margin-bottom: 24px;
                border: 1px solid rgba(240, 188, 15, 0.3);
            }

            .booking-code-label {
                font-size: 11px;
                color: #999;
                letter-spacing: 2px;
            }

            .booking-code-value {
                font-size: 20px;
                font-weight: 800;
                color: #F0BC0F;
                letter-spacing: 2px;
                font-family: monospace;
            }

            .detail-card {
                background: #f8f9fa;
                border-radius: 20px;
                padding: 20px;
                margin: 0 auto 24px;
                text-align: left;
            }

            .detail-card h4 {
                font-size: 18px;
                color: #F0BC0F;
                margin-bottom: 16px;
                text-align: center;
            }

            /* ========== BUTTONS ========== */
            .button-group {
                display: flex;
                flex-direction: column;
                gap: 12px;
                margin-top: 32px;
            }

            .btn {
                padding: 14px 24px;
                font-size: 15px;
                font-weight: 600;
                border: none;
                border-radius: 40px;
                cursor: pointer;
                transition: all 0.3s ease;
                font-family: 'Poppins', sans-serif;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                width: 100%;
            }

            .btn-primary {
                background: linear-gradient(135deg, #F0BC0F, #FFA500);
                color: white;
                box-shadow: 0 10px 20px -5px rgba(240, 188, 15, 0.3);
            }

            .btn-primary:active {
                transform: scale(0.98);
            }

            .btn-secondary {
                background: #f0f0f0;
                color: #666;
            }

            .btn-secondary:active {
                transform: scale(0.98);
            }

            .btn-outline {
                background: transparent;
                border: 2px solid #F0BC0F;
                color: #F0BC0F;
            }

            .btn-outline:active {
                transform: scale(0.98);
            }

            /* ========== TABLET & DESKTOP ========== */
            @media (min-width: 768px) {
                body {
                    padding: 40px 20px;
                }

                .stepper-wrapper {
                    padding: 48px 48px 0 48px;
                }

                .stepper {
                    min-width: auto;
                    margin-bottom: 60px;
                }

                .step-icon {
                    width: 80px;
                    height: 80px;
                    font-size: 32px;
                }

                .step-label {
                    font-size: 18px;
                    margin-top: 16px;
                }

                .step-line {
                    top: -36px;
                    margin: 0 16px;
                }

                .content-panel {
                    padding: 0 48px 48px 48px;
                }

                .step-title {
                    font-size: 36px;
                }

                .step-subtitle {
                    font-size: 18px;
                    margin-bottom: 48px;
                }

                .property-cards {
                    display: grid;
                    grid-template-columns: repeat(2, 1fr);
                    gap: 20px;
                }

                .property-card {
                    flex-direction: column;
                    padding: 0;
                }

                .property-image {
                    width: 100%;
                    height: 160px;
                    border-radius: 0;
                }

                .property-info {
                    padding: 16px;
                    width: 100%;
                }

                .payment-options {
                    display: grid;
                    grid-template-columns: repeat(3, 1fr);
                    gap: 16px;
                    flex-direction: row;
                }

                .payment-card {
                    flex-direction: column;
                    text-align: center;
                    padding: 20px;
                }

                .payment-icon {
                    font-size: 48px;
                }

                .payment-info {
                    text-align: center;
                }

                .button-group {
                    flex-direction: row;
                    margin-top: 48px;
                }

                .btn {
                    width: auto;
                    padding: 16px 32px;
                    font-size: 16px;
                }

                .btn-primary:hover,
                .btn-secondary:hover,
                .btn-outline:hover {
                    transform: translateY(-2px);
                }

                .success-icon {
                    width: 120px;
                    height: 120px;
                }

                .success-icon svg {
                    width: 60px;
                    height: 60px;
                }

                .success-title {
                    font-size: 36px;
                }

                .booking-code-value {
                    font-size: 32px;
                }
            }

            @media (min-width: 1024px) {
                .property-cards {
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            /* ========== ANIMATIONS ========== */
            @keyframes pulse {
                0%, 100% {
                    opacity: 1;
                }
                50% {
                    opacity: 0.5;
                }
            }

            .loading {
                animation: pulse 1.5s ease-in-out infinite;
            }

            .step-icon img {
                width: 26px;
                height: 26px;
                transition: 0.3s;
            }

            .step.active .step-icon img {
                filter: brightness(0) invert(1);
            }

            .step.completed .step-icon img {
                filter: brightness(0) invert(1);
            }
        </style>
    </head>
    <body>
        <div class="booking-container">
            <div class="stepper-wrapper">
                <div class="stepper" id="stepper">
                    <div class="step step-1 active" data-step="1">
                        <div class="step-icon">
                            <img src="/icons/user.svg" alt="Data Diri">
                        </div>
                        <div class="step-label">Data Diri</div>
                    </div>

                    <div class="step-line line-1"></div>

                    <div class="step step-2" data-step="2">
                        <div class="step-icon">
                            <img src="/icons/building.svg" alt="Property">
                        </div>
                        <div class="step-label">Pilih Property</div>
                    </div>

                    <div class="step-line line-2"></div>

                    <div class="step step-3" data-step="3">
                        <div class="step-icon">
                            <img src="/icons/payment.svg" alt="Pembayaran">
                        </div>
                        <div class="step-label">Pembayaran</div>
                    </div>

                    <div class="step-line line-3"></div>

                    <div class="step step-4" data-step="4">
                        <div class="step-icon">
                            <img src="/icons/check.svg" alt="Selesai">
                        </div>
                        <div class="step-label">Selesai</div>
                    </div>
                </div>
            </div>

            <div class="content-panel">
                <!-- STEP 1: Data Diri -->
                <div id="step1" class="step-content">
                    <h1 class="step-title">Data Diri</h1>
                    <p class="step-subtitle">Isi informasi pribadi Anda untuk melanjutkan booking</p>

                    <div class="form-group">
                        <div class="form-label">
                            <span>👤</span>
                            <span>Nama Lengkap</span>
                        </div>
                        <input type="text" class="form-input" id="namaLengkap" placeholder="Masukkan nama lengkap Anda">
                        <div class="error-message" id="errorNama">Nama lengkap harus diisi</div>
                    </div>

                    <div class="form-group">
                        <div class="form-label">
                            <span>📱</span>
                            <span>No Telepon</span>
                        </div>
                        <input type="tel" class="form-input" id="noTelepon" placeholder="Masukkan nomor telepon aktif">
                        <div class="error-message" id="errorTelepon">Nomor telepon harus 10-13 digit</div>
                    </div>

                    <div class="form-group">
                        <div class="form-label">
                            <span>📧</span>
                            <span>Email</span>
                        </div>
                        <input type="email" class="form-input" id="email" placeholder="contoh@email.com">
                        <div class="error-message" id="errorEmail">Email harus valid</div>
                    </div>

                    <div class="button-group">
                        <button class="btn btn-primary" onclick="goToStep2()">
                            Lanjut ke Pilih Property <span>→</span>
                        </button>
                    </div>
                </div>

                <!-- STEP 2: Pilih Property -->
                <div id="step2" class="step-content" style="display: none;">
                    <h1 class="step-title">Pilih Property</h1>
                    <p class="step-subtitle">Pilih unit property yang ingin Anda booking</p>

                    <div class="property-selector">
                        <div class="property-cards" id="propertyList"></div>
                    </div>

                    <div class="button-group">
                        <button class="btn btn-secondary" onclick="goToStep1()">
                            <span>←</span> Kembali
                        </button>
                        <button class="btn btn-primary" onclick="goToStep3()">
                            Lanjut ke Pembayaran <span>→</span>
                        </button>
                    </div>
                </div>

                <!-- STEP 3: Pembayaran -->
                <div id="step3" class="step-content" style="display: none;">
                    <h1 class="step-title">Pembayaran</h1>
                    <p class="step-subtitle">Pilih metode pembayaran yang Anda inginkan</p>

                    <div class="property-summary" id="bookingSummary"></div>

                    <div class="payment-methods">
                        <div class="payment-title">Pilih Metode Pembayaran</div>
                        <div class="payment-options">
                            <div class="payment-card" data-method="bank_transfer" onclick="selectPaymentMethod('bank_transfer')">
                                <div class="payment-icon">🏦</div>
                                <div class="payment-info">
                                    <div class="payment-name">Bank Transfer</div>
                                    <div class="payment-desc">BCA, Mandiri, BNI, BRI</div>
                                </div>
                            </div>
                            <div class="payment-card" data-method="credit_card" onclick="selectPaymentMethod('credit_card')">
                                <div class="payment-icon">💳</div>
                                <div class="payment-info">
                                    <div class="payment-name">Kartu Kredit</div>
                                    <div class="payment-desc">Visa, Mastercard</div>
                                </div>
                            </div>
                            <div class="payment-card" data-method="e_wallet" onclick="selectPaymentMethod('e_wallet')">
                                <div class="payment-icon">📱</div>
                                <div class="payment-info">
                                    <div class="payment-name">E-Wallet</div>
                                    <div class="payment-desc">GoPay, OVO, DANA</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="button-group">
                        <button class="btn btn-secondary" onclick="goToStep2()">
                            <span>←</span> Kembali
                        </button>
                        <button class="btn btn-primary" onclick="goToStep4()">
                            Bayar Sekarang <span>→</span>
                        </button>
                    </div>
                </div>

                <!-- STEP 4: Selesai -->
                <div id="step4" class="step-content" style="display: none;">
                    <div class="success-container">
                        <div class="success-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        
                        <h1 class="success-title">Booking Berhasil!</h1>
                        <p class="success-message" id="successMessage">Terima kasih, booking Anda telah kami terima.</p>

                        <div class="booking-code">
                            <div class="booking-code-label">KODE BOOKING</div>
                            <div class="booking-code-value" id="bookingCode">VTS202412150001</div>
                        </div>

                        <div class="detail-card" id="detailBooking"></div>

                        <p style="color: #666; margin-bottom: 24px; font-size: 13px;">
                            Informasi lebih lanjut akan dikirim ke email dan nomor telepon Anda.
                        </p>

                        <div class="button-group">
                            <button class="btn btn-outline" onclick="resetBooking()">
                                <span>←</span> Booking Baru
                            </button>
                            <button class="btn btn-primary" onclick="goToHome()">
                                Kembali ke Beranda <span>→</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // DATA DUMMY PROPERTIES
            const properties = [
                {
                    id: 1,
                    name: "The Grand Suite",
                    type: "Luxury Suite",
                    price: 2500000,
                    bedroom: 3,
                    bathroom: 3,
                    area: 185,
                    image: "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?w=400"
                },
                {
                    id: 2,
                    name: "The Royal Penthouse",
                    type: "Penthouse",
                    price: 4500000,
                    bedroom: 4,
                    bathroom: 5,
                    area: 320,
                    image: "https://images.unsplash.com/photo-1582268611958-ebfd161ef9cf?w=400"
                },
                {
                    id: 3,
                    name: "The Presidential Suite",
                    type: "Presidential",
                    price: 7500000,
                    bedroom: 5,
                    bathroom: 6,
                    area: 450,
                    image: "https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=400"
                },
                {
                    id: 4,
                    name: "The Executive Suite",
                    type: "Business",
                    price: 2200000,
                    bedroom: 2,
                    bathroom: 2,
                    area: 120,
                    image: "https://images.unsplash.com/photo-1560185008-5f61a8d770c7?w=400"
                },
                {
                    id: 5,
                    name: "The Garden Villa",
                    type: "Villa",
                    price: 3800000,
                    bedroom: 4,
                    bathroom: 4,
                    area: 350,
                    image: "https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=400"
                },
                {
                    id: 6,
                    name: "The Sky Residence",
                    type: "Premium",
                    price: 3100000,
                    bedroom: 3,
                    bathroom: 3,
                    area: 210,
                    image: "https://images.unsplash.com/photo-1574362848149-11496d93a7c7?w=400"
                }
            ];

            // Global variables
            let bookingData = {
                nama: '',
                telepon: '',
                email: '',
                property: null,
                payment_method: ''
            };

            // Render property list
            function renderProperties() {
                const container = document.getElementById('propertyList');
                if (!container) return;
                
                container.innerHTML = properties.map(prop => `
                    <div class="property-card" onclick="selectProperty(${prop.id})" data-id="${prop.id}">
                        <div class="property-image" style="background-image: url('${prop.image}')"></div>
                        <div class="property-info">
                            <div class="property-name">${prop.name}</div>
                            <div class="property-price">Rp ${prop.price.toLocaleString('id-ID')}/bulan</div>
                            <div class="property-details">
                                <span>🛏️ ${prop.bedroom}</span>
                                <span>🚽 ${prop.bathroom}</span>
                                <span>📐 ${prop.area}m²</span>
                            </div>
                        </div>
                    </div>
                `).join('');
            }

            // Select property
            function selectProperty(id) {
                const property = properties.find(p => p.id === id);
                bookingData.property = property;
                
                document.querySelectorAll('.property-card').forEach(card => {
                    card.classList.remove('selected');
                });
                
                const selectedCard = document.querySelector(`.property-card[data-id="${id}"]`);
                if (selectedCard) selectedCard.classList.add('selected');
            }

            // Update stepper UI
            function updateStepper(currentStep) {
                const steps = document.querySelectorAll('.step');
                const lines = document.querySelectorAll('.step-line');
                
                steps.forEach((step, index) => {
                    const stepNum = index + 1;
                    step.classList.remove('active', 'completed');
                    
                    if (stepNum < currentStep) {
                        step.classList.add('completed');
                        const icon = step.querySelector('.step-icon');
                        if (icon) icon.innerHTML = '✓';
                    } else if (stepNum === currentStep) {
                        step.classList.add('active');
                        const icon = step.querySelector('.step-icon');
                        if (icon) icon.innerHTML = stepNum;
                    } else {
                        const icon = step.querySelector('.step-icon');
                        if (icon) icon.innerHTML = stepNum;
                    }
                });
                
                lines.forEach((line, index) => {
                    if (index + 1 < currentStep) {
                        line.classList.add('active');
                    } else {
                        line.classList.remove('active');
                    }
                });
            }

            // Show specific step
            function showStep(stepNumber) {
                document.querySelectorAll('.step-content').forEach(content => {
                    content.style.display = 'none';
                });
                document.getElementById(`step${stepNumber}`).style.display = 'block';
                updateStepper(stepNumber);
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }

            // Step 1 validation
            function goToStep2() {
                const nama = document.getElementById('namaLengkap').value.trim();
                const telepon = document.getElementById('noTelepon').value.trim();
                const email = document.getElementById('email').value.trim();
                
                let isValid = true;
                
                if (!nama) {
                    document.getElementById('errorNama').style.display = 'block';
                    document.getElementById('namaLengkap').classList.add('error');
                    isValid = false;
                } else {
                    document.getElementById('errorNama').style.display = 'none';
                    document.getElementById('namaLengkap').classList.remove('error');
                }
                
                if (!telepon || !/^[0-9]{10,13}$/.test(telepon)) {
                    document.getElementById('errorTelepon').style.display = 'block';
                    document.getElementById('noTelepon').classList.add('error');
                    isValid = false;
                } else {
                    document.getElementById('errorTelepon').style.display = 'none';
                    document.getElementById('noTelepon').classList.remove('error');
                }
                
                if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    document.getElementById('errorEmail').style.display = 'block';
                    document.getElementById('email').classList.add('error');
                    isValid = false;
                } else {
                    document.getElementById('errorEmail').style.display = 'none';
                    document.getElementById('email').classList.remove('error');
                }
                
                if (isValid) {
                    bookingData.nama = nama;
                    bookingData.telepon = telepon;
                    bookingData.email = email;
                    renderProperties();
                    showStep(2);
                }
            }

            function goToStep1() {
                showStep(1);
            }

            function goToStep3() {
                if (!bookingData.property) {
                    alert('Silakan pilih property terlebih dahulu!');
                    return;
                }
                
                const summaryHtml = `
                    <div class="summary-title">
                        <span>🏠</span>
                        <span>Ringkasan Booking</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Nama Lengkap</span>
                        <span class="summary-value">${bookingData.nama}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">No Telepon</span>
                        <span class="summary-value">${bookingData.telepon}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Email</span>
                        <span class="summary-value">${bookingData.email}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Property</span>
                        <span class="summary-value">${bookingData.property.name}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Durasi</span>
                        <span class="summary-value">12 Bulan</span>
                    </div>
                    <div class="summary-item total-price">
                        <span class="summary-label">Total Pembayaran</span>
                        <span class="summary-value">Rp ${bookingData.property.price.toLocaleString('id-ID')}</span>
                    </div>
                `;
                document.getElementById('bookingSummary').innerHTML = summaryHtml;
                
                showStep(3);
            }

            function selectPaymentMethod(method) {
                bookingData.payment_method = method;
                
                document.querySelectorAll('.payment-card').forEach(card => {
                    card.classList.remove('selected');
                });
                
                const selectedCard = document.querySelector(`.payment-card[data-method="${method}"]`);
                if (selectedCard) selectedCard.classList.add('selected');
            }

            function goToStep4() {
                if (!bookingData.payment_method) {
                    alert('Silakan pilih metode pembayaran terlebih dahulu!');
                    return;
                }
                
                const date = new Date();
                const year = date.getFullYear();
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');
                const random = Math.floor(Math.random() * 10000).toString().padStart(4, '0');
                const bookingCode = `VTS${year}${month}${day}${random}`;
                
                const paymentNames = {
                    bank_transfer: 'Bank Transfer',
                    credit_card: 'Kartu Kredit',
                    e_wallet: 'E-Wallet'
                };
                
                document.getElementById('bookingCode').innerHTML = bookingCode;
                document.getElementById('successMessage').innerHTML = `Terima kasih ${bookingData.nama}, booking Anda telah kami terima.`;
                
                const detailHtml = `
                    <h4>Detail Booking</h4>
                    <div class="summary-item">
                        <span class="summary-label">Nama Lengkap</span>
                        <span class="summary-value">${bookingData.nama}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">No Telepon</span>
                        <span class="summary-value">${bookingData.telepon}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Email</span>
                        <span class="summary-value">${bookingData.email}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Property</span>
                        <span class="summary-value">${bookingData.property.name}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Metode Pembayaran</span>
                        <span class="summary-value">${paymentNames[bookingData.payment_method]}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Total Pembayaran</span>
                        <span class="summary-value">Rp ${bookingData.property.price.toLocaleString('id-ID')}</span>
                    </div>
                    <div class="summary-item">
                        <span class="summary-label">Tanggal Booking</span>
                        <span class="summary-value">${date.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric', hour: '2-digit', minute: '2-digit' })}</span>
                    </div>
                `;
                document.getElementById('detailBooking').innerHTML = detailHtml;
                
                showStep(4);
            }

            function resetBooking() {
                if (confirm('Apakah Anda yakin ingin memulai booking baru?')) {
                    bookingData = {
                        nama: '',
                        telepon: '',
                        email: '',
                        property: null,
                        payment_method: ''
                    };
                    
                    document.getElementById('namaLengkap').value = '';
                    document.getElementById('noTelepon').value = '';
                    document.getElementById('email').value = '';
                    
                    showStep(1);
                }
            }

            function goToHome() {
                window.location.href = '/';
            }

            // Initialize
            renderProperties();
        </script>
    </body>
</html>