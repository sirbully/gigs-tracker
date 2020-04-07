<div style="text-align: right">
    <h5>Create new gig for</h5>
    <h1><?= $this->session->userdata('user_name') ?></h1>
</div>

<div id="table-gig" class="my-5">
    <?= form_open_multipart('gigs/create'); ?>
    <div class="form-group row">
        <label for="datepicker" class="col-sm-2 col-form-label">Date:</label>
        <div class="col-sm-10">
            <input id="datepicker" name="date" type="text" placeholder="Click here to select a date" value="<?= set_value('date'); ?>" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>">
            <?php if (form_error('date')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="type" class="col-sm-2 col-form-label">Type:</label>
        <div class="col-sm-10">
            <input id="type" name="type" type="text" placeholder="Type of event" value="<?= set_value('type'); ?>" class="form-control <?= form_error('type') ? 'is-invalid' : '' ?>">
            <?php if (form_error('type')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="location" class="col-sm-2 col-form-label">Location:</label>
        <div class="col-sm-10">
            <input id="location" name="location" type="text" placeholder="Location of the event" value="<?= set_value('location'); ?>" class="form-control <?= form_error('location') ? 'is-invalid' : '' ?>">
            <?php if (form_error('location')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="client" class="col-sm-2 col-form-label">Client:</label>
        <div class="col-sm-10">
            <input id="client" name="client" type="text" placeholder="Client of the event" value="<?= set_value('client'); ?>" class="form-control <?= form_error('client') ? 'is-invalid' : '' ?>">
            <?php if (form_error('client')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="sched" class="col-sm-2 col-form-label">Schedule:</label>
        <div class="col-sm-10">
            <input id="sched" name="sched" type="text" placeholder="Schedule of the event" value="<?= set_value('sched'); ?>" class="form-control <?= form_error('sched') ? 'is-invalid' : '' ?>">
            <?php if (form_error('sched')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="pay" class="col-sm-2 col-form-label">Pay:</label>
        <div class="col-sm-10">
            <input id="pay" name="pay" type="number" placeholder="Payment Terms" value="<?= set_value('pay'); ?>" class="form-control <?= form_error('pay') ? 'is-invalid' : '' ?>">
            <?php if (form_error('pay')) { ?><div class="invalid-feedback">This field is required.</div><?php } ?>
        </div>
    </div>
    <div class="form-group row">
        <label for="song-notes" class="col-sm-2 col-form-label">Songs/Notes:</label>
        <div class="col-sm-10">
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="song-notes" name="songnotes">
                    <label class="custom-file-label" for="song-notes" id="song-notes-label">Choose file</label>
                </div>
            </div>
        </div>
    </div>
    <fieldset class="form-group">
        <div class="row">
            <label class="col-form-label col-sm-2 pt-0">Musicians:</label>
            <div class="col-sm-10">
                <?php if (empty($musicians)) : ?>
                    <p>No registered musicians.</p>
                <?php else : ?>
                    <?= form_error('musician[]') ? '<small style="color:#d9534f">Please choose a musician.</small>' : '' ?>
                    <?php foreach ($musicians as $musician) : ?>
                        <div class="custom-control custom-checkbox">
                            <input id="<?= 'user-' . $musician['id'] ?>" class="custom-control-input" type="checkbox" name="musician[]" value="<?= $musician['id'] ?>">
                            <label for="<?= 'user-' . $musician['id'] ?>" class="custom-control-label">
                                <?= $musician['name'] ?>
                            </label>
                        </div>
                <?php endforeach;
                endif; ?>
            </div>
        </div>
    </fieldset>
    <div class="container">
        <div class="row justify-content-end">
            <a class="btn btn-primary mr-3" href="<?= base_url() ?>">Go Back</a>
            <button type="submit" class="btn btn-primary">Create Gig</button>
        </div>
    </div>
    <?= form_close(); ?>
</div>