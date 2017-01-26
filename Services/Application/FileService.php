<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 12:54
 */

namespace FPopov\Services\Application;


use FPopov\Core\MVC\Message;

class FileService implements FileServiceInterface
{
    const CONTENT_FOLDER = 'content';
    const IMAGES_FOLDER = 'images';
    const IMAGE_NAME = 'name';
    const TMP_NAME = 'tmp_name';
    const IMG_TYPE = 'type';
    const IMG_SIZE = 'size';
    const TYPE_OF_IMAGE = 'image/jpeg';
    const MAX_VALUE_OF_IMAGE = 20000;

    public function upload(string $fieldName)
    {
        if(empty($_FILES[$fieldName][self::IMAGE_NAME])) {
            return false;
        }

        if ($_FILES[$fieldName][self::IMG_TYPE] != self::TYPE_OF_IMAGE) {
            Message::postMessage('You can upload only image/jpeg', Message::NEGATIVE_MESSAGE);
            return false;
        }

        if ($_FILES[$fieldName][self::IMG_SIZE] > self::MAX_VALUE_OF_IMAGE) {
            Message::postMessage('Image can not be larger then 20kB', Message::NEGATIVE_MESSAGE);
            return false;
        }

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