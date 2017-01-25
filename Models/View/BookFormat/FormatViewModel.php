<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 17:03
 */

namespace FPopov\Models\View\BookFormat;


class FormatViewModel
{
    private $id;

    private $nameFormat;

    /**
     * FormatViewModel constructor.
     * @param $id
     * @param $nameFormat
     */
    public function __construct($id, $nameFormat)
    {
        $this->id = $id;
        $this->nameFormat = $nameFormat;
    }

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
        return $this->nameFormat;
    }

    /**
     * @param mixed $nameFormat
     */
    public function setNameFormat($nameFormat)
    {
        $this->nameFormat = $nameFormat;
    }
}