<h3>update</h3>
<h1>Settings</h1>

<div id="table">
    <div class="container">
        <?= form_open('settings/update_name'); ?>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-2 mb-4" style="display: flex;">
                <label <?= form_error('name') ? 'style="background:#E8072A"' : '' ?>>Name:</label>
                <input <?= form_error('name') ? 'style="border: 2px solid #E8072A;flex: 1 1 auto"' : '' ?> style="flex: 1 1 auto" name="name" type="text" placeholder="Update name">
            </div>
            <div class="col-12 col-md-2">
                <button type="submit">Save</button>
            </div>
        </div>
        <?= form_close(); ?>
        <?= form_open('settings/update_password'); ?>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-2 mb-4" style="display: flex;">
                <label <?= form_error('password') ? 'style="background:#E8072A"' : '' ?>>New Password:</label>
                <input <?= form_error('password') ? 'style="border: 2px solid #E8072A;flex: 1 1 auto"' : '' ?> style="flex: 1 1 auto" name="password" type="password" placeholder="Update password">
            </div>
            <div class="col-12 col-md-2">
                <button type="submit">Save</button>
            </div>
        </div>
        <?= form_close(); ?>
        <?= form_open('settings/update_email'); ?>
        <div class="row">
            <div class="col-12 col-md-6 offset-md-2" style="display: flex;">
                <label <?= form_error('email') ? 'style="background:#E8072A"' : '' ?>>New Email:</label>
                <input <?= form_error('email') ? 'style="border: 2px solid #E8072A;flex: 1 1 auto"' : '' ?> style="flex: 1 1 auto" name="email" type="email" placeholder="Update email">
            </div>
            <div class="col-12 col-md-2">
                <button type="submit">Save</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>