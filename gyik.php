<?php ?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GY.I.K.</title>
    <link rel="stylesheet" href="assets/css/gyik.css">
    <link rel="icon" href="assets/images/monkey.png">

</head>
<body>
    <!-- Background overlay -->
    <div class="overlay" id="overlay"></div>
    
    <!-- box -->
    <div class="popup-box" id="popupBox">
        <button class="close-btn" id="closeBtn">&times;</button>
        <div class="popup-content">
            <h1>GY.I.K.🦎</h1>
            <div class="image-container">
                <img src="assets/images/gyik.jpg" alt="Gyík">
            </div>
            <button class="ok-btn" id="okBtn">Vissza</button>
        </div>
    </div>

<script src="assets/js/gyik.js?v=<?php echo time(); ?>"></script>

</body>
</html>