<h3>Detailed worksheet for</h3>
<h1><?= date_format(new DateTime($gig['date']), 'D M jS, Y') ?></h1>

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
                <?php if ($gig['status'] == -1) : ?>
                    <a href="<?= $gig['status'] == 1 ? '' : base_url() . 'gigs/accept/' . $gig['gig_id'] ?>">
                        <?= $gig['status'] == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-check"></i>' ?>
                        <small><?= $gig['status'] == 1 ? 'Accepted' : 'Accept' ?></small>
                    </a>
                    <a href="<?= !$gig['status'] ? '' : base_url() . 'gigs/reject/' . $gig['gig_id'] ?>">
                        <?= !$gig['status'] ? '<i class="fas fa-times-circle"></i>' : '<i class="fas fa-times"></i>' ?>
                        <small><?= !$gig['status'] ? 'Rejected' : 'Reject' ?></small>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="row trow">
            <p>Date</p>
            <p><?= date_format(new DateTime($gig['date']), 'l F j, Y') ?></p>
        </div>
        <div class="row trow">
            <p>Type</p>
            <p><?= $gig['type'] ?></p>
        </div>
        <div class="row trow">
            <p>Location</p>
            <p><?= $gig['location'] ?></p>
        </div>
        <div class="row trow">
            <p>Client</p>
            <p><?= $gig['client'] ?></p>
        </div>
        <div class="row trow">
            <p>Dresscode</p>
            <p><?= $gig['dress'] ?></p>
        </div>
        <div class="row trow">
            <p>Pay</p>
            <p>{{ toCurrency(<?= $gig['pay'] ?>) }}</p>
        </div>
    </div>
</div>