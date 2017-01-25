<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 13:51
 */

namespace FPopov\Services\Book;


use FPopov\Models\Binding\Book\BookCreateBindingModel;

interface BookServiceInterface
{
    public function getBookFormats();

    public function addBook(BookCreateBindingModel $bindingModel);

    public function allBooks($params = []);
}