<?php
/** @var \FPopov\Core\ViewInterface $this */
/** @var \FPopov\Models\View\Book\BookViewModel[] $model */
$uriJunk = isset($uriJunk) ? $uriJunk : '';
$paginationData = isset($paginationData) ? $paginationData : [];


$page = (int) isset($paginationData['page']) ? $paginationData['page'] : 0;

$onPage = \FPopov\Services\Book\BookService::LIMIT_ROWS_ON_PAGE;
$total = isset($paginationData['total']) ? $paginationData['total'] : 5;

$totalPage = ceil($total / $onPage);

$hasPrevious = $page > 0;
$hasNext = $totalPage > $page + 1;
?>

<div class="container allBooksContainer">
    <div id="tablesContainer">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Resume</th>
                    <th>Pages</th>
                    <th>Book Format</th>
                    <th>ISBN</th>
                    <th>Publish Date</th>
                    <th>Publisher</th>
                    <th>Edit Book</th>
                    <th>Delete Book</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model as $bookData) : ?>
                    <tr>
                        <th scope="row"><?php echo $bookData->getId()?></th>
                        <td><img class="grid-book" src="<?php echo $this->image($bookData->getImagePath())?>"></td>
                        <td><p class="grid-book"><?php echo $bookData->getBookTitle()?></p></td>
                        <td><p class="grid-book"><?php echo $bookData->getAuthor()?></p></td>
                        <td><p class="grid-book"><?php echo $bookData->getResume()?></p></td>
                        <td><p class="grid-book"><?php echo $bookData->getPageCount()?></p></td>
                        <td><p class="grid-book"><?php echo $bookData->getNameFormat()?></p></td>
                        <td><p class="grid-book"><?php echo $bookData->getIsbn()?></p></td>
                        <td><p class="grid-book"><?php echo $bookData->getPublishDate()?></p></td>
                        <td><p class="grid-book"><?php echo $bookData->getPublisher()?></p></td>
                        <td><p class="grid-book"><a class="btn btn-primary">Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></p></td>
                        <td><p class="grid-book"><a class="btn btn-primary">Delete <i class="fa fa-times" aria-hidden="true"></i></a></p></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation" class="nav-pagination">
        <ul class="pagination" >
            <li>
                <?php if ($hasPrevious) : ?>
                    <a href="<?php echo $this->generatePageUrl($page - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                <?php endif; ?>
            </li>
            <?php if ($page > 5) : ?>
                <li><span>...</span></li>
            <?php endif; ?>
            <?php for ($i = ($page - 5 > 1 ? $page - 5 : 1); $i <= ($totalPage > $page + 5 ? $page + 5 : $totalPage); $i++) : ?>
                <li class="<?php echo $page == $i - 1 ? 'active' : ''; ?>">
                    <a href="<?php echo $this->generatePageUrl($i - 1); ?>">
                        <?php echo $i; ?>
                    </a>
                </li>
            <?php endfor; ?>
            <?php if ($totalPage - $page > 5) : ?>
                <li><span>...</span></li>
            <?php endif; ?>
            <li>
                <?php if ($hasNext) : ?>
                    <a href="<?php echo $this->generatePageUrl($page + 1); ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</div>










