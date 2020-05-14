<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>🎉 Binnenkort beschikbaar! - <?php echo $site_title ?></title>
    <meta name="description" content="Er wordt momenteel hard gewerkt aan <?php echo $site_title ?>!✅ Kom over een paar dagen weer eens terug, wellicht is de website dan al beschikbaar!">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $css_url ?>">
    <!-- Fonts-->
    <link href="//fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <!-- Libs -->
</head>
<body>

<img class="logo" src="<?php echo $logo_url ?>" alt="Let's Deploy loho">

<div class="iframe-wrapper">
    <iframe src="<?php echo $gif_url ?>"></iframe>
</div>

<h1>Nog even geduld, de website is bijna klaar.</h1>

<a class="ad" target="_blank" href="https://letsdeploy.nl">Ik wil ook een nieuwe website!</a>

<p class="create">Of een app, webshop, plugin, programma.</p>

<canvas class="confetti" id="my-canvas"></canvas>

<script src="//cdn.jsdelivr.net/npm/confetti-js@0.0.18/dist/index.min.js"></script>

<script>
    var confettiSettings = { target: 'my-canvas' };
    var confetti = new ConfettiGenerator(confettiSettings);
    confetti.render();
</script>

</body>
</html>