<h3>List of Gigs for</h3>
<h1><?= $this->session->userdata('user_name') ?></h1>

<div id="table">
    <div class="container">
        <?php if ($this->session->userdata('isAdmin')) : ?>
            <div style="text-align: right">
                <p id="add-gig">
                    <a href="<?= base_url() . 'gigs/create' ?>">
                        <span>Add New Gig</span>
                    </a>
                </p>
            </div>
        <?php endif; ?>
        <?php if (empty($gigs)) : ?>
            <div id="thead" class="row">
                <p><span>No gigs booked yet.</span></p>
            </div>
        <?php else :
            $perPage = 10;
            $page = isset($_GET['page']) ? intval($_GET['page'] - 1) : 0;
            $numberOfPages = intval(count($gigs) / $perPage) + 1;
        ?>
            <div id="thead" class="row">
                <p><span>Date</span></p>
                <p><span>Type</span></p>
                <p><span>Location</span></p>
                <p><span>Client</span></p>
                <p><span>Actions</span></p>
            </div>
            <?php foreach (array_slice($gigs, $page * $perPage, $perPage) as $gig) :
                $date = new DateTime($gig['date']); ?>
                <div class="row tbody">
                    <p><?= date_format($date, 'l, F jS, Y') ?></p>
                    <p><?= $gig['type'] ?></p>
                    <p><?= $gig['location'] ?></p>
                    <p><?= $gig['client'] ?></p>
                    <p>
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
                            <a href="<?= $gig['status'] == 1 ? '' : base_url() . 'gigs/accept/' . $gig['gig_id'] ?>">
                                <?= $gig['status'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-check"></i>' ?>
                            </a>
                            <a href="<?= !$gig['status'] ? '' : base_url() . 'gigs/reject/' . $gig['gig_id'] ?>">
                                <?= !$gig['status'] ? '<i class="fas fa-times-circle"></i>' : '<i class="fas fa-times"></i>' ?>
                            </a>
                        <?php endif; ?>
                    </p>
                </div>
        <?php endforeach;
        endif;  ?>
    </div>
</div>

<?php if (!empty($gigs)) : ?>
    <ul id="pagination" class="row justify-content-center">
        <li class="mr-2">
            <a href=""><i class="fas fa-chevron-left"></i></a>
        </li>
        <?php
        for ($i = 1; $i <= $numberOfPages; $i++) : ?>
            <li class="mr-2"><a href='./?page=<?= $i ?>'><?= $i ?></a></li>
        <?php endfor; ?>
        <li>
            <a href=""><i class="fas fa-chevron-right"></i></a>
        </li>
    </ul>
<?php endif; ?>