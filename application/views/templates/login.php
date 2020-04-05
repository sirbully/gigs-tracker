<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/grid.min.css">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono:600|IBM+Plex+Sans|Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset_url(); ?>css/style.css">
    <script src="https://kit.fontawesome.com/134fbda4cd.js" crossorigin="anonymous"></script>
    <title>Mister Shakes</title>
</head>

<body>
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
            <h1 class="mb-4">Mister Shakes</h1>
            <?php if ($this->session->flashdata('login-fail')) : ?>
                <h3 class="mb-3" style="padding: 5px 10px; background: rgb(34,34,34); color: #fff;"><?= $this->session->flashdata('login-fail') ?></h3>
            <?php endif; ?>
            <?php if ($this->session->flashdata('settings')) : ?>
                <h3 class="mb-3" style="padding: 5px 10px; background: rgb(34,34,34); color: #fff;"><?= $this->session->flashdata('settings') ?></h3>
            <?php endif; ?>
            <form action="<?= base_url() ?>members/login" method="post" style="width: 40%">
                <div class="row mb-3">
                    <label><i class="fas fa-user"></i></label>
                    <input type="email" name="email" placeholder="Email Address" style="flex: 1 1 auto">
                </div>
                <div class="row mb-3">
                    <label><i class="fas fa-key"></i></label>
                    <input type="password" name="password" placeholder="Password" style="flex: 1 1 auto">
                </div>
                <p class="mb-4">Forgot password? Notify the webmaster to request a new one.</p>
                <div class="row mt-4 justify-content-end">
                    <button type="submit">Sign In</button>
                </div>
                <?= form_close(); ?>
        </div>
    </div>
</body>

</html>