<div style="text-align: right">
    <h5>Mister Shakes</h5>
    <h1>Musicians</h1>
</div>

<div class="d-flex">
    <a style="color: #fff" class="btn btn-primary" href="<?= base_url() . 'musicians/create' ?>">
        <i class="fas fa-plus"></i> Add Musician
    </a>
</div>
<?php if (empty($musicians)) : ?>
    <h3 class="mt-3">No musicians registered yet.</h3>
<?php else : ?>
    <div class="table-responsive-sm mb-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($musicians as $musician) : ?>
                    <tr>
                        <td><?= $musician['name'] ?></td>
                        <td><?= $musician['email'] ?></td>
                        <td>
                            <a href="<?= base_url() ?>musicians/delete/<?= $musician['id'] ?>">
                                <i class="far fa-trash-alt"></i> Remove access
                            </a>
                            <?= form_open('musicians/edit' . $musician['id']); ?>
                            <input type="hidden" name="password" :value="generatePassword">
                            <button class="custom-btn" style="text-align: left" type="submit"><i class="fas fa-key"></i> Generate new password</button>
                            <?= form_close(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>