<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 18:01
 */

namespace FPopov\Models\DB\Books;


class Book
{
    private $id;

    private $book_title;

    private $author;

    private $publish_date;

    private $name_format;

    private $format_id;

    private $page_count;

    private $isbn;

    private $resume;

    private $publisher;

    private $image_path;

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
    public function getBookTitle()
    {
        return $this->book_title;
    }

    /**
     * @param mixed $book_title
     */
    public function setBookTitle($book_title)
    {
        $this->book_title = $book_title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getPublishDate()
    {
        return $this->publish_date;
    }

    /**
     * @param mixed $publish_date
     */
    public function setPublishDate($publish_date)
    {
        $this->publish_date = $publish_date;
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

    /**
     * @return mixed
     */
    public function getFormatId()
    {
        return $this->format_id;
    }

    /**
     * @param mixed $format_id
     */
    public function setFormatId($format_id)
    {
        $this->format_id = $format_id;
    }

    /**
     * @return mixed
     */
    public function getPageCount()
    {
        return $this->page_count;
    }

    /**
     * @param mixed $page_count
     */
    public function setPageCount($page_count)
    {
        $this->page_count = $page_count;
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * @param mixed $resume
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->image_path;
    }

    /**
     * @param mixed $image_path
     */
    public function setImagePath($image_path)
    {
        $this->image_path = $image_path;
    }
}