<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 12:54
 */

namespace FPopov\Services\Application;


class FileService implements FileServiceInterface
{
    const CONTENT_FOLDER = 'content';
    const IMAGES_FOLDER = 'images';
    const IMAGE_NAME = 'name';
    const TMP_NAME = 'tmp_name';

    public function upload(string $fieldName)
    {
        $originalFile = $_FILES[$fieldName][self::TMP_NAME];

        $newFile = getcwd()
            . DIRECTORY_SEPARATOR
            . self::CONTENT_FOLDER
            . DIRECTORY_SEPARATOR
            . self::IMAGES_FOLDER
            . DIRECTORY_SEPARATOR
            . $_FILES[$fieldName][self::IMAGE_NAME];

        $isMoved =  move_uploaded_file(
            $originalFile,
            $newFile
        );

        if ($isMoved) {
            return self::CONTENT_FOLDER
            . DIRECTORY_SEPARATOR
            . self::IMAGES_FOLDER
            . DIRECTORY_SEPARATOR
            . $_FILES[$fieldName][self::IMAGE_NAME];
        }

        return false;
    }
}