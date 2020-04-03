<h3>Add a new</h3>
<h1>Musician</h1>

<div id="table">
    <div class="container" style="text-align: right">
        <?php echo validation_errors();
        echo form_open('musicians/create'); ?>
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" placeholder="Type here">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" placeholder="Type here">
        </div>
        <input type="hidden" name="password" :value="generatePassword">
        <a class="btn" href="<?= base_url() ?>musicians">Go Back</a>
        <button type="submit">Register Musician</button>
        </form>
    </div>
</div>