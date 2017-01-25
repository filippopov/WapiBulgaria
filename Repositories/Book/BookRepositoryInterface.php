<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 14:45
 */

namespace FPopov\Repositories\Book;


interface BookRepositoryInterface
{
    public function findAllBooks(&$params = []);
}