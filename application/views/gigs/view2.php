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
                <span id="calendar-style">
                    <span class="add-to-calendar">
                        <span class="start"><?= $gig['date'] ?></span>
                        <!--span class="end">12/18/2018 10:00 AM</span-->
                        <span class="allday">true</span>
                        <span class="title">[<?= $gig['type'] ?>] <?= $gig['client'] ?></span>
                        <span class="location"><?= $gig['location'] ?></span>
                    </span>
                    <small>Calendar</small>
                </span>
                <?php if (!$this->session->userdata('isAdmin')) : ?>
                    <?php if ($gig['status'] == 1 || $gig['status'] == -1) : ?>
                        <a <?= $gig['status'] == 1 ? '/' : 'href="' . base_url() . 'gigs/accept/' . $gig['gig_id'] . '"' ?>>
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