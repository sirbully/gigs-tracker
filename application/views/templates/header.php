<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grid.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:600|IBM+Plex+Sans|Playfair+Display:400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/134fbda4cd.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/style.css">
    <title>Gigs Tracker</title>
</head>

<body>
    <div id="app">
        <nav class="container d-flex align-items-center justify-content-between">
            <div class="brand">
                <a href="<?= base_url() ?>">Gigs Tracker</a>
            </div>
            <ul class="d-flex">
                <li class="p-2"><a class="<?= $this->router->class === 'gigs' ? 'active' : '' ?>" href="<?= base_url() ?>">Gigs</a></li>
                <li class="p-2"><a class="<?= $this->router->class === 'musicians' ? 'active' : '' ?>" href="<?= base_url() ?>musicians">Musicians</a></li>
                <li class="p-2"><a class="<?= $this->router->class === 'notifications' ? 'active' : '' ?>" href="<?= base_url() ?>notifications">Activity</a></li>
                <li class="p-2"><a class="<?= $this->router->class === 'settings' ? 'active' : '' ?>" href="<?= base_url() ?>settings">Settings</a></li>
            </ul>
            <a class="web-logout" href="<?= base_url() ?>/logout">Logout</a>
        </nav>

        <div class="container">