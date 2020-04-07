<div style="text-align: right">
    <h5>List of Gigs for</h5>
    <h1><?= $this->session->userdata('user_name') ?></h1>
</div>

<?php if ($this->session->userdata('isAdmin')) : ?>
    <div class="d-flex">
        <a style="color: #fff" class="btn btn-primary" href="<?= base_url() . 'gigs/create' ?>">
            <i class="fas fa-plus"></i> Add New Gig
        </a>
    </div>
<?php endif; ?>
<?php if (empty($gigs)) : ?>
    <h3 class="mt-3">No gigs booked yet.</h3>
<?php else : ?>
    <div class="table-responsive-sm mb-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Type</th>
                    <th scope="col">Location</th>
                    <th scope="col">Client</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gigs as $gig) :
                    $date = new DateTime($gig['date']); ?>
                    <tr>
                        <td><?= date_format($date, 'F jS, Y, l') ?></td>
                        <td><?= $gig['type'] ?></td>
                        <td><?= $gig['location'] ?></td>
                        <td><?= $gig['client'] ?></td>
                        <td>
                            <a href="<?= base_url() . 'gigs/' . $gig['id'] ?>">
                                <i class="far fa-eye"></i>
                            </a>
                            <a class="add-to-calendar">
                                <span class="start"><?= $gig['date'] ?></span>
                                <!--span class="end">12/18/2018 10:00 AM</span-->
                                <span class="allday">true</span>
                                <span class="title">[<?= $gig['type'] ?>] <?= $gig['client'] ?></span>
                                <span class="location"><?= $gig['location'] ?></span>
                            </a>
                            <?php if ($this->session->userdata('isAdmin')) : ?>
                                <a href="<?= base_url() ?>gigs/edit/<?= $gig['id'] ?>">
                                    <i class="far fa-edit"></i>
                                </a>
                                <a href="<?= base_url() ?>gigs/delete/<?= $gig['id'] ?>">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (!$this->session->userdata('isAdmin')) : ?>
                                <?php if ($gig['status'] == 1 || $gig['status'] == -1) : ?>
                                    <a <?= $gig['status'] == 1 ? '' : 'href="' . base_url() . 'gigs/accept/' . $gig['gig_id'] . '"' ?>>
                                        <?= $gig['status'] == 1 ? '<i class="fas fa-check-circle"></i> Accepted' : '<i class="fas fa-check"></i>' ?>
                                    </a>
                                <?php endif; ?>
                                <?php if ($gig['status'] == 0 || $gig['status'] == -1) : ?>
                                    <a <?= !$gig['status'] ? '' : 'href="' . base_url() . 'gigs/reject/' . $gig['gig_id'] . '"' ?>>
                                        <?= !$gig['status'] ? '<i class="fas fa-times-circle"></i> Rejected' : '<i class="fas fa-times"></i>' ?>
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif;  ?>