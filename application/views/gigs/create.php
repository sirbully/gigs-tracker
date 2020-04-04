<h3>Create new gig for</h3>
<h1>Elliot rooney</h1>

<div id="table">
    <div class="container" style="text-align: right">
        <?php if (validation_errors()) : echo "<p style='color:red'>Please input the required fields.</p>";
        endif;
        echo form_open('gigs/create'); ?>
        <div class="form-group">
            <label <?= form_error('date') ? 'style="background:#E8072A"' : '' ?>>Date:</label>
            <input id="datepicker" <?= form_error('date') ? 'style="border: 2px solid #E8072A"' : '' ?> type="text" name="date" placeholder="Click here" value="<?= set_value('date'); ?>">
        </div>
        <div class="form-group">
            <label <?= form_error('type') ? 'style="background:#E8072A"' : '' ?>>Type:</label>
            <input type="text" <?= form_error('type') ? 'style="border: 2px solid #E8072A"' : '' ?> name="type" placeholder="Type here" value="<?= set_value('type'); ?>">
        </div>
        <div class="form-group">
            <label <?= form_error('location') ? 'style="background:#E8072A"' : '' ?>>Location:</label>
            <input type="text" <?= form_error('location') ? 'style="border: 2px solid #E8072A"' : '' ?> name="location" placeholder="Type here" value="<?= set_value('location'); ?>">
        </div>
        <div class="form-group">
            <label <?= form_error('client') ? 'style="background:#E8072A"' : '' ?>>Client:</label>
            <input type="text" <?= form_error('client') ? 'style="border: 2px solid #E8072A"' : '' ?> name="client" placeholder="Type here" value="<?= set_value('client'); ?>">
        </div>
        <div class="form-group">
            <label <?= form_error('dress') ? 'style="background:#E8072A"' : '' ?>>Dresscode:</label>
            <input type="text" <?= form_error('dress') ? 'style="border: 2px solid #E8072A"' : '' ?> name="dress" placeholder="Type here" value="<?= set_value('dress'); ?>">
        </div>
        <div class="form-group">
            <label <?= form_error('pay') ? 'style="background:#E8072A"' : '' ?>>Pay:</label>
            <input type="number" <?= form_error('pay') ? 'style="border: 2px solid #E8072A"' : '' ?> name="pay" placeholder="Type here" value="<?= set_value('pay'); ?>">
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
                        <input type="checkbox" name="musician[]" value="<?= $musician['id'] ?>" <?= set_value('musician[]') == $musician['id'] ? 'checked' : '' ?>>
                        <span class="checkmark"></span>
                    </label>
            <?php endforeach;
            endif; ?>
        </div>
        <a class="btn" href="<?= base_url() ?>">Go Back</a>
        <button type="submit">Add Gig</button>
        </form>
    </div>
</div>