<h3>Edit gig for</h3>
<h1>Elliot rooney</h1>

<div id="table">
    <div class="container" style="text-align: right">
        <?php echo validation_errors();
        echo form_open('gigs/edit/' . $gig['id']); ?>
        <div class="form-group">
            <label>Date:</label>
            <input id="datepicker" type="text" name="date" value="<?= $gig['date'] ?>">
        </div>
        <div class="form-group">
            <label>Type:</label>
            <input type="text" name="type" value="<?= $gig['type'] ?>">
        </div>
        <div class="form-group">
            <label>Location:</label>
            <input type="text" name="location" value="<?= $gig['location'] ?>">
        </div>
        <div class="form-group">
            <label>Client:</label>
            <input type="text" name="client" value="<?= $gig['client'] ?>">
        </div>
        <div class="form-group">
            <label>Dress Code:</label>
            <input type="text" name="dress" value="<?= $gig['dress'] ?>">
        </div>
        <div class="form-group">
            <label>Pay:</label>
            <input type="number" name="pay" value="<?= $gig['pay'] ?>">
        </div>
        <a class="btn" href="<?= base_url() ?>">Go Back</a>
        <button type="submit">Edit Gig</button>
        </form>
    </div>
</div>