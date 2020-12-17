<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col mt-5 d-flex justify-content-center">
            <div class="card shadow" style="width: 18rem;">
                <img src="/img/<?= $pet['photo']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $pet['name']; ?></h5>
                    <p class="card-text">Species : <?= $pet['species']; ?></p>
                    <p class="card-text">Birth Year : <?= $pet['birth_year']; ?></p>
                    <div class="d-flex justify-content-between mb-4">
                        <a href="/pets/edit/<?= $pet['id']; ?>" class="btn btn-warning" style="width: 90px;">Edit</a>

                        <form action="/pets/<?= $pet['id']; ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger" style="width: 90px;" onclick="return confirm('this cannot be revert, are you sure?')">Delete</button>
                        </form>
                    </div>
                    <a href="/pets" class="mt-4">Back to home</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>