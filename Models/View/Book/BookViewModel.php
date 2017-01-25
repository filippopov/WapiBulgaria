<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 25.1.2017 г.
 * Time: 19:45
 */

namespace FPopov\Models\View\Book;


class BookViewModel
{
    private $id;

    private $bookTitle;

    private $author;

    private $publishDate;

    private $nameFormat;

    private $formatId;

    private $pageCount;

    private $isbn;

    private $resume;

    private $publisher;

    private $imagePath;

    /**
     * BookViewModel constructor.
     * @param $id
     * @param $bookTitle
     * @param $author
     * @param $publishDate
     * @param $nameFormat
     * @param $formatId
     * @param $pageCount
     * @param $isbn
     * @param $resume
     * @param $publisher
     * @param $imagePath
     */
    public function __construct($id, $bookTitle, $author, $publishDate, $nameFormat, $formatId, $pageCount, $isbn, $resume, $publisher, $imagePath)
    {
        $this->id = $id;
        $this->bookTitle = $bookTitle;
        $this->author = $author;
        $this->publishDate = $publishDate;
        $this->nameFormat = $nameFormat;
        $this->formatId = $formatId;
        $this->pageCount = $pageCount;
        $this->isbn = $isbn;
        $this->resume = $resume;
        $this->publisher = $publisher;
        $this->imagePath = $imagePath;
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
    public function getBookTitle()
    {
        return $this->bookTitle;
    }

    /**
     * @param mixed $bookTitle
     */
    public function setBookTitle($bookTitle)
    {
        $this->bookTitle = $bookTitle;
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
        return $this->publishDate;
    }

    /**
     * @param mixed $publishDate
     */
    public function setPublishDate($publishDate)
    {
        $this->publishDate = $publishDate;
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

    /**
     * @return mixed
     */
    public function getFormatId()
    {
        return $this->formatId;
    }

    /**
     * @param mixed $formatId
     */
    public function setFormatId($formatId)
    {
        $this->formatId = $formatId;
    }

    /**
     * @return mixed
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }

    /**
     * @param mixed $pageCount
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;
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
        return $this->imagePath;
    }

    /**
     * @param mixed $imagePath
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
    }
}