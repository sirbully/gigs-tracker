<h3>Create new gig for</h3>
<h1>Elliot rooney</h1>

<div id="table">
    <div class="container" style="text-align: right">
        <?php echo validation_errors();
        echo form_open('gigs/create'); ?>
        <div class="form-group">
            <label>Date:</label>
            <input id="datepicker" type="text" name="date" placeholder="Click here">
        </div>
        <div class="form-group">
            <label>Type:</label>
            <input type="text" name="type" placeholder="Type here">
        </div>
        <div class="form-group">
            <label>Location:</label>
            <input type="text" name="location" placeholder="Type here">
        </div>
        <div class="form-group">
            <label>Client:</label>
            <input type="text" name="client" placeholder="Type here">
        </div>
        <div class="form-group">
            <label>Dress</label>
            <input type="text" name="dress" placeholder="Type here">
        </div>
        <div class="form-group">
            <label>Pay</label>
            <input type="number" name="pay" placeholder="Type here">
        </div>
        <a class="btn" href="<?= base_url() ?>">Go Back</a>
        <button type="submit">Add Gig</button>
        </form>
    </div>
</div>