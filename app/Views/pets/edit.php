<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8 mt-5">
            <h2>Edit Pet Data</h2>

            <form action="/pets/update/<?= $pet['id']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="photoOld" value="<?= $pet['photo']; ?>">
                <div class="form-group row">
                    <label for="title" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : ''; ?>" name="name" id="name" value="<?= old('name') ? old('name') : $pet['name']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="author" class="col-sm-2 col-form-label">species</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="species" id="species" value="<?= old('species') ? old('species') : $pet['species']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="publisher" class="col-sm-2 col-form-label">Birth Year</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="birth_year" id="birth_year" value="<?= old('birth_year') ? old('birth_year') : $pet['birth_year']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $pet['photo']; ?>" alt="photo" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8 ">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= $validation->hasError('photo') ? 'is-invalid' : ''; ?>" id="photo" name="photo" onchange="preview()">
                            <div class="invalid-feedback">
                                <?= $validation->getError('photo'); ?>
                            </div>
                            <label class="custom-file-label" for="photo"><?= $pet['photo']; ?></label>
                        </div>
                    </div>
                </div>



                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>