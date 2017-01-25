<?php
/** @var \FPopov\Core\ViewInterface $this */
?>
<div class="container addBookContainer col-8">
    <form  method="post" id="addbook" action="<?php echo $this->uri('books', 'addBookPost') ?>">
        <div id="add_book_form_first_part">
            <div class="row">
                <fieldset class="form-group col-6" >
                    <img id="wapi_img" src="<?php echo $uriJunk?>content/images/wapiBulgariaLogo.jpg">
                </fieldset>
            </div>
            <div class="row">
                <fieldset class="form-group col-6" >
                    <input class="form-control" name="book_title" id="book_title" placeholder="Book Title" type="text">
                </fieldset>
                <div class="input-group date input-group modal-input" id="datetimepicker1">
                    <input class="form-control" type="text">
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                </div>
            </div>
            <div class="row">
                <fieldset class="form-group col-6" >
                    <input class="form-control" name="author" id="author" placeholder="Author" type="text">
                </fieldset>
                <fieldset class="form-group col-6" >
                    <select class="form-control" name="select_format" id="select_format">
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </fieldset>
            </div>
        </div>
        <div id="add_book_form_second_part">
            <div class="row">
                <fieldset class="form-group col-6" >
                    <input class="form-control" name="page_count" id="page_count" placeholder="Page Count" type="number">
                    <input class="form-control" name="isbn" id="isbn" placeholder="ISBN" type="text">
                </fieldset>
                <fieldset class="form-group col-6" >
                    <textarea class="form-control" name="resume" id="resume" placeholder="Resume"></textarea>
                </fieldset>
            </div>
        </div>
        <div id="add_book_form_third_part">
            <div class="row">
                <fieldset class="form-group col-6">
                    <div class="row">
                        <i class="fa fa-picture-o fa-2x" aria-hidden="true"></i><input name="book_image" type="file">
                    </div>
                </fieldset>
                <fieldset class="form-group col-6">
                    <button type="submit" id="add_book_button" class="btn btn-success">Submit <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
                </fieldset>
            </div>
        </div>
    </form>
</div>

