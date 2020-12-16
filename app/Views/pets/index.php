<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container mt-5">
    <a href="/pets/create" class="btn btn-primary mb-4">Add New Comic</a>
    <table class="table table-striped shadow">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pets as $data) : ?>
                <tr>
                    <th scope="row"><?= $data["id"]; ?></th>
                    <td style="width: 30%;">
                        <img src="/img/<?= $data["photo"]; ?>" alt="thumbnail" class="img-thumbnail thumbnail" style="width: 200px;">
                    </td>
                    <td><?= $data["name"]; ?></td>
                    <td>
                        <a href="/pets/<?= $data['id']; ?>" class="btn btn-primary">Detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>