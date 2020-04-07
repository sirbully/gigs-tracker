<div style="text-align: right">
    <h5>Add a new</h5>
    <h1>Musician</h1>
</div>

<div id="table-gig" class="my-5">
    <?= form_open('musicians/create'); ?>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name:</label>
        <div class="col-sm-10">
            <input id="name" name="name" type="text" placeholder="Full Name" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>">
            <?php if (form_error('name')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email:</label>
        <div class="col-sm-10">
            <input id="email" name="email" type="email" placeholder="Email address" value="<?= set_value('email'); ?>" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>">
            <?php if (form_error('email')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
        </div>
        <input type="hidden" name="password" :value="generatePassword">
    </div>
    <div class="container">
        <div class="row justify-content-end">
            <a class="btn btn-primary mr-3" href="<?= base_url() ?>musicians">Go Back</a>
            <button type="submit" class="btn btn-primary">Register Musician</button>
        </div>
    </div>
    <?= form_close(); ?>
</div>