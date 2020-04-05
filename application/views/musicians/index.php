<h3>Mister Shakes</h3>
<h1>Musicians</h1>

<div id="table">
    <div class="container">
        <div style="text-align: right">
            <p id="add-gig">
                <a href="<?= base_url() . 'musicians/create' ?>">
                    <span>Add Musician</span>
                </a>
            </p>
        </div>
        <?php if (empty($musicians)) : ?>
            <div id="thead" class="row">
                <p><span>No musicians registered yet.</span></p>
            </div>
        <?php else :
            $perPage = 10;
            $page = isset($_GET['page']) ? intval($_GET['page'] - 1) : 0;
            $numberOfPages = intval(count($musicians) / $perPage) + 1;
        ?>
            <div id="thead" class="row">
                <p><span>Name</span></p>
                <p><span>Email</span></p>
                <p><span>Action</span></p>
            </div>
            <?php foreach (array_slice($musicians, $page * $perPage, $perPage) as $musician) : ?>
                <div class="row tbody">
                    <p><?= $musician['name'] ?></p>
                    <p><?= $musician['email'] ?></p>
                    <div style="flex: 1 1 15%;">
                        <a href="<?= base_url() ?>musicians/delete/<?= $musician['id'] ?>">
                            <i class="far fa-trash-alt"></i> Remove access
                        </a>
                        <form action="<?= base_url() ?>musicians/edit/<?= $musician['id'] ?>" method="post">
                            <input type="hidden" name="password" :value="generatePassword">
                            <button id="link2" type="submit"><i class="fas fa-key"></i> Generate new password</button>
                        </form>
                    </div>
                </div>
        <?php endforeach;
        endif; ?>
    </div>
</div>

<?php if (!empty($musicians)) : ?>
    <ul id="pagination" class="row justify-content-center">
        <li class="mr-2">
            <a :href="page === 1 ? page : null"><i class="fas fa-chevron-left" style="color: grey"></i></a>
        </li>
        <?php
        for ($i = 1; $i <= $numberOfPages; $i++) : ?>
            <li class="mr-2"><a href='<?= base_url() ?>musicians/?page=<?= $i ?>'><?= $i ?></a></li>
        <?php endfor; ?>
        <li>
            <a :href="page * 1 + 1"><i class="fas fa-chevron-right"></i></a>
        </li>
    </ul>
<?php endif; ?>