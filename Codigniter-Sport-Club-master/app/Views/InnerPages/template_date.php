<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sport Club</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?= !empty($public) ? base_url($public . '/favicon.ico') :  'public/favicon.ico' ?>">

    <!-- STYLES -->
    <link rel="stylesheet" href="<?= !empty($public) ? base_url($public . '/css/output.css') : 'public/css/output.css' ?>">
</head>

<body class="font-sans bg-gray-100 no-scro">
    <?php
    echo view('InnerPages/header.php');
    echo view($main_content, $data);


    echo view('InnerPages/footer.php');
