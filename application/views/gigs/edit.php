<h3>Edit gig for</h3>
<h1>Elliot rooney</h1>

<div id="table">
    <div class="container" style="text-align: right">
        <?php if (validation_errors()) "<p style='color:red'>Please input the required fields.</p>";
        echo form_open('gigs/edit/' . $gig[0]['gig_id']); ?>
        <div class="form-group">
            <label style="<?= form_error('date') ? 'background:#E8072A' : '' ?>">Date:</label>
            <input id="datepicker" style="<?= form_error('date') ? 'border: 2px solid #E8072A' : '' ?>" type="text" name="date" value="<?= $gig[0]['date'] ?>">
        </div>
        <div class="form-group">
            <label style="<?= form_error('type') ? 'background:#E8072A' : '' ?>">Type:</label>
            <input type="text" style="<?= form_error('type') ? 'border: 2px solid #E8072A' : '' ?>" name="type" value="<?= $gig[0]['type'] ?>">
        </div>
        <div class="form-group">
            <label style="<?= form_error('location') ? 'background:#E8072A' : '' ?>">Location:</label>
            <input type="text" style="<?= form_error('location') ? 'border: 2px solid #E8072A' : '' ?>" name="location" value="<?= $gig[0]['location'] ?>">
        </div>
        <div class="form-group">
            <label style="<?= form_error('client') ? 'background:#E8072A' : '' ?>">Client:</label>
            <input type="text" style="<?= form_error('client') ? 'border: 2px solid #E8072A' : '' ?>" name="client" value="<?= $gig[0]['client'] ?>">
        </div>
        <div class="form-group">
            <label style="<?= form_error('dress') ? 'background:#E8072A' : '' ?>">Dress Code:</label>
            <input type="text" style="<?= form_error('dress') ? 'border: 2px solid #E8072A' : '' ?>" name="dress" value="<?= $gig[0]['dress'] ?>">
        </div>
        <div class="form-group">
            <label style="<?= form_error('pay') ? 'background:#E8072A' : '' ?>">Pay:</label>
            <input type="number" style="<?= form_error('pay') ? 'border: 2px solid #E8072A' : '' ?>" name="pay" value="<?= $gig[0]['pay'] ?>">
        </div>
        <div class="form-group justify-content-start">
            <label style="<?= form_error('musician[]') ? 'background:#E8072A' : '' ?>">Musicians:</label>
        </div>
        <div style="text-align:left; margin-bottom: 2rem;">
            <?= '<div class="mb-3" style="color:red">' . form_error('musician[]') . '</div>' ?>
            <?php if (empty($musicians)) : ?>
                <p>No registered musicians.</p>
                <?php else :
                foreach ($musicians as $musician) : ?>
                    <label class="check-input"><?= $musician['name'] ?>
                        <input type="checkbox" name="musician[]" value="<?= $musician['id'] ?>" <?php foreach ($gig as $g) {
                                                                                                    echo $g['user_id'] == $musician['id'] ? 'checked' : '';
                                                                                                } ?>>
                        <span class="checkmark"></span>
                    </label>
            <?php endforeach;
            endif; ?>
        </div>
        <a class="btn" href="<?= base_url() ?>">Go Back</a>
        <button type="submit">Edit Gig</button>
        </form>
    </div>
</div>