<h3>List of Gigs for</h3>
<h1>Elliot rooney</h1>

<p id="add-gig">
    <a href="<?= base_url() . 'gigs/create' ?>">
        <span>Add New Gig</span>
    </a>
</p>
<div id="table">
    <div class="container">
        <div id="thead" class="row">
            <p><span>Date</span></p>
            <p><span>Type</span></p>
            <p><span>Location</span></p>
            <p><span>Client</span></p>
            <p><span>Status</span></p>
            <p><span>Actions</span></p>
        </div>
        <?php
        $perPage = 10;
        $page = isset($_GET['page']) ? intval($_GET['page'] - 1) : 0;
        $numberOfPages = intval(count($gigs) / $perPage) + 1;
        foreach (array_slice($gigs, $page * $perPage, $perPage) as $gig) :
            $date = new DateTime($gig['date']); ?>
            <div class="row tbody">
                <p><?= date_format($date, 'l, F jS, Y') ?></p>
                <p><?= $gig['type'] ?></p>
                <p><?= $gig['location'] ?></p>
                <p><?= $gig['client'] ?></p>
                <p><?= $gig['status'] === '1' ? 'Confirmed' : 'Canceled' ?></p>
                <p>
                    <a href="<?= base_url() . 'gigs/' . $gig['id'] ?>"><i class="far fa-eye"></i></a>
                    <a href=""><i class="far fa-calendar-plus"></i></a>
                    <a href=""><i class="far fa-edit"></i></a>
                    <a href=""><i class="far fa-times-circle"></i></a>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</div>

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