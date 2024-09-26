<?php wpmez_partials('view.header'); ?>
<div class="container wpackage_unsocials mt-3">
    <div class="row">
        <?php foreach (wpmez_navigation_app() as $key => $value) { ?>
            <div class="col-md-4">
                <div class="app col p-4 d-flex flex-column position-static" style="background-image: url('<?= $value["Media"] ?>');">
                    <div>
                        <h3><?= $value["Title"] ?></h3>
                        <p style="color:#fff;"><?= $value["Description"] ?></p>
                        <a href="admin.php?page=<?= $value["Url"] ?>" class="mt-2 icon-link gap-1">Entra</a>
                    </div>
                </div>
            </div>
        <?php }; ?>
    </div>
</div>