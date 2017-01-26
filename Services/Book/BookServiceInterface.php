<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 13:51
 */

namespace FPopov\Services\Book;


use FPopov\Models\Binding\Book\BookCreateBindingModel;
use FPopov\Models\Binding\Book\BookEditBindingModel;

interface BookServiceInterface
{
    public function getBookFormats();

    public function addBook(BookCreateBindingModel $bindingModel);

    public function allBooks(&$params = []);

    public function deleteBook($id);

    public function editBook($id);

    public function editBookPost(BookEditBindingModel $bindingModel);
}