<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Warnet Galaxy' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.1.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/warnetgalaxy/public/css/main.css">
    <?php if (isset($css_file)): ?>
        <link rel="stylesheet" href="/warnetgalaxy/public/css/<?= $css_file ?>">
    <?php endif; ?>
</head>
<body>
    <div class="stars"></div>
    <div class="stars2"></div>
    <div class="stars3"></div>