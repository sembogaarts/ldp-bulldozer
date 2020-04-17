<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $css_url ?>">
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <!-- Libs -->
    <script src="https://cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>
</head>
<body>

<img class="logo" src="<?php echo $logo_url ?>" alt="">

<div class="iframe-wrapper">
    <iframe src="<?php echo $gif_url ?>"></iframe>
</div>

<h1>Nog even geduld, de website is bijna klaar.</h1>

<canvas class="confetti" id="my-canvas"></canvas>

<script>
    var confettiSettings = { target: 'my-canvas' };
    var confetti = new ConfettiGenerator(confettiSettings);
    confetti.render();
</script>

</body>
</html>