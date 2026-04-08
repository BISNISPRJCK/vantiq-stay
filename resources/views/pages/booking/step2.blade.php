{{-- resources/views/pages/booking/step2.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Booking - Pembayaran | Vantix Stay</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }

        .frame-88 {
            position: relative;
            width: 1110px;
            margin: 100px auto;
        }

        .frame-87 {
            position: relative;
            width: 771px;
            height: 187px;
            margin: 0 auto 50px;
        }

        .step-1, .step-2, .step-3 {
            position: absolute;
            width: 139px;
            height: 196px;
            top: -9px;
        }

        .step-1 { left: 0px; }
        .step-2 { left: 287px; width: 211px; }
        .step-3 { left: 651px; width: 120px; }

        .step-1 .step-icon, .step-2 .step-icon, .step-3 .step-icon {
            position: absolute;
            width: 120px;
            height: 120px;
            top: 0px;
        }

        .step-1 .step-icon { left: 1px; }
        .step-2 .step-icon { left: 333px; }
        .step-3 .step-icon { left: 651px; }

        .step-1 .step-label {
            position: absolute;
            width: 139px;
            top: 139px;
            left: 0px;
        }

        .step-2 .step-label {
            position: absolute;
            width: 211px;
            top: 139px;
            left: 287px;
        }

        .step-3 .step-label {
            position: absolute;
            width: 115px;
            top: 139px;
            left: 654px;
        }

        .step-label {
            font-family: 'Poppins';
            font-weight: 500;
            font-size: 32px;
            line-height: 48px;
        }

        .step-1 .step-label { color: #F0BC0F; }
        .step-2 .step-label { color: #F0BC0F; }
        .step-3 .step-label { color: #000000; }

        .line-11, .line-12 {
            position: absolute;
            width: 153px;
            height: 0px;
            top: 60px;
            border-radius: 9px;
        }

        .line-11 {
            left: 157px;
            border: 18px solid #F0BC0F;
        }

        .line-12 {
            left: 480px;
            border: 18px solid #F0BC0F;
        }

        .frame-86 {
            background: #FFFFFF;
            box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.25);
            border-radius: 8px;
            padding: 42px;
        }

        .payment-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .payment-header h1 {
            font-size: 40px;
            color: #000000;
            margin-bottom: 10px;
        }

        .payment-header p {
            font-size: 24px;
            color: rgba(0, 0, 0, 0.5);
        }

        .booking-summary {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 30px;
            margin-bottom: 40px;
        }

        .booking-summary h3 {
            font-size: 28px;
            color: #F0BC0F;
            margin-bottom: 20px;
        }

        .summary-detail {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #ddd;
        }

        .summary-detail:last-child {
            border-bottom: none;
        }

        .summary-label {
            font-size: 20px;
            color: #666;
        }

        .summary-value {
            font-size: 20px;
            font-weight: 600;
            color: #000;
        }

        .total-price {
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #F0BC0F;
        }

        .total-price .summary-label {
            font-size: 24px;
            font-weight: 600;
            color: #F0BC0F;
        }

        .total-price .summary-value {
            font-size: 28px;
            font-weight: 700;
            color: #F0BC0F;
        }

        .payment-methods {
            margin-bottom: 40px;
        }

        .payment-methods h3 {
            font-size: 28px;
            margin-bottom: 20px;
        }

        .method-options {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .method-card {
            flex: 1;
            min-width: 200px;
            padding: 20px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            transition: all 0.3s ease;
        }

        .method-card:hover {
            border-color: #F0BC0F;
            transform: translateY(-5px);
        }

        .method-card.selected {
            border-color: #F0BC0F;
            background: #fff9e6;
        }

        .method-card input[type="radio"] {
            display: none;
        }

        .method-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .method-name {
            font-size: 18px;
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .btn-back, .btn-pay {
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-back {
            background: #f0f0f0;
            color: #333;
        }

        .btn-back:hover {
            background: #e0e0e0;
        }

        .btn-pay {
            background: #F0BC0F;
            color: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }

        .btn-pay:hover {
            background: #d4a30d;
            transform: scale(1.02);
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            z-index: 1000;
            animation: slideIn 0.3s ease;
        }

        .alert-success {
            background: #4CAF50;
            color: white;
        }

        .alert-error {
            background: #f44336;
            color: white;
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @media (max-width: 1150px) {
            .frame-88 { width: 95%; }
            .frame-87 { width: 100%; position: relative; height: auto; }
            .step-1, .step-2, .step-3 { position: relative; display: inline-block; margin: 0 10px; }
            .line-11, .line-12 { display: none; }
            .method-options { flex-direction: column; }
        }
    </style>
</head>
<body>
    @if(session('error'))
    <div class="alert alert-error" id="alertMessage">
        {{ session('error') }}
    </div>
    @endif

    <div class="frame-88">
        <div class="frame-87">
            <div class="step-1">
                <div class="step-icon">
                    <svg width="120" height="120" viewBox="0 0 120 120">
                        <circle cx="60" cy="60" r="54" fill="#F0BC0F"/>
                        <path d="M45 60L55 70L75 50" stroke="white" stroke-width="6"/>
                    </svg>
                </div>
                <div class="step-label">Data Diri</div>
            </div>
            <div class="line-11"></div>
            <div class="step-2">
                <div class="step-icon">
                    <svg width="120" height="120" viewBox="0 0 120 120">
                        <circle cx="60" cy="60" r="54" fill="#F0BC0F"/>
                        <path d="M45 60L55 70L75 50" stroke="white" stroke-width="6"/>
                    </svg>
                </div>
                <div class="step-label">Pembayaran</div>
            </div>
            <div class="line-12"></div>
            <div class="step-3">
                <div class="step-icon"></div>
                <div class="step-label">Selesai</div>
            </div>
        </div>

        <div class="frame-86">
            <div class="payment-header">
                <h1>Metode Pembayaran</h1>
                <p>Pilih metode pembayaran yang Anda inginkan</p>
            </div>

            <div class="booking-summary">
                <h3>Ringkasan Booking</h3>
                <div class="summary-detail">
                    <span class="summary-label">Nama Lengkap</span>
                    <span class="summary-value">{{ session('booking.nama_lengkap') }}</span>
                </div>
                <div class="summary-detail">
                    <span class="summary-label">No Telepon</span>
                    <span class="summary-value">{{ session('booking.no_telepon') }}</span>
                </div>
                <div class="summary-detail total-price">
                    <span class="summary-label">Total Pembayaran</span>
                    <span class="summary-value">Rp {{ number_format(session('booking.total_price', 2500000), 0, ',', '.') }}</span>
                </div>
            </div>

            <form action="{{ route('booking.step2.post') }}" method="POST">
                @csrf
                <div class="payment-methods">
                    <h3>Pilih Metode Pembayaran</h3>
                    <div class="method-options">
                        <label class="method-card" onclick="selectMethod(this)">
                            <input type="radio" name="payment_method" value="bank_transfer" required>
                            <div class="method-icon">🏦</div>
                            <div class="method-name">Bank Transfer</div>
                            <small>BCA, Mandiri, BNI, BRI</small>
                        </label>
                        <label class="method-card" onclick="selectMethod(this)">
                            <input type="radio" name="payment_method" value="credit_card">
                            <div class="method-icon">💳</div>
                            <div class="method-name">Kartu Kredit</div>
                            <small>Visa, Mastercard</small>
                        </label>
                        <label class="method-card" onclick="selectMethod(this)">
                            <input type="radio" name="payment_method" value="e_wallet">
                            <div class="method-icon">📱</div>
                            <div class="method-name">E-Wallet</div>
                            <small>GoPay, OVO, DANA</small>
                        </label>
                    </div>
                </div>

                <div class="action-buttons">
                    <a href="{{ route('booking.step1') }}" class="btn-back">← Kembali</a>
                    <button type="submit" class="btn-pay">Bayar Sekarang →</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function selectMethod(card) {
            document.querySelectorAll('.method-card').forEach(c => c.classList.remove('selected'));
            card.classList.add('selected');
            card.querySelector('input[type="radio"]').checked = true;
        }

        setTimeout(function() {
            var alert = document.getElementById('alertMessage');
            if (alert) alert.style.display = 'none';
        }, 3000);
    </script>
</body>
</html>