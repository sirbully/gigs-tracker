<h3>history of</h3>
<h1>Activity</h1>

<div id="table">
    <div class="container">
        <?php if (empty($activity)) : ?>
            <div id="thead" class="row">
                <p><span>No activity yet.</span></p>
            </div>
        <?php else : ?>
            <div id="thead" class="row">
                <p style="flex: 1 1 10%"><span>Date</span></p>
                <p style="flex: 2 1 50%"><span>Activity</span></p>
            </div>
            <?php foreach ($activity as $act) : ?>
                <div class="row tbody">
                    <p style="flex: 1 1 10%"><?= date_format(new DateTime($act['created']), 'F j, Y, h:iA') ?></p>
                    <p style="flex: 2 1 50%"><?= $act['message'] ?></p>
                </div>
        <?php endforeach;
        endif; ?>
    </div>
</div>