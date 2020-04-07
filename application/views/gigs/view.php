<div style="text-align: right">
    <h5>Detailed worksheet for</h5>
    <h1><?= date_format(new DateTime($gig[0]['date']), 'D M jS, Y') ?></h1>
</div>

<div class="table-responsive-sm my-5">
    <table id="gig-view" class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col"><i class="fas fa-info-circle"></i> Basic Info</th>
                <th scope="col" style="text-align: right;">
                    <a href="<?= base_url() ?>gigs">
                        <i class="fas fa-arrow-left"></i>
                        <small>Go Back</small>
                    </a>
                    <a id="calendar-style">
                        <span class="add-to-calendar">
                            <span class="start"><?= $gig[0]['date'] ?></span>
                            <!--span class="end">12/18/2018 10:00 AM</span-->
                            <span class="allday">true</span>
                            <span class="title">[<?= $gig[0]['type'] ?>] <?= $gig[0]['client'] ?></span>
                            <span class="location"><?= $gig[0]['location'] ?></span>
                        </span>
                    </a>
                    <a href="<?= base_url() ?>gigs/edit/<?= $gig[0]['gig_id'] ?>">
                        <i class="far fa-edit"></i>
                        <small>Edit</small>
                    </a>
                    <a href="<?= base_url() ?>gigs/delete/<?= $gig[0]['gig_id'] ?>">
                        <i class="far fa-trash-alt"></i>
                        <small>Delete</small>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody id="gig-body">
            <tr>
                <td>Date</td>
                <td><?= date_format(new DateTime($gig[0]['date']), 'l, F j, Y') ?></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><?= $gig[0]['type'] ?></td>
            </tr>
            <tr>
                <td>Location</td>
                <td><?= $gig[0]['location'] ?></td>
            </tr>
            <tr>
                <td>Client</td>
                <td><?= $gig[0]['client'] ?></td>
            </tr>
            <tr>
                <td>Schedule</td>
                <td><?= $gig[0]['sched'] ?></td>
            </tr>
            <tr>
                <td>Pay</td>
                <td>{{ toCurrency(<?= $gig[0]['pay'] ?>) }}</td>
            </tr>
            <tr>
                <td>Songs/Notes</td>
                <td>
                    <?php if (!empty($gig[0]['file'])) : ?>
                        <a href="<?= base_url() . 'uploads/' . $gig[0]['file'] ?>" download>
                            <i class="fas fa-download"></i> Download File
                        </a>
                    <?php else : ?>
                        None
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Musicians</td>
                <td id="musicians">
                    <?php foreach ($gig as $g) : ?>
                        <span><?= $g['name'] ?><?= ($g['status'] == -1 ? '' : ($g['status'] == 1 ? ' <i class="fas fa-check-circle"></i>' : ' <i class="fas fa-times-circle"></i>')) ?></span>
                    <?php endforeach; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>