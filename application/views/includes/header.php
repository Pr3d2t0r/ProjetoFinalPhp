<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <?php if ($this->stylesheet != ""): ?>
        <link rel="stylesheet" href="<?php echo HOME_URI . 'public/static/css/' . $this->stylesheet;?>">
    <?php endif; ?>
    <link rel="stylesheet" href="<?php echo HOME_URI . 'public/static/css/style.css';?>">
    <script src="https://kit.fontawesome.com/0c6dcf304d.js" crossorigin="anonymous"></script>
    <?php if ($this->script != ""): ?>
        <script src="<?php echo HOME_URI . 'public/static/js/' . $this->script;?>"></script>
    <?php endif; ?>
    <script src="<?php echo HOME_URI ;?>public/static/js/main.js"></script>
    <script src="<?php echo HOME_URI ;?>public/static/js/onload.js"></script>
    <title><?php echo $this->title; ?></title>
</head>
<body>
