{{-- resources/views/pages/booking/step1.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Booking - Data Diri | Vantix Stay</title>
    <style>
        /* Sertakan semua CSS dari kode Anda di sini */
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
            height: 904px;
            margin: 100px auto;
        }

        .frame-87 {
            position: absolute;
            width: 771px;
            height: 187px;
            left: 170px;
            top: 0px;
        }

        .step-1 {
            position: absolute;
            width: 139px;
            height: 196px;
            left: 0px;
            top: -9px;
        }

        .step-1 .step-icon {
            position: absolute;
            width: 120px;
            height: 120px;
            left: 1px;
            top: -9px;
        }

        .step-1 .step-label {
            position: absolute;
            width: 139px;
            height: 48px;
            left: 0px;
            top: 139px;
            font-family: 'Poppins';
            font-weight: 500;
            font-size: 32px;
            color: #F0BC0F;
        }

        .step-2 {
            position: absolute;
            width: 211px;
            height: 187px;
            left: 287px;
            top: 0px;
        }

        .step-2 .step-icon {
            position: absolute;
            width: 120px;
            height: 120px;
            left: 333px;
            top: 0px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23BDBDBD"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>');
            background-size: contain;
        }

        .step-2 .step-label {
            position: absolute;
            width: 211px;
            height: 48px;
            left: 287px;
            top: 139px;
            font-family: 'Poppins';
            font-weight: 500;
            font-size: 32px;
            color: #000000;
        }

        .step-3 {
            position: absolute;
            width: 120px;
            height: 187px;
            left: 651px;
            top: 0px;
        }

        .step-3 .step-icon {
            position: absolute;
            width: 120px;
            height: 120px;
            left: 651px;
            top: 0px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23BDBDBD"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>');
            background-size: contain;
        }

        .step-3 .step-label {
            position: absolute;
            width: 115px;
            height: 48px;
            left: 654px;
            top: 139px;
            font-family: 'Poppins';
            font-weight: 500;
            font-size: 32px;
            color: #000000;
        }

        .line-11 {
            position: absolute;
            width: 153px;
            height: 0px;
            left: 157px;
            top: 60px;
            border: 18px solid #F0BC0F;
            border-radius: 9px;
        }

        .line-12 {
            position: absolute;
            width: 153px;
            height: 0px;
            left: 480px;
            top: 60px;
            border: 18px solid rgba(115, 115, 115, 0.5);
            border-radius: 9px;
        }

        .frame-86 {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 42px;
            gap: 10px;
            position: absolute;
            width: 1110px;
            height: auto;
            left: 0px;
            top: 223px;
            background: #FFFFFF;
            box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.25);
            border-radius: 8px;
        }

        .group-71 {
            width: 1026px;
            flex: none;
            order: 0;
            flex-grow: 0;
        }

        .group-70 {
            position: relative;
            width: 1026px;
        }

        .data-diri-header {
            position: relative;
            width: 409px;
            height: 114px;
            margin-bottom: 30px;
        }

        .data-diri-header h1 {
            font-family: 'Poppins';
            font-weight: 500;
            font-size: 40px;
            line-height: 60px;
            color: #000000;
        }

        .data-diri-header p {
            font-family: 'Poppins';
            font-weight: 400;
            font-size: 32px;
            line-height: 48px;
            color: rgba(0, 0, 0, 0.5);
        }

        .form-fields {
            position: relative;
            width: 100%;
        }

        .nama-row, .telepon-row {
            position: relative;
            width: 100%;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .nama-label, .telepon-label {
            display: flex;
            align-items: center;
            gap: 15px;
            min-width: 250px;
        }

        .nama-label .icon, .telepon-label .icon {
            width: 54px;
            height: 54px;
        }

        .nama-label span, .telepon-label span {
            font-family: 'Poppins';
            font-weight: 500;
            font-size: 32px;
            line-height: 48px;
            color: #000000;
        }

        .nama-input, .telepon-input {
            flex: 1;
            min-width: 300px;
            display: flex;
            align-items: center;
            padding: 0px 0px 0px 24px;
            height: 70px;
            border: 1px solid rgba(0, 0, 0, 0.8);
            border-radius: 8px;
        }

        .nama-input input, .telepon-input input {
            width: 100%;
            height: 36px;
            font-family: 'Poppins';
            font-weight: 400;
            font-size: 24px;
            border: none;
            outline: none;
            background: transparent;
        }

        .btn-konfirmasi {
            width: 534px;
            margin: 30px auto 0;
        }

        .btn-konfirmasi button {
            width: 100%;
            height: 62px;
            background: #F0BC0F;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 8px;
            border: none;
            font-family: 'Poppins';
            font-weight: 600;
            font-size: 20px;
            color: rgba(255, 255, 255, 0.8);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 15px 20px;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            z-index: 1000;
            animation: slideIn 0.3s ease;
        }

        .alert-success {
            background: #4CAF50;
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
            .frame-88 { width: 95%; margin: 50px auto; height: auto; }
            .frame-86 { width: 100%; position: relative; top: 0; margin-top: 200px; }
            .nama-row, .telepon-row { flex-direction: column; align-items: flex-start; }
            .nama-input, .telepon-input { width: 100%; }
            .btn-konfirmasi { width: 100%; }
        }
    </style>
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success" id="alertMessage">
        {{ session('success') }}
        <span class="close-alert" onclick="this.parentElement.style.display='none'">&times;</span>
    </div>
    @endif

    <div class="frame-88">
        <div class="frame-87">
            <div class="step-1">
                <div class="step-icon">
                    <svg width="120" height="120" viewBox="0 0 120 120">
                        <circle cx="60" cy="60" r="54" fill="#F0BC0F" stroke="#F0BC0F" stroke-width="2"/>
                        <path d="M45 60L55 70L75 50" stroke="white" stroke-width="6" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="step-label">Data Diri</div>
            </div>
            <div class="line-11"></div>
            <div class="step-2">
                <div class="step-icon"></div>
                <div class="step-label">Pembayaran</div>
            </div>
            <div class="line-12"></div>
            <div class="step-3">
                <div class="step-icon"></div>
                <div class="step-label">Selesai</div>
            </div>
        </div>

        <div class="frame-86">
            <div class="group-71">
                <form action="{{ route('booking.step1.post') }}" method="POST">
                    @csrf
                    <div class="group-70">
                        <div class="data-diri-header">
                            <h1>Data Diri</h1>
                            <p>Isi informasi pribadi anda</p>
                        </div>

                        <div class="form-fields">
                            <div class="nama-row">
                                <div class="nama-label">
                                    <div class="icon">
                                        <svg width="54" height="54" viewBox="0 0 54 54">
                                            <circle cx="27" cy="27" r="25" fill="#F0BC0F"/>
                                            <path d="M27 15C24.5 15 22.5 17 22.5 19.5C22.5 22 24.5 24 27 24C29.5 24 31.5 22 31.5 19.5C31.5 17 29.5 15 27 15Z" fill="white"/>
                                            <path d="M27 27C22 27 18 31 18 36H36C36 31 32 27 27 27Z" fill="white"/>
                                        </svg>
                                    </div>
                                    <span>Nama Lengkap</span>
                                </div>
                                <div class="nama-input">
                                    <input type="text" placeholder="Masukan nama lengkap" name="nama_lengkap" value="{{ session('booking.nama_lengkap') }}" required>
                                </div>
                            </div>

                            <div class="telepon-row">
                                <div class="telepon-label">
                                    <div class="icon">
                                        <svg width="54" height="54" viewBox="0 0 54 54">
                                            <rect x="12" y="8" width="30" height="38" rx="4" fill="#F0BC0F"/>
                                            <path d="M24 40H30" stroke="white" stroke-width="3"/>
                                            <circle cx="27" cy="42" r="2" fill="white"/>
                                        </svg>
                                    </div>
                                    <span>No Telepon</span>
                                </div>
                                <div class="telepon-input">
                                    <input type="tel" placeholder="Masukan no telepon" name="no_telepon" value="{{ session('booking.no_telepon') }}" required>
                                </div>
                            </div>

                            <div class="btn-konfirmasi">
                                <button type="submit">LANJUT KE PEMBAYARAN →</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function() {
            var alert = document.getElementById('alertMessage');
            if (alert) alert.style.display = 'none';
        }, 3000);
    </script>
</body>
</html>