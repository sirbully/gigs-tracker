<div style="text-align: right">
    <h5>history of</h5>
    <h1>Activity</h1>
</div>
<?php if (empty($activity)) : ?>
    <h3 class="mt-3">No activity yet.</h3>
<?php else : ?>
    <table id="gig-view" class="table my-5">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Activity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($activity as $act) : ?>
                <tr>
                    <td><?= date_format(new DateTime($act['created']), 'F j, Y, h:iA') ?></td>
                    <td><?= $act['message'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>