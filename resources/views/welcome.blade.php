<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Vantix Stay - Apartemen Modern & Nyaman</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=HeadlandOne&family=Inter&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* ===== RESET & VARIABLES ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-dark: #081123;
            --primary-blue: #222A3A;
            --accent-green: #4EB149;
            --accent-green-hover: #3d8f3a;
            --text-white: #FFFFFF;
            --text-white-50: rgba(255, 255, 255, 0.5);
            --text-white-80: rgba(255, 255, 255, 0.8);
            --text-dark: #081123;
            --text-gray: rgba(0, 0, 0, 0.6);
            --border-light: #C3B8B8;
            --bg-light: #F7F7F7;
            --shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            --shadow-lg: 0px 8px 8px rgba(0, 0, 0, 0.25);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            background: #FFFFFF;
        }

        /* ===== CONTAINER ===== */
        .landing-page {
            position: relative;
            width: 1440px;
            max-width: 100%;
            margin: 0 auto;
            background: #FFFFFF;
        }

        /* ===== TYPOGRAPHY ===== */
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }

        .headland {
            font-family: 'HeadlandOne', serif;
        }

        /* ===== HEADER / NAVBAR ===== */
        .header {
            position: fixed;
            width: 1440px;
            max-width: 100%;
            height: 80px;
            left: 50%;
            transform: translateX(-50%);
            top: 0;
            z-index: 1000;
            transition: var(--transition);
        }

        .navbar {
            position: absolute;
            width: 100%;
            height: 80px;
            background: linear-gradient(90deg, #081123 8.17%, rgba(106, 113, 121, 0.8) 99.52%);
            box-shadow: var(--shadow), var(--shadow-lg);
        }

        /* Logo */
        .logo {
            position: absolute;
            width: 90px;
            height: 45px;
            left: 40px;
            top: 17px;
            background: #3a4a6b;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 12px;
            text-decoration: none;
            transition: var(--transition);
            overflow: hidden;
        }

        .logo:hover {
            background: #4a5a7b;
            transform: scale(1.02);
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        /* Navigation Menu */
        .nav-menu {
            position: absolute;
            display: flex;
            gap: 40px;
            left: 500px;
            top: 25px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-menu li {
            position: relative;
        }

        .nav-menu li a {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 18px;
            line-height: 28px;
            text-decoration: none;
            color: rgba(255, 250, 250, 0.5);
            transition: var(--transition);
            position: relative;
            padding: 3px 0;
        }

        .nav-menu li:nth-child(1) a {
            color: #FFFBFB;
        }

        .nav-menu li a:hover {
            color: #FFFBFB !important;
        }

        .nav-menu li a::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 2px;
            background: var(--accent-green);
            transition: var(--transition);
        }

        .nav-menu li a:hover::after {
            width: 80%;
        }

        .nav-menu li.active a {
            color: #FFFBFB !important;
            font-weight: 600;
        }

        .nav-menu li.active a::after {
            width: 80%;
            background: var(--accent-green);
        }

        /* Booking Now Button */
        .booking-now {
            position: absolute;
            left: 1100px;
            top: 10px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 16px;
            letter-spacing: 0.5px;
            color: #FFFFFF;
            text-decoration: none;
            padding: 10px 22px;
            background: linear-gradient(90deg, #081123 8.17%, rgba(26, 35, 50, 0.95) 99.52%);
            border-radius: 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transition: var(--transition);
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(255, 255, 255, 0.15);
            z-index: 5;
            overflow: hidden;
        }

        .booking-now::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            transition: left 0.6s ease;
            border-radius: 40px;
            pointer-events: none;
        }

        .booking-now:hover::before {
            left: 100%;
        }

        .booking-now::after {
            content: '→';
            font-size: 20px;
            font-weight: 400;
            transition: transform 0.3s ease;
            opacity: 0.9;
        }

        .booking-now:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
            background: linear-gradient(90deg, #0f1a30 8.17%, rgba(36, 45, 60, 0.95) 99.52%);
            border-color: rgba(255, 255, 255, 0.25);
        }

        .booking-now:hover::after {
            transform: translateX(8px);
        }

        .booking-now:active {
            transform: translateY(-1px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
        }

        /* Mobile menu button */
        .mobile-menu-btn {
            display: none;
            position: absolute;
            right: 40px;
            top: 25px;
            width: 35px;
            height: 30px;
            background: transparent;
            border: none;
            cursor: pointer;
            flex-direction: column;
            justify-content: space-between;
            padding: 6px 0;
            z-index: 20;
        }

        .mobile-menu-btn span {
            width: 100%;
            height: 2px;
            background: white;
            border-radius: 2px;
            transition: var(--transition);
        }

        /* Navbar Scroll Effects */
        .header.scrolled {
            height: 70px;
            background: rgba(8, 17, 35, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .header.scrolled .navbar {
            background: transparent;
            box-shadow: none;
        }

        .header.scrolled .logo {
            top: 12px;
            width: 85px;
            height: 42px;
        }

        .header.scrolled .nav-menu {
            top: 22px;
        }

        .header.scrolled .nav-menu li a {
            font-size: 17px;
        }

        .header.scrolled .booking-now {
            top: 15px;
            padding: 8px 20px;
            font-size: 15px;
        }

        .header.hide {
            transform: translate(-50%, -100%);
        }

        .header.show {
            transform: translate(-50%, 0);
            animation: slideDown 0.5s ease-out;
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            position: relative;
            width: 100%;
            height: 700px;
            margin-top: 80px;
            filter: drop-shadow(var(--shadow-lg));
        }

        .hero-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=1635&q=80');
            background-size: cover;
            background-position: center;
            top: 0;
            left: 0;
        }

        .hero-content {
            position: relative;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            top: 150px;
            text-align: center;
            z-index: 1;
            padding: 0 20px;
        }

        .hero-title {
            font-family: 'HeadlandOne', serif;
            font-size: 48px;
            line-height: 1.3;
            color: var(--text-white);
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            line-height: 1.6;
            color: var(--text-white-80);
            margin-bottom: 30px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-box {
            width: 500px;
            max-width: 100%;
            height: 60px;
            margin: 0 auto;
            position: relative;
            filter: drop-shadow(var(--shadow));
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 10px;
            width: 40px;
            height: 40px;
            background: #ccc;
            border-radius: 8px 0 0 8px;
            z-index: 1;
        }

        .search-input {
            width: 100%;
            height: 100%;
            background: var(--text-white);
            border-radius: 8px;
            border: none;
            padding: 0 60px;
            font-family: 'Inter', sans-serif;
            font-size: 18px;
            color: rgba(0, 0, 0, 0.5);
            transition: var(--transition);
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px var(--accent-green);
        }

        /* ===== EXPLORE APARTMENT TYPES ===== */
        .explore-section {
            position: relative;
            width: 100%;
            padding: 80px 0;
            background: var(--primary-blue);
        }

        .explore-title {
            font-family: 'HeadlandOne', serif;
            font-size: 36px;
            text-align: center;
            color: var(--text-white);
            margin-bottom: 50px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .apartment-types {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .type-card {
            width: 220px;
            height: 200px;
            border: 1px solid var(--text-white-80);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
        }

        .type-card:hover {
            transform: translateY(-10px);
            border-color: var(--accent-green);
            box-shadow: 0 10px 20px rgba(78, 177, 73, 0.3);
        }

        .type-icon {
            width: 60px;
            height: 60px;
            background: var(--text-white);
            border-radius: 50%;
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .type-card:hover .type-icon {
            transform: rotate(360deg);
        }

        .type-name {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 24px;
            color: var(--text-white);
            margin-bottom: 5px;
        }

        .type-properties {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 16px;
            color: var(--text-white-80);
        }

        /* ===== ABOUT SECTION - RAPI ===== */
        .about-section {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 20px;
        }

        .about-content {
            position: relative;
            min-height: 700px;
        }

        .about-text {
            width: 100%;
            max-width: 500px;
            margin-bottom: 40px;
        }

        .about-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 36px;
            line-height: 1.3;
            color: var(--text-dark);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .about-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 3px;
            background: var(--accent-green);
            border-radius: 2px;
        }

        .about-description {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            line-height: 1.8;
            color: var(--text-gray);
        }

        .about-image1 {
            position: absolute;
            width: 380px;
            height: 280px;
            right: 20px;
            top: 50px;
            background: url('https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');
            background-size: cover;
            background-position: center;
            box-shadow: var(--shadow-lg);
            border-radius: 8px;
            transition: var(--transition);
        }

        .about-image1:hover {
            transform: scale(1.02);
        }

        .about-image2 {
            position: absolute;
            width: 400px;
            height: 320px;
            left: 20px;
            bottom: 50px;
            background: url('https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?ixlib=rb-4.0.3&auto=format&fit=crop&w=1680&q=80');
            background-size: cover;
            background-position: center;
            box-shadow: var(--shadow-lg);
            border-radius: 8px;
            transition: var(--transition);
        }

        .about-image2:hover {
            transform: scale(1.02);
        }

        .about-text2 {
            position: absolute;
            width: 450px;
            right: 40px;
            bottom: 80px;
        }

        /* ===== OUR PACKAGES - RAPI ===== */
        .packages-section {
            position: relative;
            width: 100%;
            max-width: 1200px;
            margin: 80px auto;
            padding: 0 20px;
        }

        .packages-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .packages-title {
            font-family: 'HeadlandOne', serif;
            font-size: 36px;
            color: #000000;
            margin-bottom: 15px;
        }

        .packages-divider {
            width: 80px;
            height: 2px;
            background: var(--accent-green);
            margin: 0 auto;
        }

        .packages-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .package-card {
            width: 320px;
            background: var(--primary-blue);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
        }

        .package-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        .card-image {
            width: 100%;
            height: 200px;
            background: url('https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1740&q=80');
            background-size: cover;
            background-position: center;
            transition: var(--transition);
        }

        .package-card:hover .card-image {
            transform: scale(1.05);
        }

        .card-content {
            padding: 25px;
        }

        .card-type {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: var(--text-white-80);
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .card-name {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--text-white);
            margin: 10px 0;
        }

        .card-price {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: rgba(0, 108, 249, 0.5);
            margin-bottom: 20px;
        }

        .view-detail-btn {
            display: inline-block;
            padding: 8px 20px;
            background: var(--accent-green);
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 14px;
            color: var(--text-white);
            text-decoration: none;
            transition: var(--transition);
        }

        .view-detail-btn:hover {
            background: var(--accent-green-hover);
            transform: scale(1.05);
        }

        .packages-dots {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 40px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            cursor: pointer;
            transition: var(--transition);
        }

        .dot:hover {
            transform: scale(1.2);
        }

        .dot-active {
            background: var(--accent-green);
        }

        .dot-inactive {
            background: #D9D9D9;
        }

        /* ===== AVAILABILITY SECTION ===== */
        .availability-section {
            position: relative;
            width: 100%;
            max-width: 1000px;
            margin: 80px auto;
            padding: 0 20px;
        }

        .availability-box {
            width: 100%;
            padding: 60px 40px;
            border: 1px solid #000000;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .availability-box:hover {
            box-shadow: var(--shadow-lg);
            border-color: var(--accent-green);
        }

        .availability-title {
            font-family: 'HeadlandOne', serif;
            font-size: 36px;
            color: #000000;
            margin-bottom: 20px;
        }

        .cities {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            color: #000000;
            margin-bottom: 40px;
            text-align: center;
        }

        .contact-btn {
            display: inline-block;
            width: 280px;
            height: 60px;
            background: var(--accent-green);
            border: 1px solid #4EB149;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            line-height: 60px;
            color: var(--text-white);
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
        }

        .contact-btn:hover {
            background: var(--accent-green-hover);
            transform: scale(1.02);
        }

        /* ===== TESTIMONI SECTION ===== */
        .testimoni-section {
            position: relative;
            width: 100%;
            padding: 80px 0;
            background: rgba(217, 217, 217, 0.2);
            margin-top: 50px;
        }

        .testimoni-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 50px;
            padding: 0 20px;
        }

        .testimoni-title {
            font-family: 'HeadlandOne', serif;
            font-size: 36px;
            color: #000000;
            margin-bottom: 15px;
        }

        .testimoni-subtitle {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            color: rgba(0, 0, 0, 0.8);
        }

        .testimoni-container {
            display: flex;
            gap: 30px;
            justify-content: center;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .testimoni-card {
            width: 320px;
            background: var(--text-white);
            box-shadow: var(--shadow), var(--shadow-lg);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px 20px;
            transition: var(--transition);
        }

        .testimoni-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .testimoni-avatar {
            width: 70px;
            height: 70px;
            background: url('https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&auto=format&fit=crop&w=1760&q=80');
            background-size: cover;
            background-position: center;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid var(--accent-green);
            transition: var(--transition);
        }

        .testimoni-card:hover .testimoni-avatar {
            transform: scale(1.1);
        }

        .testimoni-name {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 20px;
            color: #000000;
            text-align: center;
            margin-bottom: 5px;
        }

        .testimoni-city {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: rgba(0, 0, 0, 0.6);
            text-align: center;
            margin-bottom: 15px;
        }

        .testimoni-rating {
            display: flex;
            gap: 5px;
            margin-bottom: 20px;
        }

        .star {
            width: 24px;
            height: 24px;
            background: #F0BC0F;
            clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
            transition: var(--transition);
        }

        .star:hover {
            transform: rotate(180deg) scale(1.1);
        }

        .testimoni-text {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            text-align: center;
            color: rgba(0, 0, 0, 0.6);
        }

        /* ===== FAQ SECTION ===== */
        .faq-section {
            position: relative;
            width: 100%;
            padding: 80px 0;
            background: var(--bg-light);
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .faq-title {
            font-family: 'HeadlandOne', serif;
            font-size: 36px;
            text-align: center;
            color: #000000;
            margin-bottom: 50px;
        }

        .faq-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .faq-item {
            width: 100%;
            background: var(--text-white);
            border: 1px solid #BCBDBE;
            box-shadow: var(--shadow);
            border-radius: 8px;
            display: flex;
            align-items: center;
            padding: 20px 25px;
            position: relative;
            cursor: pointer;
            transition: var(--transition);
        }

        .faq-item:hover {
            transform: translateX(10px);
            box-shadow: var(--shadow-lg);
            border-color: var(--accent-green);
        }

        .faq-question {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            color: #000000;
            flex: 1;
        }

        .faq-icon {
            width: 40px;
            height: 40px;
            position: relative;
        }

        .faq-icon::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 16px;
            height: 16px;
            border-left: 2px solid #000000;
            border-bottom: 2px solid #000000;
            transform: translate(-50%, -50%) rotate(-45deg);
            transition: var(--transition);
        }

        .faq-icon.active::after {
            transform: translate(-50%, -50%) rotate(135deg);
        }

        .faq-answer {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            padding: 20px 25px;
            background: #f9f9f9;
            border-radius: 0 0 8px 8px;
            font-size: 16px;
            color: var(--text-gray);
            box-shadow: var(--shadow);
        }

        /* ===== CONTACT SECTION ===== */
        .contact-section {
            position: relative;
            width: 100%;
            padding: 80px 0;
            background: var(--bg-light);
        }

        .contact-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .contact-info {
            display: flex;
            gap: 50px;
            margin-bottom: 50px;
            flex-wrap: wrap;
        }

        .info-left {
            flex: 1;
            min-width: 300px;
        }

        .info-title {
            font-family: 'HeadlandOne', serif;
            font-size: 36px;
            color: #000000;
            margin-bottom: 20px;
        }

        .info-description {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            line-height: 1.8;
            color: var(--text-gray);
            margin-bottom: 30px;
        }

        .contact-details {
            margin-top: 30px;
        }

        .contact-detail-item {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 15px;
            transition: var(--transition);
        }

        .contact-detail-item:hover {
            transform: translateX(10px);
            color: var(--accent-green);
        }

        .detail-icon {
            width: 36px;
            height: 36px;
            background: var(--primary-blue);
            border-radius: 50%;
            transition: var(--transition);
        }

        .contact-detail-item:hover .detail-icon {
            background: var(--accent-green);
            transform: rotate(360deg);
        }

        .detail-text {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: var(--text-gray);
        }

        .info-right {
            width: 400px;
            height: 350px;
            background: #e0e0e0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 18px;
            transition: var(--transition);
        }

        .info-right:hover {
            transform: scale(1.02);
            box-shadow: var(--shadow-lg);
        }

        .form-section {
            width: 100%;
            margin-top: 50px;
        }

        .form-title {
            font-family: 'HeadlandOne', serif;
            font-size: 30px;
            color: #000000;
            margin-bottom: 40px;
        }

        .form-row {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 1;
            min-width: 250px;
        }

        .form-input {
            width: 100%;
            height: 60px;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            padding: 0 20px;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: #737373;
            transition: var(--transition);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent-green);
            box-shadow: 0 0 0 3px rgba(78, 177, 73, 0.2);
        }

        .form-textarea {
            width: 100%;
            height: 200px;
            border: 1px solid var(--border-light);
            border-radius: 8px;
            padding: 20px;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            color: #737373;
            resize: none;
            transition: var(--transition);
        }

        .form-textarea:focus {
            outline: none;
            border-color: var(--accent-green);
            box-shadow: 0 0 0 3px rgba(78, 177, 73, 0.2);
        }

        .send-btn {
            width: 280px;
            height: 60px;
            background: var(--accent-green);
            border-radius: 8px;
            border: none;
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--text-white);
            margin: 40px auto 0;
            display: block;
            cursor: pointer;
            text-align: center;
            transition: var(--transition);
        }

        .send-btn:hover {
            background: var(--accent-green-hover);
            transform: scale(1.05);
            box-shadow: var(--shadow-lg);
        }

        /* ===== SUPPORTED BY SECTION ===== */
        .supported-section {
            position: relative;
            width: 100%;
            max-width: 1000px;
            margin: 80px auto;
            padding: 0 20px;
        }

        .supported-box {
            width: 100%;
            padding: 50px 40px;
            background: rgba(217, 217, 217, 0.2);
            box-shadow: var(--shadow);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .supported-box:hover {
            box-shadow: var(--shadow-lg);
        }

        .supported-title {
            font-family: 'HeadlandOne', serif;
            font-size: 28px;
            color: #737373;
            margin-bottom: 40px;
        }

        .supported-logos {
            display: flex;
            gap: 60px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            background: #D9D9D9;
            border-radius: 50%;
            transition: var(--transition);
        }

        .logo-circle:hover {
            transform: scale(1.2) rotate(360deg);
            background: var(--accent-green);
        }

        /* ===== FOOTER - RAPI ===== */
        .footer {
            position: relative;
            width: 100%;
            margin-top: 50px;
        }

        .footer-main {
            width: 100%;
            background: #0C162A;
            padding: 60px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            gap: 60px;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 40px;
            flex-wrap: wrap;
        }

        .footer-logo-section {
            flex: 1;
            min-width: 280px;
        }

        .footer-logo {
            display: inline-block;
            width: 140px;
            height: 50px;
            background: #3a4a6b;
            border-radius: 6px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-logo:hover {
            background: #4a5a7b;
            transform: scale(1.05);
        }

        .footer-tagline {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            line-height: 1.6;
            color: var(--text-white-80);
            margin-bottom: 25px;
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icon {
            display: block;
            width: 36px;
            height: 36px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: var(--transition);
        }

        .social-icon:hover {
            transform: translateY(-3px);
            background: var(--accent-green);
        }

        .footer-links {
            display: flex;
            gap: 60px;
            flex-wrap: wrap;
        }

        .link-column {
            display: flex;
            flex-direction: column;
            min-width: 120px;
        }

        .link-header {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 18px;
            color: var(--text-white);
            margin-bottom: 20px;
            position: relative;
        }

        .link-header::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 30px;
            height: 2px;
            background: var(--accent-green);
        }

        .link-item {
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            color: var(--text-white-80);
            text-decoration: none;
            margin-bottom: 12px;
            transition: var(--transition);
            display: inline-block;
        }

        .link-item:hover {
            color: var(--accent-green);
            transform: translateX(5px);
        }

        .copyright {
            background: #0C162A;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .copyright-icon {
            width: 20px;
            height: 20px;
            border: 1px solid var(--text-white-80);
            border-radius: 50%;
            position: relative;
        }

        .copyright-icon::after {
            content: '©';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--text-white-80);
            font-size: 12px;
        }

        .copyright-text {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: var(--text-white-80);
            text-align: center;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideDown {
            from { transform: translate(-50%, -100%); }
            to { transform: translate(-50%, 0); }
        }

        .hero-content, .explore-section, .about-section, .packages-section,
        .availability-section, .testimoni-section, .faq-section,
        .contact-section, .supported-section, .footer {
            animation: fadeIn 1s ease-out;
        }

        /* ===== UTILITY CLASSES ===== */
        .alert-success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            animation: fadeIn 0.5s ease-out;
        }


    /* ===== FLOATING BOOKING BUTTON FOR MOBILE ===== */
    .floating-booking-btn {
        display: none;
        position: fixed;
        bottom: 100px;
        right: 20px;
        z-index: 999;
        background: linear-gradient(135deg, #081123 0%, #1a2635 100%);
        padding: 12px 25px;
        border-radius: 40px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
        text-decoration: none;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.15);
        overflow: hidden;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 16px;
        letter-spacing: 0.5px;
        color: #FFFFFF;
        gap: 8px;
        /* Animasi akan ditambahkan di sini nanti */
    }

    /* Konten button */
    .floating-booking-btn span:not(.tooltip) {
        display: inline-block;
    }

    /* Teks BOOKING NOW */
    .floating-booking-btn .btn-text {
        display: inline-block;
    }

    /* Icon panah */
    .floating-booking-btn .btn-arrow {
        display: inline-block;
        font-size: 20px;
        transition: transform 0.3s ease;
    }

    .floating-booking-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
        background: linear-gradient(135deg, #0f1a30 0%, #242d3c 100%);
        border-color: rgba(255, 255, 255, 0.25);
    }

    .floating-booking-btn:hover .btn-arrow {
        transform: translateX(5px);
    }

    /* Efek background shimmer */
    .floating-booking-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        transition: left 0.6s ease;
        pointer-events: none;
    }

    .floating-booking-btn:hover::before {
        left: 100%;
    }

    /* Hapus semua style sebelumnya yang tidak diperlukan */
    .floating-booking-btn::after {
        display: none;
    }

    .floating-booking-btn .tooltip {
        display: none; /* Tooltip tidak diperlukan lagi karena sudah ada teks */
    }

    /* ===== ANIMASI FLOATING BUTTON ===== */
    /* Letakkan animasi DI SINI - setelah semua style floating button */

    /* Animasi Kombinasi untuk Floating Button */
    @keyframes float-combo {
        0% {
            transform: translateY(0) scale(1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        25% {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 8px 25px rgba(91, 103, 90, 0.5);
        }
        50% {
            transform: translateY(0) scale(1.05);
            box-shadow: 0 12px 30px rgba(162, 190, 161, 0.6);
        }
        75% {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 8px 25px rgba(17, 39, 16, 0.5);
        }
        100% {
            transform: translateY(0) scale(1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
    }

    /* Terapkan animasi ke floating button */
    .floating-booking-btn {
        animation: float-combo 3s ease-in-out infinite;
    }

    /* Hentikan animasi saat hover */
    .floating-booking-btn:hover {
        animation: none;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
    }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 1440px) {
            .header { width: 100%; }
            
            .nav-menu {
                left: auto;
                right: 300px;
                gap: 25px;
            }
            
            .nav-menu li a { font-size: 16px; }
            
            .booking-now {
                left: auto;
                right: 40px;
                font-size: 16px;
            }
        }

        @media (max-width: 1200px) {
            .about-image1,
            .about-image2,
            .about-text2 {
                position: relative;
                width: 100%;
                max-width: 500px;
                margin: 20px auto;
                right: auto;
                left: auto;
                bottom: auto;
                top: auto;
            }
            
            .about-content {
                min-height: auto;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            
            .about-text,
            .about-text2 {
                text-align: center;
            }
            
            .about-title::after {
                left: 50%;
                transform: translateX(-50%);
            }
        }

        @media (max-width: 1024px) {
            .nav-menu {
                right: 160px;
                gap: 20px;
            }
            
            .nav-menu li a { font-size: 15px; }
            .booking-now { font-size: 15px; right: 30px; }
            
            .footer-content {
                flex-direction: column;
                gap: 40px;
            }
            
            .footer-logo-section {
                max-width: 100%;
            }
            
            .footer-links {
                justify-content: flex-start;
            }
            
            .contact-info {
                flex-direction: column;
            }
            
            .info-right {
                width: 100%;
            }
        }

        @media (max-width: 768px) {
        .mobile-menu-btn { display: flex; }
        
        /* Hide desktop booking button */
        .booking-now {
            display: none;
        }
        
        /* Show floating booking button */
        .floating-booking-btn {
            display: flex;
        }
    
        .nav-menu {
            position: fixed;
            top: 80px;
            left: -100%;
            width: 100%;
            height: calc(100vh - 80px);
            background: linear-gradient(135deg, #081123 0%, #1a2635 100%);
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 30px;
            transition: left 0.3s ease;
            z-index: 100;
        }
        
        .nav-menu.active { left: 0; }
        .nav-menu li a { font-size: 20px; }
        
        .mobile-menu-btn.active span:nth-child(1) {
            transform: rotate(45deg) translate(4px, 4px);
        }
        .mobile-menu-btn.active span:nth-child(2) { opacity: 0; }
        .mobile-menu-btn.active span:nth-child(3) {
            transform: rotate(-45deg) translate(5px, -5px);
        }
        
        .header.scrolled {
            height: 65px;
        }
        .header.scrolled .logo {
            top: 10px;
            width: 75px;
            height: 38px;
        }
        .header.scrolled .nav-menu { top: 18px; }
        
        .hero-title {
            font-size: 36px;
        }
        
        .hero-subtitle {
            font-size: 18px;
        }
        
        .explore-title {
            font-size: 30px;
        }
        
        .packages-title,
        .about-title,
        .testimoni-title,
        .faq-title,
        .info-title {
            font-size: 30px;
        }
        
        .cities {
            font-size: 20px;
        }
        
        .form-row {
            flex-direction: column;
            gap: 20px;
        }
        
        .footer-links {
            flex-direction: column;
            gap: 30px;
        }
        
        .link-column {
            width: 100%;
        }
    }

@media (max-width: 480px) {
    .logo {
        width: 70px;
        height: 38px;
        left: 20px;
        top: 21px;
    }
    
      /* Adjust floating button for smaller screens */
    .floating-booking-btn {
        padding: 10px 20px;
        bottom: 70px;  
        right: 15px;
        font-size: 14px;
    }
    
    .floating-booking-btn::before {
        font-size: 24px;
    }
    
    .mobile-menu-btn { right: 20px; }
    
    .hero-title {
        font-size: 28px;
    }
    
    .hero-subtitle {
        font-size: 16px;
    }
    
    .type-card {
        width: 100%;
        max-width: 280px;
    }
    
    .package-card {
        width: 100%;
    }
    
    .contact-btn {
        width: 100%;
        font-size: 20px;
    }
    
    .send-btn {
        width: 100%;
    }
    
    .supported-logos {
        gap: 30px;
    }
    
    .logo-circle {
        width: 60px;
        height: 60px;
    }
}

 
    </style>
</head>
<body>
    <div class="landing-page">
        <!-- Header / Navbar -->
        <header class="header">
            <nav class="navbar">
                <a href="{{ url('/') }}" class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Vantix Stay">
                </a>

                <ul class="nav-menu">
                    <li><a href="{{ url('/') }}">HOME</a></li>
                    <li><a href="{{ url('/property') }}">PROPERTY</a></li>
                    <li><a href="{{ url('/about') }}">ABOUT</a></li>
                    <li><a href="{{ url('/contact') }}">CONTACT</a></li>
                </ul>

                <a href="http://localhost:8080/admin" class="booking-now">BOOKING NOW</a>

                <button class="mobile-menu-btn" id="mobileMenuBtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </nav>
        </header>

        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-bg"></div>
            <div class="hero-content">
                <h1 class="hero-title">Selamat Datang di Vantix Stay</h1>
                <p class="hero-subtitle">Temukan apartemen modern dan nyaman untuk pengalaman menginap yang lebih menyenangkan</p>
                <form class="search-box" action="{{ url('/property') }}" method="GET">
                    <div class="search-icon"></div>
                    <input type="text" name="search" class="search-input" placeholder="Cari apartemen..." value="{{ request('search') }}">
                </form>
            </div>
        </section>

        <!-- Explore Apartment Types -->
        <section class="explore-section">
            <h2 class="explore-title">Explore Apartment Types</h2>
            <div class="apartment-types">
                <a href="{{ url('/property?type=commercial') }}" class="type-card">
                    <div class="type-icon"></div>
                    <span class="type-name">Commercial</span>
                    <span class="type-properties">10 Properties</span>
                </a>
                <a href="{{ url('/property?type=warehouse') }}" class="type-card">
                    <div class="type-icon"></div>
                    <span class="type-name">Warehouse</span>
                    <span class="type-properties">10 Properties</span>
                </a>
                <a href="{{ url('/property?type=villa') }}" class="type-card">
                    <div class="type-icon"></div>
                    <span class="type-name">Villa</span>
                    <span class="type-properties">10 Properties</span>
                </a>
                <a href="{{ url('/property?type=homestay') }}" class="type-card">
                    <div class="type-icon"></div>
                    <span class="type-name">Homestay</span>
                    <span class="type-properties">10 Properties</span>
                </a>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-section">
            <div class="about-content">
                <div class="about-text">
                    <h3 class="about-title">Vantix Stay</h3>
                    <p class="about-description">Morem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.</p>
                </div>
                <div class="about-image1"></div>
                <div class="about-image2"></div>
                <div class="about-text2">
                    <h3 class="about-title">Vantix Stay</h3>
                    <p class="about-description">Morem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.</p>
                </div>
            </div>
        </section>

        <!-- Our Packages -->
        <section class="packages-section">
            <div class="packages-header">
                <h2 class="packages-title">Our Packages</h2>
                <div class="packages-divider"></div>
            </div>
            
            <div class="packages-container">
                <div class="package-card">
                    <div class="card-image"></div>
                    <div class="card-content">
                        <span class="card-type">Tipe 1</span>
                        <h3 class="card-name">Grand Asia Afrika Apartement</h3>
                        <p class="card-price">Price IDR 100,000 - 500,000</p>
                        <a href="{{ url('/property/1') }}" class="view-detail-btn">View Detail</a>
                    </div>
                </div>
                
                <div class="package-card">
                    <div class="card-image"></div>
                    <div class="card-content">
                        <span class="card-type">Tipe 2</span>
                        <h3 class="card-name">Sudirman Suites</h3>
                        <p class="card-price">Price IDR 300,000 - 800,000</p>
                        <a href="{{ url('/property/2') }}" class="view-detail-btn">View Detail</a>
                    </div>
                </div>
                
                <div class="package-card">
                    <div class="card-image"></div>
                    <div class="card-content">
                        <span class="card-type">Tipe 3</span>
                        <h3 class="card-name">Malioboro Residence</h3>
                        <p class="card-price">Price IDR 150,000 - 350,000</p>
                        <a href="{{ url('/property/3') }}" class="view-detail-btn">View Detail</a>
                    </div>
                </div>
            </div>
            
            <div class="packages-dots">
                <span class="dot dot-inactive"></span>
                <span class="dot dot-active"></span>
                <span class="dot dot-inactive"></span>
            </div>
        </section>

        <!-- Availability Section -->
        <section class="availability-section">
            <div class="availability-box">
                <h2 class="availability-title">Available At</h2>
                <p class="cities">Jakarta | Bandung | Yogyakarta | Malang | Bogor</p>
                <a href="{{ url('/contact') }}" class="contact-btn">Contact Us</a>
            </div>
        </section>

        <!-- Testimoni Section -->
        <section class="testimoni-section">
            <div class="testimoni-header">
                <h2 class="testimoni-title">Our Testimoni</h2>
                <p class="testimoni-subtitle">Jorem ipsum dolor sit amet consectetur Jorem ipsum dolor sit amet consecteturJorem ipsum</p>
            </div>
            
            <div class="testimoni-container">
                <div class="testimoni-card">
                    <div class="testimoni-avatar"></div>
                    <h4 class="testimoni-name">Alexander Thomas</h4>
                    <p class="testimoni-city">Bandung</p>
                    <div class="testimoni-rating">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                    </div>
                    <p class="testimoni-text">Rorem ipsum dolor sit amet consectetur Rorem ipsum dolor sit amet consectetur</p>
                </div>
                
                <div class="testimoni-card">
                    <div class="testimoni-avatar"></div>
                    <h4 class="testimoni-name">Sarah Wijaya</h4>
                    <p class="testimoni-city">Jakarta</p>
                    <div class="testimoni-rating">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                    </div>
                    <p class="testimoni-text">Pelayanan sangat baik, apartemen bersih dan nyaman</p>
                </div>
                
                <div class="testimoni-card">
                    <div class="testimoni-avatar"></div>
                    <h4 class="testimoni-name">Budi Santoso</h4>
                    <p class="testimoni-city">Surabaya</p>
                    <div class="testimoni-rating">
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                        <span class="star"></span>
                    </div>
                    <p class="testimoni-text">Pengalaman menginap yang tak terlupakan, recommended!</p>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="faq-section">
            <div class="faq-container">
                <h2 class="faq-title">Popular Question</h2>
                <div class="faq-list">
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <span class="faq-question">Can I cancel or modify my reservation ?</span>
                        <span class="faq-icon"></span>
                    </div>
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <span class="faq-question">What facilities are included in the apartment ?</span>
                        <span class="faq-icon"></span>
                    </div>
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <span class="faq-question">Is there a minimum stay requirement?</span>
                        <span class="faq-icon"></span>
                    </div>
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <span class="faq-question">How do I book an apartment?</span>
                        <span class="faq-icon"></span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section">
            <div class="contact-wrapper">
                @if(session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="contact-info">
                    <div class="info-left">
                        <h2 class="info-title">Get in Touch</h2>
                        <p class="info-description">Yorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis molestie, dictum est a, mattis tellus. Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus. Etiam eu turpis molestie, dictum est a, mattis tellus. Etiam eu turpis molestie, dictum est a, mattis tellus.</p>
                        
                        <div class="contact-details">
                            <div class="contact-detail-item">
                                <div class="detail-icon"></div>
                                <span class="detail-text">(123) 546 8972</span>
                            </div>
                            <div class="contact-detail-item">
                                <div class="detail-icon"></div>
                                <span class="detail-text">vantix@gmail.com</span>
                            </div>
                            <div class="contact-detail-item">
                                <div class="detail-icon"></div>
                                <span class="detail-text">Kota Bandung, Jawa Barat</span>
                            </div>
                            <div class="contact-detail-item">
                                <div class="detail-icon"></div>
                                <span class="detail-text">www.vantix.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="info-right">
                        Map Location
                    </div>
                </div>
                
                <div class="form-section">
                    <h3 class="form-title">Send us a message</h3>
                    <form action="{{ url('/contact/send') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" name="name" class="form-input" placeholder="Your name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-input" placeholder="Email Address" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="tel" name="phone" class="form-input" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-input" placeholder="Subject" required>
                            </div>
                        </div>
                        <textarea name="message" class="form-textarea" placeholder="Message" required></textarea>
                        <button type="submit" class="send-btn">Send message</button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Supported By -->
        <section class="supported-section">
            <div class="supported-box">
                <h3 class="supported-title">Supported By</h3>
                <div class="supported-logos">
                    <div class="logo-circle"></div>
                    <div class="logo-circle"></div>
                    <div class="logo-circle"></div>
                    <div class="logo-circle"></div>
                    <div class="logo-circle"></div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-main">
                <div class="footer-content">
                    <div class="footer-logo-section">
                        <a href="{{ url('/') }}" class="footer-logo">Vantix Stay</a>
                        <p class="footer-tagline">Apartment modern dan nyaman untuk pengalaman menginap terbaik</p>
                        <div class="social-icons">
                            <a href="#" class="social-icon"></a>
                            <a href="#" class="social-icon"></a>
                            <a href="#" class="social-icon"></a>
                            <a href="#" class="social-icon"></a>
                        </div>
                    </div>
                    <div class="footer-links">
                        <div class="link-column">
                            <h4 class="link-header">Company</h4>
                            <a href="{{ url('/') }}" class="link-item">Home</a>
                            <a href="{{ url('/property') }}" class="link-item">Property</a>
                            <a href="{{ url('/about') }}" class="link-item">About</a>
                            <a href="{{ url('/contact') }}" class="link-item">Contact</a>
                        </div>
                        <div class="link-column">
                            <h4 class="link-header">Support</h4>
                            <a href="#" class="link-item">Help center</a>
                            <a href="#" class="link-item">Tweet</a>
                            <a href="#" class="link-item">Feedback</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="copyright-icon"></div>
                <span class="copyright-text">Copyright {{ date('Y') }} by Vantix Stay. All Rights Reserved.</span>
            </div>
        </footer>
    </div>

    <!-- JavaScript -->
    <script>
        // FAQ Toggle
        function toggleFaq(element) {
            const icon = element.querySelector('.faq-icon');
            icon.classList.toggle('active');
            
            const answer = element.querySelector('.faq-answer');
            if (answer) {
                answer.remove();
            } else {
                const newAnswer = document.createElement('div');
                newAnswer.className = 'faq-answer';
                newAnswer.textContent = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.';
                element.appendChild(newAnswer);
            }
        }

        // Navbar Scroll Effect
        let lastScrollTop = 0;
        const header = document.querySelector('.header');
        const scrollThreshold = 100;

        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > scrollThreshold) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
            
            if (scrollTop > lastScrollTop && scrollTop > 200) {
                header.classList.add('hide');
                header.classList.remove('show');
            } else {
                header.classList.remove('hide');
                header.classList.add('show');
            }
            
            lastScrollTop = scrollTop;
        });

        // Active Menu State
        function setActiveMenu() {
            const currentPath = window.location.pathname;
            const navItems = document.querySelectorAll('.nav-menu li');
            
            navItems.forEach(item => item.classList.remove('active'));
            
            document.querySelectorAll('.nav-menu a').forEach(link => {
                const href = link.getAttribute('href');
                if (href === currentPath || 
                    (currentPath.includes('property') && href.includes('property')) ||
                    (currentPath === '/about' && href === '/about') ||
                    (currentPath === '/contact' && href === '/contact') ||
                    (currentPath === '/' && href === '/')) {
                    link.parentElement.classList.add('active');
                }
            });
        }

        // Mobile Menu
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navMenu = document.querySelector('.nav-menu');

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', function() {
                this.classList.toggle('active');
                navMenu.classList.toggle('active');
                document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : 'auto';
            });
        }

        // Close mobile menu on link click
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    mobileMenuBtn?.classList.remove('active');
                    navMenu?.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });

        // Close mobile menu on outside click
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 768) {
                if (!e.target.closest('.navbar') && navMenu?.classList.contains('active')) {
                    mobileMenuBtn?.classList.remove('active');
                    navMenu?.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            }
        });

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                mobileMenuBtn?.classList.remove('active');
                navMenu?.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            header.classList.add('show');
            setActiveMenu();

            // Auto-hide alert
            const alert = document.querySelector('.alert-success');
            if (alert) {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    setTimeout(() => alert.style.display = 'none', 300);
                }, 5000);
            }
        });

        // Search animation
        const searchInput = document.querySelector('.search-input');
        if (searchInput) {
            searchInput.addEventListener('focus', () => searchInput.parentElement.style.transform = 'scale(1.02)');
            searchInput.addEventListener('blur', () => searchInput.parentElement.style.transform = 'scale(1)');
        }

        // Package card hover
        document.querySelectorAll('.package-card').forEach(card => {
            card.addEventListener('mouseenter', () => card.style.zIndex = '10');
            card.addEventListener('mouseleave', () => card.style.zIndex = '1');
        });

        // Dots click
        document.querySelectorAll('.dot').forEach((dot, index) => {
            dot.addEventListener('click', function() {
                document.querySelectorAll('.dot').forEach(d => d.classList.remove('dot-active'));
                this.classList.add('dot-active');
            });
        });
    </script>
    <!-- Floating Booking Button for Mobile -->
<a href="http://localhost:8080/admin" class="floating-booking-btn">
    <span class="btn-text">BOOKING NOW</span>
    <span class="btn-arrow">→</span>
</a>
</body>
</html>