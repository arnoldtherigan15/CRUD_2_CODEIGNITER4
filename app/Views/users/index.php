<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <h3>User List</h3>
            <form method="submit">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="keywoard" placeholder="Search User ....">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $data) : ?>
                        <tr>
                            <th scope="row"><?= $data["id"]; ?></th>
                            <td><?= $data["name"]; ?></td>
                            <td><?= $data["address"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?= $pager->links('users', 'user_pagination'); ?>
</div>
<?= $this->endSection(); ?>