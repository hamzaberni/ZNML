<?php /* countdown-banner.php – Kezdő csoport visszaszámláló sáv */ ?>

<link rel="stylesheet" href="assets/css/countdown-banner.css">

<div class="countdown-banner" id="countdownBanner">
    <div class="countdown-banner-inner">

        <!-- BAL OLDAL: Szöveg -->
        <div class="countdown-banner-left">
            <div class="countdown-banner-icon">
                <img src="assets/images/monkey.png" alt="Zoonimal">
            </div>
            <div class="countdown-banner-text">
                <span class="countdown-banner-label">Újabb lehetőség</span>
                <span class="countdown-banner-title">
                    <span>Kezdő csoportok indulnak</span> – Csatlakozz hozzánk május 5-én! 
                </span>
            </div>
        </div>

        <!-- button -->
        <a href="kezdo.php" class="countdown-banner-cta">
            Érdekel →
        </a>


        <!-- Elválasztó (desktop) -->
        <div class="countdown-banner-divider"></div>

        <!-- JOBB OLDAL: Visszaszámláló -->
        <div class="countdown-banner-right">
            <span class="countdown-banner-label-right">Indul</span>

            <div class="countdown-units">

                <div class="countdown-unit">
                    <span class="countdown-number" id="cd-days">00</span>
                    <span class="countdown-unit-label">nap</span>
                </div>

                <span class="countdown-separator">:</span>

                <div class="countdown-unit">
                    <span class="countdown-number" id="cd-hours">00</span>
                    <span class="countdown-unit-label">óra</span>
                </div>

                <span class="countdown-separator">:</span>

                <div class="countdown-unit">
                    <span class="countdown-number" id="cd-minutes">00</span>
                    <span class="countdown-unit-label">perc</span>
                </div>

                <span class="countdown-separator">:</span>

                <div class="countdown-unit">
                    <span class="countdown-number" id="cd-seconds">00</span>
                    <span class="countdown-unit-label">mp</span>
                </div>

            </div>

            <span class="countdown-expired" id="cd-expired" style="display:none;">
                ✓ Elkezdődött!
            </span>
        </div>

    </div>
</div>

<script src="assets/js/countdown-banner.js?v=<?php echo time(); ?>"></script>