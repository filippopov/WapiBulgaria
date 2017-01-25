<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 12:18
 */

namespace FPopov\Models\Binding\Book;


class BookCreateBindingModel
{
    private $book_title;

    private $publish_date;

    private $author;

    private $select_format;

    private $page_count;

    private $resume;

    private $book_image;

    private $isbn;

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
    public function getBookImage()
    {
        return $this->book_image;
    }

    /**
     * @param mixed $book_image
     */
    public function setBookImage($book_image)
    {
        $this->book_image = $book_image;
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
    public function getSelectFormat()
    {
        return $this->select_format;
    }

    /**
     * @param mixed $select_format
     */
    public function setSelectFormat($select_format)
    {
        $this->select_format = $select_format;
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

}