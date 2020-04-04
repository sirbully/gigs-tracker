<h3>Edit gig for</h3>
<h1>Elliot rooney</h1>

<div id="table">
    <div class="container" style="text-align: right">
        <?php if (validation_errors()) : echo "<p style='color:red'>Please input the required fields.</p>";
        endif;
        echo form_open('gigs/edit/' . $gig[0]['gig_id']); ?>
        <div class="form-group">
            <label <?= form_error('date') ? 'style="background:#E8072A"' : '' ?>>Date:</label>
            <input id="datepicker" <?= form_error('date') ? 'style="border: 2px solid #E8072A"' : '' ?> type="text" name="date" value="<?= $gig[0]['date'] ?>">
        </div>
        <div class="form-group">
            <label <?= form_error('type') ? 'style="background:#E8072A"' : '' ?>>Type:</label>
            <input type="text" <?= form_error('type') ? 'style="border: 2px solid #E8072A"' : '' ?>" name="type" value="<?= $gig[0]['type'] ?>">
        </div>
        <div class="form-group">
            <label <?= form_error('location') ? 'style="background:#E8072A"' : '' ?>>Location:</label>
            <input type="text" <?= form_error('location') ? 'style="border: 2px solid #E8072A"' : '' ?>" name="location" value="<?= $gig[0]['location'] ?>">
        </div>
        <div class="form-group">
            <label <?= form_error('client') ? 'style="background:#E8072A"' : '' ?>>Client:</label>
            <input type="text" <?= form_error('client') ? 'style="border: 2px solid #E8072A"' : '' ?>" name="client" value="<?= $gig[0]['client'] ?>">
        </div>
        <div class="form-group">
            <label <?= form_error('dress') ? 'style="background:#E8072A"' : '' ?>>Dress Code:</label>
            <input type="text" <?= form_error('dress') ? 'style="border: 2px solid #E8072A"' : '' ?>" name="dress" value="<?= $gig[0]['dress'] ?>">
        </div>
        <div class="form-group">
            <label <?= form_error('pay') ? 'style="background:#E8072A"' : '' ?>>Pay:</label>
            <input type="number" <?= form_error('pay') ? 'style="border: 2px solid #E8072A"' : '' ?>" name="pay" value="<?= $gig[0]['pay'] ?>">
        </div>
        <div class="form-group justify-content-start">
            <label <?= form_error('musician[]') ? 'style="background:#E8072A"' : '' ?>>Musicians:</label>
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