<?php
/** @var \FPopov\Core\ViewInterface $this */
/** @var \FPopov\Models\View\BookFormat\FormatViewModel[] $model */
?>
<div class="container addBookContainer">
    <form  method="post" enctype="multipart/form-data" id="addbook" action="<?php echo $this->uri('books', 'addBookPost') ?>">
        <div id="add_book_form_first_part">
            <div class="row">
                <fieldset class="form-group col-xs-6" >
                    <img id="wapi_img" src="<?php echo $uriJunk?>content/images/wapiBulgariaLogo.jpg">
                </fieldset>
                <p class="form-group col-xs-6" >
                    <a href="<?php echo $this->uri('books', 'allBooks')?>" class="btn btn-success btn-lg">All Books <i class="fa fa-book" aria-hidden="true"></i></a>
                </p>
            </div>
            <div class="row">
                <fieldset class="form-group col-xs-6" >
                    <input class="form-control" name="book_title" id="book_title" placeholder="Book Title" type="text" required>
                </fieldset>
                <div class="input-group date input-group modal-input form-group col-xs-6" id="datetimepicker1">
                    <input class="form-control" name="publish_date" id="publish_date" type="text" value="<?php echo date('d-m-Y H:i:s')?>">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
            </div>
            <div class="row">
                <fieldset class="form-group col-xs-6" >
                    <input class="form-control" name="author" id="author" placeholder="Author" type="text">
                </fieldset>
                <fieldset class="form-group col-xs-6 remove-padding" >
                    <select class="form-control" name="select_format" id="select_format">
                        <option value="">Select Format</option>
                        <?php foreach ($model as $modelValue) : ?>
                            <option value="<?php echo $modelValue->getId()?>"><?php echo $modelValue->getNameFormat()?></option>
                        <?php endforeach; ?>
                    </select>
                </fieldset>
            </div>
        </div>
        <div id="add_book_form_second_part">
            <div class="row">
                <fieldset class="form-group col-xs-6" >
                    <input class="form-control" name="page_count" id="page_count" placeholder="Page Count" type="number">
                    <input class="form-control" name="isbn" id="isbn" placeholder="ISBN" type="text">
                </fieldset>
                <fieldset class="form-group col-xs-6 remove-padding">
                    <textarea class="form-control" name="resume" id="resume" placeholder="Resume"></textarea>
                </fieldset>
            </div>
        </div>
        <div id="add_book_form_third_part">
            <div class="row">
                <fieldset class="form-group col-xs-6">
                    <div class="row">
                        <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><input name="book_image" type="file">
                    </div>
                </fieldset>
                <fieldset class="form-group col-xs-6">
                    <button type="submit" id="add_book_button" class="btn btn-success btn-lg">Submit <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </fieldset>
            </div>
        </div>
    </form>
</div>


<script>
    $(function () {

        $('#addbook').validate();

    });
</script>