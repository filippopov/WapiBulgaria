<?php

/**
 * @var \FPopov\Core\ViewInterface $this
 */

$filter = isset($model['filter']) ? $model['filter'] : array();

$aFilter = isset($filter['filter']) ? $filter['filter'] : array();
$iPage = isset($aFilter['page']) ? $aFilter['page'] : 1;
$iOnPage = isset($aFilter['onPage']) ? $aFilter['onPage'] : 10;
$iTotal = isset($filter['total']) ? $filter['total'] : 0;
$iTotalPage = ceil($iTotal / $iOnPage);

$hasPrevious = $iPage > 1;
$haNext = $iTotalPage > $iPage;
?>


<nav aria-label="..." class="nav-pagination">
    <ul class="pagination">
        <li class="page-item <?php echo $hasPrevious ? 'disabled' : ''?>">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <?php for ($i = ($iPage - 5 > 1 ? $iPage - 5 : 1); $i <= ($iTotalPage > $iPage + 5 ? $iPage + 5 : $iTotalPage); $i++) : ?>
            <li class="page-item <?php echo $iPage == $i ? 'active' : ''; ?>">
                <a class="page-link" href="<?php echo $this->generatePageUrl($i, $filter); ?>">
                    <?php echo $i; ?>
                </a>
            </li>
        <?php endfor; ?>
        <li class="page-item" <?php echo $hasPrevious ? 'disabled' : ''?>>
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>