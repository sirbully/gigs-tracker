<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= asset_url() ?>css/styles.css">
    <script src="https://kit.fontawesome.com/134fbda4cd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <title>Mister Shakes</title>
</head>

<body>
    <div id="app">
        <?php if ($this->session->has_userdata('isloggedin')) : ?>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">

                    <a class="navbar-brand" href="<?= base_url() ?>">Mister Shakes</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarColor03">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item <?= $this->router->class === 'gigs' ? 'active' : '' ?>">
                                <a class="nav-link" href="<?= base_url() ?>">Gigs</a>
                            </li>
                            <?php if ($this->session->userdata('isAdmin')) : ?>
                                <li class="nav-item <?= $this->router->class === 'musicians' ? 'active' : '' ?>">
                                    <a class="nav-link" href="<?= base_url() ?>musicians">Musicians</a>
                                </li>
                            <?php endif; ?>
                            <li class="nav-item <?= $this->router->class === 'activity' ? 'active' : '' ?>">
                                <a class="nav-link" href="<?= base_url() ?>activity">Activity</a>
                            </li>
                            <li class="nav-item <?= $this->router->class === 'settings' ? 'active' : '' ?>">
                                <a class="nav-link" href="<?= base_url() ?>settings">Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?>/members/logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php endif; ?>

        <!-- <div id="snackbar">Some text some message..</div> -->
        <div class="container mt-5">