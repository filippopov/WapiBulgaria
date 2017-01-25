<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 16:56
 */

namespace FPopov\Models\DB\BookFormat;


class Format
{
    private $id;

    private $name_format;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNameFormat()
    {
        return $this->name_format;
    }

    /**
     * @param mixed $name_format
     */
    public function setNameFormat($name_format)
    {
        $this->name_format = $name_format;
    }
}