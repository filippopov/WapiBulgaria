<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 26.1.2017 г.
 * Time: 15:50
 */

namespace FPopov\Models\Binding\Book;


class BookEditBindingModel
{
    private $book_title;

    private $publish_date;

    private $author;

    private $select_format;

    private $page_count;

    private $resume;

    private $book_image;

    private $isbn;

    private $book_id;

    private $book_page;

    private $book_old_image;

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
    public function getBookId()
    {
        return $this->book_id;
    }

    /**
     * @param mixed $book_id
     */
    public function setBookId($book_id)
    {
        $this->book_id = $book_id;
    }

    /**
     * @return mixed
     */
    public function getBookPage()
    {
        return $this->book_page;
    }

    /**
     * @param mixed $book_page
     */
    public function setBookPage($book_page)
    {
        $this->book_page = $book_page;
    }

    /**
     * @return mixed
     */
    public function getBookOldImage()
    {
        return $this->book_old_image;
    }

    /**
     * @param mixed $book_old_image
     */
    public function setBookOldImage($book_old_image)
    {
        $this->book_old_image = $book_old_image;
    }
}