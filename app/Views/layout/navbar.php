<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <div class="container">
        <div class="d-flex">
            <img src="https://i.pinimg.com/originals/ce/a8/5c/cea85c47f6ce90ed44af5ba0cdb782ee.png" style="width: 40px;">
            <a class="mx-2 navbar-brand" href="/">Pet Station</a>
        </div>

        <!-- <div id="navbarNav"> -->
        <ul class="navbar-nav ml-auto d-flex flex-row">
            <li class="nav-item mx-2">
                <a class="nav-link" href="/pets">Pets</a>
            </li>
            <li class="nav-item mx-2">
                <a class="nav-link" href="/users">Users</a>
            </li>
        </ul>
        <!-- </div> -->
    </div>
</nav>

<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('message'); ?>
    </div>
<?php endif ?>