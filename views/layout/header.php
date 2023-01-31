<!DOCTYPE html>
<html>

<head>
    <!-- META TAGS -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    
    <!-- IMPORT STYLES -->
    <link rel="shortcut icon" href="<?php echo URL ?>public/images/favicon.ico" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL ?>public/images/apple-icon.png" />
    <link rel="stylesheet" href="<?php echo URL ?>public/css/tailwind.css">
    <link rel="stylesheet" href="<?php echo URL ?>public/css/style.css">
    
    <!-- IMPORT SCRIPTS -->
    <script src="<?php echo URL ?>public/js/kit_fontawesome.js"></script>
    <script src="<?= URL ?>public/js/jquery-3.6.3.min.js"></script>

    <!-- timer plugin settings -->
    <script>
        $(function () {
        $('#defaultCountDown').countdown($.countdown.regionalOptions['fa']);
    });
    </script>

    <title>Online Exam | BUT</title>
</head>

<body>