<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= asset_url(); ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= asset_url() ?>css/styles.css">
    <script src="https://kit.fontawesome.com/134fbda4cd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <title>Mister Shakes</title>
</head>

<body>
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
            <h1 class="mb-4">Mister Shakes</h1>
            <?php if ($this->session->flashdata('login-fail')) : ?>
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <span style="font-weight: 900">Error!</span> Incorrect login credentials.
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('settings')) : ?>
                <div class="alert alert-dismissible alert-primary">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    You've been logged out for updating your settings.
                </div>
            <?php endif; ?>
            <div class="container">
                <?= form_open('members/login'); ?>
                <div class="form-row align-items-center">
                    <div class="col-12 col-md-4 offset-md-4">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Email Address">
                            <?php if (form_error('email')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
                        </div>
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-12 col-md-4 offset-md-4">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Password">
                            <?php if (form_error('password')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 offset-md-4">
                    <span class="mb-4" style="cursor: pointer;" data-toggle="tooltip" data-placement="right" title="" data-original-title="Contact the webmaster to request a new password.">Forgot password? <i class="fas fa-question-circle"></i> </span>
                </div>
                <div class="col-12 col-md-4 offset-md-4 mt-4">
                    <button class="btn btn-primary w-100" type="submit">Sign In</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <script src="<?= asset_url() ?>js/jquery.min.js"></script>
    <script src="<?= asset_url() ?>js/popper.min.js"></script>
    <script src="<?= asset_url() ?>js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("body").tooltip({
                selector: '[data-toggle=tooltip]'
            });
        });
    </script>
</body>

</html>