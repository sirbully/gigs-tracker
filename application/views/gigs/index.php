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
                        <a href="">
                            <i class="far fa-calendar-plus"></i>
                        </a>
                        <?php if ($this->session->userdata('isAdmin')) : ?>
                            <a href="<?= base_url() ?>gigs/edit/<?= $gig['id'] ?>">
                                <i class="far fa-edit"></i>
                            </a>
                            <a href="<?= base_url() ?>gigs/delete/<?= $gig['id'] ?>">
                                <i class="far fa-trash-alt"></i>
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