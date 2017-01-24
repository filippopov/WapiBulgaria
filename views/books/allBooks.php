<?php
/**
 * @var \FPopov\Core\ViewInterface $this
 */
$uriJunk = isset($uriJunk) ? $uriJunk : '';
$getParams = isset($getParams) ? $getParams : '';
?>

<div class="container allBooksContainer">
    <div id="tablesContainer" class="col-md-12">
        <?php require 'views/partials/myGrid/table.php'; ?>
    </div>

    <?php require 'views/partials/myGrid/pagination.php' ?>
</div>
