{{-- resources/views/pages/booking/step3.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - Selesai | Vantix Stay</title>
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
        .step-3 .step-label { color: #F0BC0F; }

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
            padding: 60px 42px;
            text-align: center;
        }

        .success-icon {
            margin-bottom: 30px;
        }

        .success-icon svg {
            width: 120px;
            height: 120px;
        }

        .frame-86 h1 {
            font-size: 48px;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        .frame-86 p {
            font-size: 24px;
            color: #666;
            margin-bottom: 15px;
        }

        .booking-code {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            margin: 30px auto;
            display: inline-block;
        }

        .booking-code-label {
            font-size: 16px;
            color: #999;
            margin-bottom: 5px;
        }

        .booking-code-value {
            font-size: 32px;
            font-weight: 700;
            color: #F0BC0F;
            letter-spacing: 2px;
        }

        .detail-summary {
            background: #f9f9f9;
            border-radius: 8px;
            padding: 30px;
            margin: 30px auto;
            max-width: 500px;
            text-align: left;
        }

        .detail-summary h3 {
            font-size: 24px;
            color: #F0BC0F;
            margin-bottom: 20px;
            text-align: center;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .action-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
            margin-top: 40px;
        }

        .btn-home, .btn-property {
            padding: 15px 40px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-home {
            background: #f0f0f0;
            color: #333;
        }

        .btn-home:hover {
            background: #e0e0e0;
        }

        .btn-property {
            background: #F0BC0F;
            color: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }

        .btn-property:hover {
            background: #d4a30d;
            transform: scale(1.02);
        }

        @media (max-width: 1150px) {
            .frame-88 { width: 95%; }
            .frame-87 { width: 100%; position: relative; height: auto; }
            .step-1, .step-2, .step-3 { position: relative; display: inline-block; margin: 0 10px; }
            .line-11, .line-12 { display: none; }
            .action-buttons { flex-direction: column; align-items: center; }
        }
    </style>
</head>
<body>
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
                <div class="step-icon">
                    <svg width="120" height="120" viewBox="0 0 120 120">
                        <circle cx="60" cy="60" r="54" fill="#F0BC0F"/>
                        <path d="M45 60L55 70L75 50" stroke="white" stroke-width="6"/>
                    </svg>
                </div>
                <div class="step-label">Selesai</div>
            </div>
        </div>

        <div class="frame-86">
            <div class="success-icon">
                <svg viewBox="0 0 120 120" fill="none">
                    <circle cx="60" cy="60" r="54" fill="#4CAF50"/>
                    <path d="M45 60L55 70L75 50" stroke="white" stroke-width="6" stroke-linecap="round"/>
                </svg>
            </div>
            
            <h1>Booking Berhasil!</h1>
            <p>Terima kasih {{ session('booking.nama_lengkap') }}, booking Anda telah kami terima.</p>
            
            <div class="booking-code">
                <div class="booking-code-label">Kode Booking</div>
                <div class="booking-code-value">{{ session('booking.booking_code', 'VTS' . date('Ymd') . rand(1000, 9999)) }}</div>
            </div>

            <div class="detail-summary">
                <h3>Detail Booking</h3>
                <div class="detail-item">
                    <span>Nama Lengkap</span>
                    <strong>{{ session('booking.nama_lengkap') }}</strong>
                </div>
                <div class="detail-item">
                    <span>No Telepon</span>
                    <strong>{{ session('booking.no_telepon') }}</strong>
                </div>
                <div class="detail-item">
                    <span>Metode Pembayaran</span>
                    <strong>{{ ucfirst(str_replace('_', ' ', session('booking.payment_method', 'bank_transfer'))) }}</strong>
                </div>
                <div class="detail-item">
                    <span>Total Pembayaran</span>
                    <strong>Rp {{ number_format(session('booking.total_price', 2500000), 0, ',', '.') }}</strong>
                </div>
                <div class="detail-item">
                    <span>Tanggal Booking</span>
                    <strong>{{ date('d F Y H:i') }}</strong>
                </div>
            </div>

            <p>Informasi lebih lanjut akan dikirim ke nomor telepon Anda.</p>

            <div class="action-buttons">
                <a href="{{ route('home') }}" class="btn-home">← Kembali ke Beranda</a>
                <a href="{{ route('property') }}" class="btn-property">Lihat Property Lain →</a>
            </div>
        </div>
    </div>
</body>
</html>