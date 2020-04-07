<div style="text-align: right">
    <h5>update your</h5>
    <h1>Settings</h1>
</div>

<div id="table-gig" class="my-5">
    <div class="container">
        <?= form_open('settings/update_name'); ?>
        <div class="form-group row">
            <label for="fullname" class="col-sm-2 offset-sm-2 col-form-label">Change Name:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" id="fullname" name="name" placeholder="Update name">
                <?php if (form_error('name')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
            </div>
            <button class="btn btn-primary col-sm-2" type="submit">Update</button>
        </div>
        <?= form_close(); ?>
        <?= form_open('settings/update_password'); ?>
        <div class="form-group row">
            <label for="password" class="col-sm-2 offset-sm-2 col-form-label">New Password:</label>
            <div class="col-sm-4">
                <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Update password">
                <?php if (form_error('password')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
            </div>
            <button class="btn btn-primary col-sm-2" type="submit">Update</button>
        </div>
        <?= form_close(); ?>
        <?= form_open('settings/update_email'); ?>
        <div class="form-group row">
            <label for="email" class="col-sm-2 offset-sm-2 col-form-label">New Email:</label>
            <div class="col-sm-4">
                <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" placeholder="Update email">
                <?php if (form_error('email')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
            </div>
            <button class="btn btn-primary col-sm-2" type="submit">Update</button>
        </div>
        <?= form_close(); ?>
    </div>
</div>