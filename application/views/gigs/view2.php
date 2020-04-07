<div style="text-align: right">
    <h5>Detailed worksheet for</h5>
    <h1><?= date_format(new DateTime($gig['date']), 'D M jS, Y') ?></h1>
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
                            <span class="start"><?= $gig['date'] ?></span>
                            <!--span class="end">12/18/2018 10:00 AM</span-->
                            <span class="allday">true</span>
                            <span class="title">[<?= $gig['type'] ?>] <?= $gig['client'] ?></span>
                            <span class="location"><?= $gig['location'] ?></span>
                        </span>
                    </a>
                    <?php if ($gig['status'] == 1 || $gig['status'] == -1) : ?>
                        <a <?= $gig['status'] == 1 ? '' : 'href="' . base_url() . 'gigs/accept/' . $gig['gig_id'] . '"' ?>>
                            <?= $gig['status'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-check"></i>' ?>
                            <small><?= $gig['status'] == 1 ? 'Accepted' : 'Accept' ?></small>
                        </a>
                    <?php endif; ?>
                    <?php if ($gig['status'] == 0 || $gig['status'] == -1) : ?>
                        <a <?= $gig['status'] == 0 ? '' : 'href="' . base_url() . 'gigs/reject/' . $gig['gig_id'] . '"' ?>>
                            <?= $gig['status'] == 0 ? '<i class="fas fa-times-circle"></i>' : '<i class="fas fa-times"></i>' ?>
                            <small><?= $gig['status'] == 0  ? 'Rejected' : 'Reject' ?></small>
                        </a>
                    <?php endif; ?>
                </th>
            </tr>
        </thead>
        <tbody id="gig-body">
            <tr>
                <td>Date</td>
                <td><?= date_format(new DateTime($gig['date']), 'l, F j, Y') ?></td>
            </tr>
            <tr>
                <td>Type</td>
                <td><?= $gig['type'] ?></td>
            </tr>
            <tr>
                <td>Location</td>
                <td><?= $gig['location'] ?></td>
            </tr>
            <tr>
                <td>Client</td>
                <td><?= $gig['client'] ?></td>
            </tr>
            <tr>
                <td>Schedule</td>
                <td><?= $gig['sched'] ?></td>
            </tr>
            <tr>
                <td>Pay</td>
                <td>{{ toCurrency(<?= $gig['pay'] ?>) }}</td>
            </tr>
            <tr>
                <td>Songs/Notes</td>
                <td>
                    <?php if (!empty($gig['file'])) : ?>
                        <a href="<?= base_url() . 'uploads/' . $gig['file'] ?>" download>
                            <i class="fas fa-download"></i> Download File
                        </a>
                    <?php else : ?>
                        None
                    <?php endif; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>