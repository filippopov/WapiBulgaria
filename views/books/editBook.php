<?php
/** @var \FPopov\Core\ViewInterface $this */
/** @var \FPopov\Models\View\Book\BookEditViewModel $model*/

/** @var \FPopov\Models\View\BookFormat\FormatViewModel[] $formatData */
$formatData = $model->getFormatData();
?>

<div class="container addBookContainer">
    <form  method="post" enctype="multipart/form-data" id="addbook" action="<?php echo $this->uri('books', 'editBookPost') ?>">
        <div id="add_book_form_first_part">
            <div class="row">
                <fieldset class="form-group col-xs-6" >
                    <img id="wapi_img" src="<?php echo $uriJunk?>content/images/wapiBulgariaLogo.jpg">
                </fieldset>
                <p class="form-group col-xs-6" >
                    <a href="<?php echo $this->uri('books', 'allBooks', [], ['page' => $model->getPage()])?>" class="btn btn-success btn-lg">All Books <i class="fa fa-book" aria-hidden="true"></i></a>
                </p>
            </div>
            <div class="row">
                <fieldset class="form-group col-xs-6" >
                    <input class="form-control" name="book_title" id="book_title" value="<?php echo $model->getBookTitle()?>" placeholder="Book Title" type="text">
                </fieldset>
                <div class="input-group date input-group modal-input form-group col-xs-6" id="datetimepicker1">
                    <input class="form-control" name="publish_date" id="publish_date" type="text" value="<?php echo date('d-m-Y H:i:s', strtotime($model->getPublishDate()))?>">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
            </div>
            <div class="row">
                <fieldset class="form-group col-xs-6" >
                    <input class="form-control" name="author" id="author" value="<?php echo $model->getAuthor()?>" placeholder="Author" type="text">
                </fieldset>
                <fieldset class="form-group col-xs-6 remove-padding" >
                    <select class="form-control" name="select_format" id="select_format">
                        <option value="">Select Format</option>
                        <?php foreach ($formatData as $modelValue) : ?>
                            <?php
                                $selected = $modelValue->getId() == $model->getFormatId() ? 'selected' : '';
                            ?>
                            <option value="<?php echo $modelValue->getId()?>" <?php echo $selected?>><?php echo $modelValue->getNameFormat()?></option>
                        <?php endforeach; ?>
                    </select>
                </fieldset>
            </div>
        </div>
        <div id="add_book_form_second_part">
            <div class="row">
                <fieldset class="form-group col-xs-6" >
                    <input class="form-control" name="page_count" id="page_count" value="<?php echo $model->getPageCount()?>" placeholder="Page Count" type="number">
                    <input class="form-control" name="isbn" id="isbn" value="<?php echo $model->getIsbn()?>" placeholder="ISBN" type="text">
                </fieldset>
                <fieldset class="form-group col-xs-6 remove-padding">
                    <textarea class="form-control" name="resume" id="resume" placeholder="Resume"><?php echo $model->getResume()?></textarea>
                </fieldset>
            </div>
        </div>
        <input type="hidden" name="book_id" value="<?php echo $model->getId()?>">
        <input type="hidden" name="book_page" value="<?php echo $model->getPage()?>">
        <input type="hidden" name="book_old_image" value="<?php echo $model->getImagePath() ?>">
        <div id="add_book_form_third_part">
            <div class="row">
                <fieldset class="form-group col-xs-6">
                    <div class="row">
                        <img class="grid-book book-edit-image" src="<?php echo $this->image($model->getImagePath())?>"><input class="book-edit-image-input" name="book_image" type="file">
                    </div>
                </fieldset>
                <fieldset class="form-group col-xs-6">
                    <button type="submit" id="add_book_button" class="btn btn-success btn-lg">Submit <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </fieldset>
            </div>
        </div>
    </form>
</div>