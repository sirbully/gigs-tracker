<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grid.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:600|IBM+Plex+Sans|Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/134fbda4cd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <title>Mister Shakes</title>
</head>

<body>
    <div id="app">
        <?php if ($this->session->has_userdata('isloggedin')) : ?>
            <nav class="container d-flex align-items-center justify-content-between">
                <div class="brand">
                    <a href="<?= base_url() ?>">Mister Shakes</a>
                </div>
                <ul class="d-flex">
                    <li class="p-2"><a class="<?= $this->router->class === 'gigs' ? 'active' : '' ?>" href="<?= base_url() ?>">Gigs</a></li>
                    <?php if ($this->session->userdata('isAdmin')) : ?>
                        <li class="p-2"><a class="<?= $this->router->class === 'musicians' ? 'active' : '' ?>" href="<?= base_url() ?>musicians">Musicians</a></li>
                    <?php endif; ?>
                    <li class="p-2"><a class="<?= $this->router->class === 'activity' ? 'active' : '' ?>" href="<?= base_url() ?>activity">Activity</a></li>
                    <li class="p-2"><a class="<?= $this->router->class === 'settings' ? 'active' : '' ?>" href="<?= base_url() ?>settings">Settings</a></li>
                </ul>
                <a class="web-logout" href="<?= base_url() ?>/members/logout">Logout</a>
            </nav>
        <?php endif; ?>

        <div id="snackbar">Some text some message..</div>
        <div class="container">