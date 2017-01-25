<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 12:53
 */

namespace FPopov\Services\Application;


interface FileServiceInterface
{
    public function upload(string $fieldName);
}