<h3>Detailed worksheet for</h3>
<h1><?= date_format(new DateTime($gig[0]['date']), 'D M jS, Y') ?></h1>

<div id="table">
    <div class="container">
        <div id="thead" class="row align-items-center justify-content-between">
            <p class="d-flex align-items-center">
                <i class="fas fa-info-circle"></i>
                <span>Basic Info</span>
            </p>
            <div id="view-action">
                <a href="<?= base_url() ?>gigs">
                    <i class="fas fa-arrow-left"></i>
                    <small>Go Back</small>
                </a>
                <a>
                    <i class="far fa-calendar-plus"></i>
                    <small>Calendar</small>
                </a>
                <?php if ($this->session->userdata('isAdmin')) : ?>
                    <a href="<?= base_url() ?>gigs/edit/<?= $gig[0]['gig_id'] ?>">
                        <i class="far fa-edit"></i>
                        <small>Edit</small>
                    </a>
                    <a href="<?= base_url() ?>gigs/delete/<?= $gig[0]['gig_id'] ?>">
                        <i class="far fa-trash-alt"></i>
                        <small>Delete</small>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row trow">
            <p>Date</p>
            <p><?= date_format(new DateTime($gig[0]['date']), 'l F j, Y') ?></p>
        </div>
        <div class="row trow">
            <p>Type</p>
            <p><?= $gig[0]['type'] ?></p>
        </div>
        <div class="row trow">
            <p>Location</p>
            <p><?= $gig[0]['location'] ?></p>
        </div>
        <div class="row trow">
            <p>Client</p>
            <p><?= $gig[0]['client'] ?></p>
        </div>
        <div class="row trow">
            <p>Dresscode</p>
            <p><?= $gig[0]['dress'] ?></p>
        </div>
        <div class="row trow">
            <p>Pay</p>
            <p>{{ toCurrency(<?= $gig[0]['pay'] ?>) }}</p>
        </div>
        <div class="row trow">
            <p>Musicians</p>
            <p id="p-musicians">
                <?php foreach ($gig as $g) : ?>
                    <span><?= $g['name'] ?> <?= ($g['status'] == -1 ? '' : ($g['status'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>')) ?></span>
                <?php endforeach; ?>
            </p>
        </div>
    </div>
</div>