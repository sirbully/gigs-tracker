<h3>Create new gig for</h3>
<h1>Elliot rooney</h1>

<?php echo validation_errors();

echo form_open('gigs/create'); ?>
<div class="form-group">
    <label>Date:</label>
    <vuejs-datepicker></vuejs-datepicker>
</div>
<div class="form-group">
    <label>Type:</label>
    <input type="text">
</div>
<div class="form-group">
    <label>Location:</label>
    <input type="text">
</div>
<div class="form-group">
    <label>Client:</label>
    <input type="text">
</div>
<div class="form-group">
    <label>Dress</label>
    <input type="text">
</div>
<div class="form-group">
    <label>Pay</label>
    <input type="number">
</div>
</form>