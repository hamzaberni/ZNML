<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoonimal</title>
    <meta name="description"
        content="Premium architecture and interior design studio creating extraordinary spaces that inspire and elevate everyday living.">
    <meta name="keywords" content="architecture, interior design, luxury homes, commercial spaces, residential design">
    <link rel="icon" href="assets/images/monkey.png">
    <!-- Bootstrap 5 CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- AOS Animation Library -->
    <link href="assets/css/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Google Fonts - Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader-content">
            <div class="logo-animation">
                <span class="logo-text">ZOONIMAL</span>
                <div class="logo-line"></div>
                <span class="logo-subtitle">functional movement training</span>
            </div>
        </div>
    </div>

    <!-- Cookie Banner -->
<div id="cookieBanner" class="cookie-banner">
    <div class="cookie-content">
        <div class="cookie-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"></path>
                <path d="M8.5 8.5v.01"></path>
                <path d="M16 15.5v.01"></path>
                <path d="M12 12v.01"></path>
                <path d="M11 17v.01"></path>
                <path d="M7 14v.01"></path>
            </svg>
        </div>
        <div class="cookie-text">
            <h3>Süti beállítások</h3>
            <p>Az oldalunk sütiket használ a legjobb felhasználói élmény érdekében. A "Minden elfogadása" gombra kattintva hozzájárul az összes süti használatához.</p>
        </div>
        <div class="cookie-buttons">
            <button onclick="acceptCookies('all')" class="cookie-btn cookie-btn-accept">Minden elfogadása</button>
            <button onclick="openCookieSettings()" class="cookie-btn cookie-btn-settings">Beállítások</button>
            <button onclick="acceptCookies('necessary')" class="cookie-btn cookie-btn-decline">Csak a szükséges</button>
        </div>
    </div>
</div>

<!-- Cookie Settings Modal -->
<div id="cookieSettings" class="cookie-modal">
    <div class="cookie-modal-content">
        <span class="cookie-modal-close" onclick="closeCookieSettings()">&times;</span>
        <h3>Süti beállítások</h3>
        
        <div class="cookie-category">
            <div class="cookie-category-header">
                <label class="cookie-switch">
                    <input type="checkbox" checked disabled>
                    <span class="cookie-slider"></span>
                </label>
                <div>
                    <h4>Szükséges sütik</h4>
                    <p>Ezek a sütik elengedhetetlenek az oldal működéséhez. Nem kapcsolhatók ki.</p>
                </div>
            </div>
        </div>
        
        <div class="cookie-category">
            <div class="cookie-category-header">
                <label class="cookie-switch">
                    <input type="checkbox" id="analyticsCookies">
                    <span class="cookie-slider"></span>
                </label>
                <div>
                    <h4>Analitikai sütik</h4>
                    <p>Ezek a sütik segítenek megérteni, hogyan használják látogatóink az oldalt.</p>
                </div>
            </div>
        </div>
        
        <div class="cookie-category">
            <div class="cookie-category-header">
                <label class="cookie-switch">
                    <input type="checkbox" id="marketingCookies">
                    <span class="cookie-slider"></span>
                </label>
                <div>
                    <h4>Marketing sütik</h4>
                    <p>Ezek a sütik releváns hirdetések megjelenítését teszik lehetővé.</p>
                </div>
            </div>
        </div>
        
        <div class="cookie-modal-buttons">
            <button onclick="saveCustomCookies()" class="cookie-btn cookie-btn-accept">Mentés</button>
            <button onclick="acceptCookies('all')" class="cookie-btn cookie-btn-primary">Minden elfogadása</button>
        </div>
    </div>
</div>
<!-- Lebegő Cookie  -->
<button id="cookieSettingsBtn" class="cookie-floating-btn" onclick="reopenCookieSettings()" title="Süti beállítások">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M12 2a10 10 0 1 0 10 10 4 4 0 0 1-5-5 4 4 0 0 1-5-5"></path>
        <path d="M8.5 8.5v.01"></path>
        <path d="M16 15.5v.01"></path>
        <path d="M12 12v.01"></path>
        <path d="M11 17v.01"></path>
        <path d="M7 14v.01"></path>
    </svg>
</button>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <span class="brand-text">ZOONIMAL</span>
                <span class="brand-subtitle"></span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="index.php">Kezdőlap</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#portfolio">Edzők</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#services">Óratípusok</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#timetable">Órarend</a></li>
                        <li class="nav-item"><a class="nav-link" href="prices.php">Árak</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php#about">Rólunk</a></li>
                        <!-- <li class="nav-item"><a class="nav-link" href="#process">Kapcsolat</a></li> -->
                        <!-- <li class="nav-item"><a class="nav-link" href="#blog">Blog</a></li> -->
                        <li class="nav-item"><a class="nav-link" href="kapcsolat.php">Kapcsolat</a></li>
                    </ul>
                </div>
            </div>
            <div class="right-links-block">
              <a href="https://www.facebook.com/profile.php?id=61581512828217" class="link">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                  <path
                    d="M14.6875 4.6875C15.0109 4.6875 15.2734 4.425 15.2734 4.10156V0.585938C15.2734 0.2625 15.0109 0 14.6875 0H11.1719C8.91016 0 7.07031 1.83984 7.07031 4.10156V7.03125H5.3125C4.98906 7.03125 4.72656 7.29375 4.72656 7.61719V11.1328C4.72656 11.4563 4.98906 11.7188 5.3125 11.7188H7.07031V19.4141C7.07031 19.7375 7.33281 20 7.65625 20H11.1719C11.4953 20 11.7578 19.7375 11.7578 19.4141V11.7188H14.1016C14.3879 11.7188 14.6324 11.5117 14.6797 11.2293L15.2656 7.71367C15.2938 7.54375 15.2461 7.36992 15.1348 7.23828C15.0234 7.10703 14.8598 7.03125 14.6875 7.03125H11.7578V4.6875H14.6875ZM11.1719 8.20312H13.9957L13.6051 10.5469H11.1719C10.8484 10.5469 10.5859 10.8094 10.5859 11.1328V18.8281H8.24219V11.1328C8.24219 10.8094 7.97969 10.5469 7.65625 10.5469H5.89844V8.20312H7.65625C7.97969 8.20312 8.24219 7.94063 8.24219 7.61719V4.10156C8.24219 2.48633 9.55664 1.17188 11.1719 1.17188H14.1016V3.51562H11.1719C10.8484 3.51562 10.5859 3.77813 10.5859 4.10156V7.61719C10.5859 7.94063 10.8484 8.20312 11.1719 8.20312Z"
                    fill="#EBEBEB" />
                </svg>
              </a>
              <a href="https://www.instagram.com/zoonimal.fit?igsh=ZHc1NzY3bWM1OTk1" class="link">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                  <g clip-path="url(#clip0_17753_3781)">
                    <path
                      d="M10.1968 20C10.1306 20 10.0644 20 9.99771 19.9997C8.43002 20.0035 6.9815 19.9637 5.57281 19.878C4.28131 19.7994 3.10242 19.3531 2.16339 18.5874C1.25732 17.8485 0.63858 16.8495 0.324402 15.6185C0.0509644 14.5467 0.0364685 13.4946 0.022583 12.477C0.0125122 11.7469 0.00213623 10.8817 0 10.0019C0.00213623 9.11838 0.0125122 8.25321 0.022583 7.52307C0.0364685 6.50562 0.0509644 5.45352 0.324402 4.38159C0.63858 3.15052 1.25732 2.15152 2.16339 1.41269C3.10242 0.647006 4.28131 0.200687 5.57297 0.122104C6.98166 0.036502 8.43048 -0.00347599 10.0015 0.000338713C11.5697 -0.00301822 13.0177 0.036502 14.4264 0.122104C15.7179 0.200687 16.8968 0.647006 17.8358 1.41269C18.7421 2.15152 19.3607 3.15052 19.6748 4.38159C19.9483 5.45337 19.9628 6.50562 19.9767 7.52307C19.9867 8.25321 19.9972 9.11838 19.9992 9.9982V10.0019C19.9972 10.8817 19.9867 11.7469 19.9767 12.477C19.9628 13.4944 19.9484 14.5465 19.6748 15.6185C19.3607 16.8495 18.7421 17.8485 17.8358 18.5874C16.8968 19.3531 15.7179 19.7994 14.4264 19.878C13.0774 19.9601 11.6916 20 10.1968 20ZM9.99771 18.761C11.5399 18.7647 12.9559 18.7256 14.3315 18.642C15.3081 18.5826 16.46 17.9421 17.1537 17.3764C17.7948 16.8535 18.2364 16.1321 18.4661 15.2321C18.6937 14.3399 18.7069 13.382 18.7195 12.4556C18.7294 11.7304 18.7398 10.8713 18.7419 10C18.7398 9.1286 18.7294 8.26969 18.7195 7.54444C18.7069 6.61807 18.6937 5.66013 18.4661 4.76779C18.2364 3.86783 17.7948 3.1464 17.1537 2.62348C16.46 2.05799 15.3081 1.43619 14.3315 1.37683C12.9559 1.29306 11.5399 1.25445 10.0014 1.25781C8.45947 1.25415 7.0433 1.29764 5.66772 1.38141C4.69116 1.44077 3.64605 1.85959 2.95239 2.42508C2.31121 2.948 1.75088 3.86783 1.52123 4.76779C1.29357 5.66013 1.28045 6.61792 1.26779 7.54444C1.25787 8.2703 1.24749 9.12982 1.24535 10.0019C1.24749 10.8701 1.25787 11.7298 1.26779 12.4556C1.28045 13.382 1.29357 14.3399 1.52123 15.2321C1.75088 16.1321 2.19247 16.8535 2.83364 17.3764C3.52731 17.9419 4.69116 18.5826 5.66772 18.642C7.0433 18.7258 8.45978 18.7648 9.99771 18.761ZM9.96048 14.8828C7.26822 14.8828 5.07767 12.6924 5.07767 10C5.07767 7.30762 7.26822 5.11722 9.96048 5.11722C12.6529 5.11722 14.8433 7.30762 14.8433 10C14.8433 12.6924 12.6529 14.8828 9.96048 14.8828ZM10.0014 6.25416C7.80598 6.25416 6.26095 7.7992 6.26095 9.9982C6.26095 11.829 7.6453 13.7609 9.97978 13.7609C11.8107 13.7609 13.7142 12.0264 13.7142 9.9982C13.7142 8.16745 12.3175 6.25416 10.0014 6.25416ZM15.3902 3.55472C14.743 3.55472 14.2183 4.07932 14.2183 4.7266C14.2183 5.37387 14.743 5.89847 15.3902 5.89847C16.0374 5.89847 16.562 5.37387 16.562 4.7266C16.562 4.07932 16.0374 3.55472 15.3902 3.55472Z"
                      fill="#EBEBEB" />
                  </g>
                  <defs>
                    <clipPath>
                      <rect width="20" height="20" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
              </a>             
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="consult-hero-section">
        <div class="consult-hero-background"></div>
        <div class="consult-hero-overlay"></div>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-8">
                    <h1 class="consult-hero-title" data-aos="fade-up" data-aos-delay="300">
                        Kapcsolatfelvétel
                        <!-- <span class="accent-text">Zoonimal</span> -->
                    </h1>
                    <p class="consult-hero-subtitle" data-aos="fade-up" data-aos-delay="500">
                        Vedd fel velünk a kapcsolatot az alábbi elérhetőségeken, vagy küldj üzenetet közvetlenül az űrlap segítségével.
                    </p>
                    <a href="kapcsolat.php#consultation-form" class="btn btn-primary" data-aos="fade-up"
                        data-aos-delay="700">Írj nekünk</a>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto text-center">
                            <div class="section-header" data-aos="fade-up">
                                <span class="section-subtitle">Elérhetőségek</span>
                            </div>
                        </div>
                    </div>
                    <div class="row row-gap-4 mb-96">
                        <div class="col-lg-3">
                            <div class="contact-block h-100">
                                <div class="icon-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                                        fill="none">
                                        <g clip-path="url(#clip0_17827_2859)">
                                            <path
                                                d="M22.7489 21.7425L22.1649 20.7675C21.1148 19.036 19.6654 17.0486 17.7643 17.0486C17.412 17.0486 17.0632 17.1195 16.718 17.2629L15.6976 17.7005C15.6044 17.7391 15.5138 17.7831 15.418 17.8297C15.1568 17.9567 14.8607 18.1006 14.5561 18.1006C13.8047 18.1006 12.9341 17.1227 12.105 15.3473C11.2913 13.6047 11.3432 12.6911 11.53 12.2314C11.7361 11.7243 12.2154 11.5074 12.7302 11.3126C12.8019 11.2854 12.8665 11.2608 12.9294 11.2349L13.9627 10.7998C16.6546 9.67414 15.6531 5.7402 15.3248 4.45044L15.0463 3.34153C14.8083 2.4276 14.1771 0 12.0835 0C11.696 0 11.2825 0.0902945 10.855 0.268484C10.5745 0.379868 6.71474 1.95541 5.31638 4.72335C3.64511 8.01802 3.95413 12.4361 6.23397 17.8522C8.49676 23.275 11.431 26.5919 14.9553 27.7106C15.5598 27.9026 16.243 27.9999 16.9861 27.9999H16.9865C19.4186 27.9999 21.8194 26.9651 22.0143 26.8792C22.8528 26.524 23.3948 25.9841 23.6252 25.2745C24.0157 24.0711 23.3606 22.7527 22.7489 21.7425ZM21.8232 24.6898C21.7697 24.8547 21.5835 25.0053 21.2703 25.1371C21.2652 25.1394 21.2588 25.142 21.2535 25.1444C21.2318 25.154 19.0587 26.1058 16.986 26.1057C16.4376 26.1057 15.9473 26.0383 15.5285 25.9052C12.5594 24.9627 10.0205 22.008 7.98088 17.1201C5.92609 12.2382 5.59774 8.35571 7.00634 5.57894C8.1001 3.41401 11.5243 2.04066 11.5579 2.02752C11.5648 2.02474 11.5714 2.02209 11.5781 2.01931C11.7731 1.93748 11.9479 1.89429 12.0835 1.89429C12.5009 1.89429 12.8808 2.54163 13.2109 3.81043L13.4881 4.91467C14.0862 7.26359 13.9951 8.7328 13.2295 9.05306L12.2011 9.48622C12.1602 9.50315 12.1123 9.52095 12.0595 9.54103C11.4915 9.7561 10.3095 10.2034 9.7749 11.5183C9.28984 12.7114 9.49063 14.2261 10.3881 16.1489C11.597 18.7369 12.9602 19.995 14.5558 19.995C15.2964 19.995 15.8908 19.706 16.2459 19.5335C16.3113 19.5017 16.3698 19.4725 16.4327 19.4465L17.4546 19.0083C17.5601 18.9644 17.6613 18.943 17.7641 18.943C18.256 18.943 19.138 19.4301 20.5425 21.7454L21.1261 22.7199C21.8453 23.9073 21.9021 24.4466 21.8232 24.6898Z"
                                                fill="#EBEBEB" />
                                        </g>
                                        <defs>
                                            <clipPath>
                                                <rect width="28" height="28" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <h6 class="fw-500 mb-8">Telefonszám</h6>
                                    <p>Pekárovics Zoltán<br>Szakmai vezető</p>
                                    <a href="tel:+36303093111" class="hover-content black fw-500 text-16">+36303093111</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="contact-block h-100">
                                <div class="icon-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                                        fill="none">
                                        <g clip-path="url(#clip0_17827_2859)">
                                            <path
                                                d="M22.7489 21.7425L22.1649 20.7675C21.1148 19.036 19.6654 17.0486 17.7643 17.0486C17.412 17.0486 17.0632 17.1195 16.718 17.2629L15.6976 17.7005C15.6044 17.7391 15.5138 17.7831 15.418 17.8297C15.1568 17.9567 14.8607 18.1006 14.5561 18.1006C13.8047 18.1006 12.9341 17.1227 12.105 15.3473C11.2913 13.6047 11.3432 12.6911 11.53 12.2314C11.7361 11.7243 12.2154 11.5074 12.7302 11.3126C12.8019 11.2854 12.8665 11.2608 12.9294 11.2349L13.9627 10.7998C16.6546 9.67414 15.6531 5.7402 15.3248 4.45044L15.0463 3.34153C14.8083 2.4276 14.1771 0 12.0835 0C11.696 0 11.2825 0.0902945 10.855 0.268484C10.5745 0.379868 6.71474 1.95541 5.31638 4.72335C3.64511 8.01802 3.95413 12.4361 6.23397 17.8522C8.49676 23.275 11.431 26.5919 14.9553 27.7106C15.5598 27.9026 16.243 27.9999 16.9861 27.9999H16.9865C19.4186 27.9999 21.8194 26.9651 22.0143 26.8792C22.8528 26.524 23.3948 25.9841 23.6252 25.2745C24.0157 24.0711 23.3606 22.7527 22.7489 21.7425ZM21.8232 24.6898C21.7697 24.8547 21.5835 25.0053 21.2703 25.1371C21.2652 25.1394 21.2588 25.142 21.2535 25.1444C21.2318 25.154 19.0587 26.1058 16.986 26.1057C16.4376 26.1057 15.9473 26.0383 15.5285 25.9052C12.5594 24.9627 10.0205 22.008 7.98088 17.1201C5.92609 12.2382 5.59774 8.35571 7.00634 5.57894C8.1001 3.41401 11.5243 2.04066 11.5579 2.02752C11.5648 2.02474 11.5714 2.02209 11.5781 2.01931C11.7731 1.93748 11.9479 1.89429 12.0835 1.89429C12.5009 1.89429 12.8808 2.54163 13.2109 3.81043L13.4881 4.91467C14.0862 7.26359 13.9951 8.7328 13.2295 9.05306L12.2011 9.48622C12.1602 9.50315 12.1123 9.52095 12.0595 9.54103C11.4915 9.7561 10.3095 10.2034 9.7749 11.5183C9.28984 12.7114 9.49063 14.2261 10.3881 16.1489C11.597 18.7369 12.9602 19.995 14.5558 19.995C15.2964 19.995 15.8908 19.706 16.2459 19.5335C16.3113 19.5017 16.3698 19.4725 16.4327 19.4465L17.4546 19.0083C17.5601 18.9644 17.6613 18.943 17.7641 18.943C18.256 18.943 19.138 19.4301 20.5425 21.7454L21.1261 22.7199C21.8453 23.9073 21.9021 24.4466 21.8232 24.6898Z"
                                                fill="#EBEBEB" />
                                        </g>
                                        <defs>
                                            <clipPath>
                                                <rect width="28" height="28" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <h6 class="fw-500 mb-8">Telefonszám</h6>
                                    <p>Szűcs Imre<br>Üzleti vezető</p>
                                    <a href="tel:+36204447398" class="hover-content black fw-500 text-16">+36204447398</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="contact-block h-100">
                                <div class="icon-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                                        fill="none">
                                        <g clip-path="url(#clip0_17827_2076)">
                                            <path
                                                d="M25.5391 4.15625H2.46094C1.10124 4.15625 0 5.26433 0 6.61719V21.3828C0 22.7437 1.10934 23.8438 2.46094 23.8438H25.5391C26.8874 23.8438 28 22.7484 28 21.3828V6.61719C28 5.26673 26.9031 4.15625 25.5391 4.15625ZM25.1944 5.79688C24.6916 6.29699 16.0389 14.9041 15.7402 15.2013C15.2753 15.6662 14.6573 15.9221 14 15.9221C13.3427 15.9221 12.7247 15.6661 12.2583 15.1998C12.0574 14.9999 3.50016 6.4878 2.80558 5.79688H25.1944ZM1.64062 21.0489V6.95215L8.7302 14.0044L1.64062 21.0489ZM2.80662 22.2031L9.89341 15.1614L11.0998 16.3614C11.8745 17.1361 12.9044 17.5627 14 17.5627C15.0956 17.5627 16.1255 17.1361 16.8987 16.3629L18.1066 15.1614L25.1934 22.2031H2.80662ZM26.3594 21.0489L19.2698 14.0044L26.3594 6.95215V21.0489Z"
                                                fill="#EBEBEB" />
                                        </g>
                                        <defs>
                                            <clipPath>
                                                <rect width="28" height="28" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <h6 class="fw-500 mb-8">Email</h6>
                                    <a href="mailto:info@zoonimal.hu"
                                        class="hover-content black fw-500 text-16">info@zoonimal.hu</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="contact-block h-100">
                                <div class="icon-box">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28"
                                        fill="none">
                                        <g clip-path="url(#clip0_17827_2862)">
                                            <path
                                                d="M13.3174 27.6347C13.4696 27.8629 13.7257 28 14 28C14.2743 28 14.5304 27.863 14.6826 27.6347C16.6239 24.7227 19.4834 21.1264 21.4759 17.4689C23.0692 14.5444 23.8438 12.0502 23.8438 9.84375C23.8438 4.41591 19.4278 0 14 0C8.57216 0 4.15625 4.41591 4.15625 9.84375C4.15625 12.0502 4.93079 14.5444 6.52405 17.4689C8.51517 21.1236 11.3801 24.7288 13.3174 27.6347ZM14 1.64062C18.5232 1.64062 22.2031 5.32055 22.2031 9.84375C22.2031 11.769 21.494 14.0065 20.0353 16.684C18.3177 19.8367 15.8667 23.0348 14 25.7233C12.1336 23.0351 9.68242 19.8369 7.96474 16.684C6.50601 14.0065 5.79688 11.769 5.79688 9.84375C5.79688 5.32055 9.4768 1.64062 14 1.64062Z"
                                                fill="#EBEBEB" />
                                            <path
                                                d="M14 14.7656C16.7139 14.7656 18.9219 12.5577 18.9219 9.84375C18.9219 7.12983 16.7139 4.92188 14 4.92188C11.2861 4.92188 9.07812 7.12983 9.07812 9.84375C9.07812 12.5577 11.2861 14.7656 14 14.7656ZM14 6.5625C15.8093 6.5625 17.2812 8.03447 17.2812 9.84375C17.2812 11.653 15.8093 13.125 14 13.125C12.1907 13.125 10.7188 11.653 10.7188 9.84375C10.7188 8.03447 12.1907 6.5625 14 6.5625Z"
                                                fill="#EBEBEB" />
                                        </g>
                                        <defs>
                                            <clipPath>
                                                <rect width="28" height="28" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </div>
                                <div>
                                    <h6 class="fw-500 mb-8">Cím</h6>
                                    <p class="fw-500 black">4032 Debrecen, Lehel utca 24.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>




<!-- Consultation Form -->
<section class="consult-form-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="consult-form-container" data-aos="fade-up">
                    <div class="consult-form-header">
                        <h2>Küldj üzenetet</h2>
                        <p>Töltsd ki az alábbi űrlapot és mi megpróbálunk minél hamarabb válaszolni kérdéseidre!</p>
                    </div>
                    <form id="consultation-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="fullName" class="form-label">Név</label>
                                    <input type="text" class="form-control" name="from_name" id="name" required>
                                </div>
                            </div>                        
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="from_email" id="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Telefonszám</label>
                                    <input type="tel" class="form-control" name="phone" id="phone" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="projectType" class="form-label">Mivel kapcsolatban van kérdésed?</label>
                            <select class="form-select" name="project_type" id="projectType" required>
                                <option value="" selected disabled>Válassz</option>
                                <option value="Edzések">Edzések</option>
                                <option value="Időpontok">Időpontok</option>
                                <option value="Üzleti megkeresés">Üzleti megkeresés</option>
                                <option value="Egyéb">Egyéb</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="projectDescription" class="form-label">Üzenet</label>
                            <textarea class="form-control" name="message" id="projectDescription" rows="4"
                                placeholder="Írja ide üzenetét, kérdéseit"></textarea>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="newsletter" required>
                            <label class="form-check-label" for="newsletter">Hozzájárulok személyes adataim gyűjtéséhez és tárolásához.</label>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Elküldés</button>
                        </div>
                        <div id="form-message" style="display: none; margin-top: 1rem;"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
    <footer class="footer bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-brand">
                        <a href="" class="footer-logo mb-24"><img src="assets/images/footerlogo.png" alt="footer-logo"></a>
                    </div>
                    <h6 class="fw-500 mb-24 white">Kövessen minket a közösségi médián is!</h6>
                    <ul class="unstyled social-link">
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=61581512828217" class="social-icon-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                            d="M14.6875 4.6875C15.0109 4.6875 15.2734 4.425 15.2734 4.10156V0.585938C15.2734 0.2625 15.0109 0 14.6875 0H11.1718C8.91013 0 7.07028 1.83984 7.07028 4.10156V7.03125H5.31247C4.98903 7.03125 4.72653 7.29375 4.72653 7.61719V11.1328C4.72653 11.4562 4.98903 11.7188 5.31247 11.7188H7.07028V19.4141C7.07028 19.7375 7.33278 20 7.65622 20H11.1718C11.4953 20 11.7578 19.7375 11.7578 19.4141V11.7188H14.1015C14.3879 11.7188 14.6324 11.5117 14.6797 11.2293L15.2656 7.71367C15.2937 7.54375 15.2461 7.36992 15.1347 7.23828C15.0234 7.10703 14.8597 7.03125 14.6875 7.03125H11.7578V4.6875H14.6875ZM11.1718 8.20312H13.9957L13.605 10.5469H11.1718C10.8484 10.5469 10.5859 10.8094 10.5859 11.1328V18.8281H8.24216V11.1328C8.24216 10.8094 7.97966 10.5469 7.65622 10.5469H5.89841V8.20312H7.65622C7.97966 8.20312 8.24216 7.94062 8.24216 7.61719V4.10156C8.24216 2.48633 9.55661 1.17188 11.1718 1.17188H14.1015V3.51562H11.1718C10.8484 3.51562 10.5859 3.77813 10.5859 4.10156V7.61719C10.5859 7.94062 10.8484 8.20312 11.1718 8.20312Z"
                            fill="currentColor" />
                        </svg>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/zoonimal.fit?igsh=ZHc1NzY3bWM1OTk1" class="social-icon-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <g clip-path="url(#clip0_17799_4114)">
                            <path
                                d="M10.1968 19.9999C10.1306 19.9999 10.0644 19.9999 9.99771 19.9996C8.43002 20.0035 6.9815 19.9636 5.57281 19.8779C4.28131 19.7993 3.10242 19.353 2.16339 18.5873C1.25732 17.8485 0.63858 16.8495 0.324402 15.6184C0.0509644 14.5466 0.0364685 13.4945 0.022583 12.4769C0.0125122 11.7468 0.00213623 10.8816 0 10.0018C0.00213623 9.11829 0.0125122 8.25312 0.022583 7.52298C0.0364685 6.50553 0.0509644 5.45343 0.324402 4.3815C0.63858 3.15043 1.25732 2.15143 2.16339 1.4126C3.10242 0.646916 4.28131 0.200597 5.57297 0.122014C6.98166 0.0364124 8.43048 -0.00356563 10.0015 0.000249067C11.5697 -0.00310787 13.0177 0.0364124 14.4264 0.122014C15.7179 0.200597 16.8968 0.646916 17.8358 1.4126C18.7421 2.15143 19.3607 3.15043 19.6748 4.3815C19.9483 5.45328 19.9628 6.50553 19.9767 7.52298C19.9867 8.25312 19.9972 9.11829 19.9992 9.99811V10.0018C19.9972 10.8816 19.9867 11.7468 19.9767 12.4769C19.9628 13.4944 19.9484 14.5465 19.6748 15.6184C19.3607 16.8495 18.7421 17.8485 17.8358 18.5873C16.8968 19.353 15.7179 19.7993 14.4264 19.8779C13.0774 19.96 11.6916 19.9999 10.1968 19.9999ZM9.99771 18.7609C11.5399 18.7646 12.9559 18.7255 14.3315 18.6419C15.3081 18.5825 16.46 17.942 17.1537 17.3763C17.7948 16.8534 18.2364 16.132 18.4661 15.232C18.6937 14.3398 18.7069 13.3819 18.7195 12.4555C18.7294 11.7303 18.7398 10.8712 18.7419 9.99994C18.7398 9.12851 18.7294 8.2696 18.7195 7.54435C18.7069 6.61798 18.6937 5.66004 18.4661 4.7677C18.2364 3.86774 17.7948 3.14631 17.1537 2.62339C16.46 2.0579 15.3081 1.4361 14.3315 1.37674C12.9559 1.29297 11.5399 1.25436 10.0014 1.25772C8.45947 1.25406 7.0433 1.29755 5.66772 1.38132C4.69116 1.44068 3.64605 1.8595 2.95239 2.42499C2.31121 2.94791 1.75088 3.86774 1.52123 4.7677C1.29357 5.66004 1.28045 6.61783 1.26779 7.54435C1.25787 8.27021 1.24749 9.12973 1.24535 10.0018C1.24749 10.87 1.25787 11.7297 1.26779 12.4555C1.28045 13.3819 1.29357 14.3398 1.52123 15.232C1.75088 16.132 2.19247 16.8534 2.83364 17.3763C3.52731 17.9418 4.69116 18.5825 5.66772 18.6419C7.0433 18.7257 8.45978 18.7647 9.99771 18.7609ZM9.96048 14.8828C7.26822 14.8828 5.07767 12.6924 5.07767 9.99994C5.07767 7.30753 7.26822 5.11713 9.96048 5.11713C12.6529 5.11713 14.8433 7.30753 14.8433 9.99994C14.8433 12.6924 12.6529 14.8828 9.96048 14.8828ZM10.0014 6.25407C7.80598 6.25407 6.26095 7.79911 6.26095 9.99811C6.26095 11.8289 7.6453 13.7608 9.97978 13.7608C11.8107 13.7608 13.7142 12.0263 13.7142 9.99811C13.7142 8.16736 12.3175 6.25407 10.0014 6.25407ZM15.3902 3.55463C14.743 3.55463 14.2183 4.07923 14.2183 4.72651C14.2183 5.37378 14.743 5.89838 15.3902 5.89838C16.0374 5.89838 16.562 5.37378 16.562 4.72651C16.562 4.07923 16.0374 3.55463 15.3902 3.55463Z"
                                fill="currentColor" />
                            </g>
                        </svg>
                        </a>
                    </li>
                    </ul>                
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Linkek</h5>
                    <ul class="footer-links">
                        <li><a href="index.php">Kezdőlap</a></li>
                        <li><a href="index.php#portfolio">Edzők</a></li>
                        <li><a href="index.php#services">Óratípusok</a></li>
                        <li><a href="prices.php">Árak</a></li>
                        <li><a href="index.php#about">Rólunk</a></li>
                        <li><a href="kapcsolat.php">Kapcsolat</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Óratípusok</h5>
                    <ul class="footer-links">
                        <li><a href="fmt.php">FMT</a></li>
                        <li><a href="fst.php">Funkcionális izomépítés</a></li>
                        <li><a href="hiit.php">HIIT</a></li>
                        <li><a href="core.php">Core Training</a></li>
                        <li><a href="peachbody.php">Peach Body</a></li>
                        <li><a href="ladiesfirst.php">Ladies First</a></li>
                        <li><a href="rawpower.php">Raw Power</a></li>
                        <li><a href="womanmaker.php">WoManMaker</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5>Egyéb</h5>
                    <ul class="footer-links">
                        <li><a href="">Adatvédelmi Szabályzat</a></li>
                        <li><a href="#">Általános Szerződési Feltételek</a></li>
                        <li><a href="gyik.php">GY.I.K.</a></li>

                    </ul>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="row">
                <div class="col-md-6">
                    <p class="footer-copyright">Copyright&copy; 2025 Zoonimal Fitness Kft.| Minden jog fenntartva. </p>
                </div>
                <!-- <div class="col-md-6 text-md-end">
                    <ul class="footer-legal">
                        <li><a href="privacy-policy.html">Adatvédelmi Tájékoztató</a></li>
                        <li><a href="terms-condition.html">Általános Szerződési Feltételek</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="scroll-to-top">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>
    </button>

    <!-- Bootstrap 5 JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation Library -->
    <script src="assets/js/aos.js"></script>

    <!-- Custom JavaScript -->
    <script src="assets/js/script.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    </script>

<!-- EMAILJS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script src="assets/js/email.js"></script>


    <link rel="stylesheet" href="assets/css/cookie-banner.css">
    <script src="assets/js/cookie-banner.js"></script>

</body>

</html>